<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ReservationCreated;
use App\Mail\ReservationConfirmed;
use Illuminate\Support\Facades\Mail;

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
        $nights = $checkInDate->diffInDays($checkOutDate);
        if ($nights < 1) {
            return redirect()->back()->with('error', 'Tanggal check-out harus setelah check-in.')->withInput();
        }
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
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
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

        // Handle upload payment proof
        $paymentProofPath = null;
        if ($request->hasFile('payment_proof')) {
            $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
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
        $reservation->payment_status = 'waiting_confirmation';
        $reservation->payment_proof = $paymentProofPath;
        $reservation->save();

        // Kirim email notifikasi ke user
        Mail::to($reservation->user->email)->send(new ReservationCreated($reservation));

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

    public function update(Request $request, Reservation $reservation)
    {
        \Log::info('ReservationController@update called', $request->all());

        if ($request->action === 'update_payment') {
            $validated = $request->validate([
                'payment_status' => 'required|in:pending,paid,failed',
            ]);

            $reservation->update($validated);

            // Jika status pembayaran menjadi paid, kirim email konfirmasi ke user
            if ($request->payment_status === 'paid') {
                \Log::info('Sending ReservationConfirmed email (paid) to: ' . $reservation->user->email);
                Mail::to($reservation->user->email)->send(new ReservationConfirmed($reservation));
            }

            return back()->with('success', 'Payment status updated successfully.');
        }
        if ($request->action === 'update_status') {
            $validated = $request->validate([
                'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled',
            ]);
            $reservation->update($validated);

            // Jika status reservasi menjadi confirmed, kirim email konfirmasi ke user
            if ($request->status === 'confirmed') {
                \Log::info('Sending ReservationConfirmed email (confirmed) to: ' . $reservation->user->email);
                Mail::to($reservation->user->email)->send(new ReservationConfirmed($reservation));
            }

            return back()->with('success', 'Reservation status updated successfully.');
        }
    }
} 