<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'room'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('is_admin', false)->get();
        $rooms = Room::where('status', 'available')->get();
        
        return view('admin.reservations.create', compact('users', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'special_requests' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled',
            'payment_status' => 'required|in:pending,paid,failed',
            'total_price' => 'required|numeric|min:0',
        ]);
        
        // Check if room is available for the selected dates
        $conflictingReservations = Reservation::where('room_id', $request->room_id)
            ->where('status', '!=', 'cancelled')
            ->where(function($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                    ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                    ->orWhere(function($query) use ($request) {
                        $query->where('check_in', '<=', $request->check_in)
                            ->where('check_out', '>=', $request->check_out);
                    });
            })
            ->exists();
            
        if ($conflictingReservations) {
            return back()->withErrors(['room_id' => 'The selected room is not available for the chosen dates.'])->withInput();
        }
        
        Reservation::create($validated);
        
        return redirect()->route('admin.reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $users = User::where('is_admin', false)->get();
        $rooms = Room::all();
        
        return view('admin.reservations.edit', compact('reservation', 'users', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Handle different types of updates based on action parameter
        if ($request->action === 'update_status') {
            $validated = $request->validate([
                'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled',
            ]);
            
            $reservation->update($validated);
            
            // Jika status diubah menjadi confirmed, generate resi dan kirim email ke customer
            if ($request->status === 'confirmed') {
                if (!$reservation->resi) {
                    $reservation->resi = 'HZ-' . strtoupper(uniqid()) . '-' . $reservation->id;
                    $reservation->save();
                }
                \Mail::to($reservation->user->email)->send(new \App\Mail\ReservationConfirmed($reservation));
            }
            
            // If status is cancelled, make the room available
            if ($request->status === 'cancelled' && $reservation->room) {
                $room = $reservation->room;
                if ($room->status === 'booked') {
                    $room->update(['status' => 'available']);
                }
            }
            
            return back()->with('success', 'Reservation status updated successfully.');
        } 
        else if ($request->action === 'update_payment') {
            $validated = $request->validate([
                'payment_status' => 'required|in:pending,paid,failed',
            ]);
            
            $reservation->update($validated);
            
            return back()->with('success', 'Payment status updated successfully.');
        }
        else if ($request->action === 'update_notes') {
            $validated = $request->validate([
                'admin_notes' => 'nullable|string',
            ]);
            
            $reservation->update($validated);
            
            return back()->with('success', 'Admin notes updated successfully.');
        }
        else {
            // Full reservation update
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'room_id' => 'required|exists:rooms,id',
                'check_in' => 'required|date',
                'check_out' => 'required|date|after:check_in',
                'adults' => 'required|integer|min:1',
                'children' => 'required|integer|min:0',
                'special_requests' => 'nullable|string',
                'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled',
                'payment_status' => 'required|in:pending,paid,failed',
                'total_price' => 'required|numeric|min:0',
                'discount' => 'nullable|numeric|min:0',
                'tax' => 'nullable|numeric|min:0',
            ]);
            
            // Check if room is available for the selected dates (excluding this reservation)
            if ($reservation->room_id != $request->room_id || 
                $reservation->check_in->format('Y-m-d') != $request->check_in || 
                $reservation->check_out->format('Y-m-d') != $request->check_out) {
                
                $conflictingReservations = Reservation::where('room_id', $request->room_id)
                    ->where('id', '!=', $reservation->id)
                    ->where('status', '!=', 'cancelled')
                    ->where(function($query) use ($request) {
                        $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                            ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                            ->orWhere(function($query) use ($request) {
                                $query->where('check_in', '<=', $request->check_in)
                                    ->where('check_out', '>=', $request->check_out);
                            });
                    })
                    ->exists();
                    
                if ($conflictingReservations) {
                    return back()->withErrors(['room_id' => 'The selected room is not available for the chosen dates.'])->withInput();
                }
            }
            
            $reservation->update($validated);
            
            return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        
        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
} 