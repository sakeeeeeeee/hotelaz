<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reservations = Auth::user()->reservations()->orderBy('created_at', 'desc')->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create(Request $request, Room $room)
    {
        $checkIn = $request->check_in;
        $checkOut = $request->check_out;
        $guests = $request->guests;

        if (!$checkIn || !$checkOut || !$guests) {
            return redirect()->route('rooms.show', $room)->with('error', 'Silakan pilih tanggal check-in, check-out, dan jumlah tamu.');
        }

        // Calculate total price
        $checkInDate = Carbon::parse($checkIn);
        $checkOutDate = Carbon::parse($checkOut);
        $nights = $checkOutDate->diffInDays($checkInDate);
        $totalPrice = $nights * $room->price_per_night;

        return view('reservations.create', compact('room', 'checkIn', 'checkOut', 'guests', 'nights', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'special_requests' => 'nullable|string',
        ]);

        // Check if room is available for the selected dates
        $room = Room::findOrFail($request->room_id);
        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);

        $isAvailable = Reservation::where('room_id', $room->id)
            ->where('status', '!=', 'cancelled')
            ->where(function($query) use ($checkIn, $checkOut) {
                $query->whereBetween('check_in_date', [$checkIn, $checkOut])
                    ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                    ->orWhere(function($q) use ($checkIn, $checkOut) {
                        $q->where('check_in_date', '<=', $checkIn)
                          ->where('check_out_date', '>=', $checkOut);
                    });
            })->doesntExist();

        if (!$isAvailable) {
            return back()->with('error', 'Kamar ini tidak tersedia untuk tanggal yang dipilih.');
        }

        $reservation = new Reservation();
        $reservation->user_id = Auth::id();
        $reservation->room_id = $request->room_id;
        $reservation->check_in_date = $request->check_in_date;
        $reservation->check_out_date = $request->check_out_date;
        $reservation->total_guests = $request->total_guests;
        $reservation->total_price = $request->total_price;
        $reservation->special_requests = $request->special_requests;
        $reservation->status = 'pending';
        $reservation->payment_status = 'pending';
        $reservation->save();

        // TODO: Redirect to payment gateway

        return redirect()->route('reservations.show', $reservation)->with('success', 'Reservasi berhasil dibuat. Silakan lanjutkan ke pembayaran.');
    }

    public function show(Reservation $reservation)
    {
        $this->authorize('view', $reservation);
        return view('reservations.show', compact('reservation'));
    }

    public function cancel(Reservation $reservation)
    {
        $this->authorize('update', $reservation);
        
        if ($reservation->status === 'completed') {
            return back()->with('error', 'Reservasi yang sudah selesai tidak dapat dibatalkan.');
        }
        
        $reservation->status = 'cancelled';
        $reservation->save();
        
        // TODO: Handle refund if payment has been made
        
        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dibatalkan.');
    }
} 