<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::where('status', 'available')->paginate(9);
        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room)
    {
        // Get related rooms (same bed type or capacity)
        $relatedRooms = Room::where('id', '!=', $room->id)
            ->where(function($query) use ($room) {
                $query->where('bed_type', $room->bed_type)
                      ->orWhere('capacity', $room->capacity);
            })
            ->where('status', 'available')
            ->limit(3)
            ->get();
            
        return view('rooms.show', compact('room', 'relatedRooms'));
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);

        $checkIn = $request->check_in;
        $checkOut = $request->check_out;
        $guests = $request->guests;

        // Find available rooms for the selected dates
        $availableRooms = Room::where('status', 'available')
            ->where('capacity', '>=', $guests)
            ->whereDoesntHave('reservations', function($query) use ($checkIn, $checkOut) {
                $query->where(function($q) use ($checkIn, $checkOut) {
                    $q->whereBetween('check_in_date', [$checkIn, $checkOut])
                      ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
                      ->orWhere(function($q) use ($checkIn, $checkOut) {
                          $q->where('check_in_date', '<=', $checkIn)
                            ->where('check_out_date', '>=', $checkOut);
                      });
                })->where('status', '!=', 'cancelled');
            })
            ->paginate(9);

        return view('rooms.search', compact('availableRooms', 'checkIn', 'checkOut', 'guests'));
    }
} 