<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:standard,deluxe,suite,executive,presidential',
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1|max:10',
            'features' => 'nullable|array',
            'features.*' => 'string|in:wifi,tv,ac,fridge,safe,balcony',
            'featured_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'status' => 'required|in:available,booked,maintenance',
            'quantity' => 'required|integer|min:1',
        ]);

        $room = new Room();
        $room->name = $request->name;
        $room->type = $request->type;
        $room->description = $request->description;
        $room->price_per_night = $request->price_per_night;
        $room->capacity = $request->capacity;
        $room->features = json_encode($request->features ?? []);
        $room->status = $request->status;
        $room->quantity = $request->quantity;

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('room-images', 'public');
            $room->featured_image = $path;
        }

        $room->save();
        
        // Handle multiple images
        if ($request->hasFile('images')) {
            $galleryImages = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('room-galleries', 'public');
                $galleryImages[] = $path;
            }
            $room->gallery_images = json_encode($galleryImages);
            $room->save();
        }

        // Generate RoomUnit
        for ($i = 1; $i <= $room->quantity; $i++) {
            $unitNumber = 'R' . $room->id . '-' . str_pad($i, 2, '0', STR_PAD_LEFT); // contoh: R1-01, R1-02, dst
            $room->roomUnits()->create([
                'room_number' => $unitNumber,
                'status' => 'available',
            ]);
        }

        return redirect()->route('admin.rooms.index')->with('success', 'Room added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('admin.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:standard,deluxe,suite,executive,presidential',
            'description' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1|max:10',
            'features' => 'nullable|array',
            'features.*' => 'string|in:wifi,tv,ac,fridge,safe,balcony',
            'featured_image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'status' => 'required|in:available,booked,maintenance',
            'quantity' => 'required|integer|min:1',
        ]);

        $room->name = $request->name;
        $room->type = $request->type;
        $room->description = $request->description;
        $room->price_per_night = $request->price_per_night;
        $room->capacity = $request->capacity;
        $room->features = json_encode($request->features ?? []);
        $room->status = $request->status;
        $room->quantity = $request->quantity;

        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($room->featured_image) {
                Storage::disk('public')->delete($room->featured_image);
            }
            
            $path = $request->file('featured_image')->store('room-images', 'public');
            $room->featured_image = $path;
        }
        
        // Handle multiple images
        if ($request->hasFile('images')) {
            $existingImages = json_decode($room->gallery_images ?? '[]', true);
            
            $galleryImages = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('room-galleries', 'public');
                $galleryImages[] = $path;
            }
            
            // Merge with existing images
            $room->gallery_images = json_encode(array_merge($existingImages, $galleryImages));
        }

        $oldQuantity = $room->getOriginal('quantity');
        $room->save();

        // Update RoomUnit jika quantity berubah
        if ($request->quantity > $oldQuantity) {
            for ($i = $oldQuantity + 1; $i <= $request->quantity; $i++) {
                $unitNumber = 'R' . $room->id . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);
                $room->roomUnits()->create([
                    'room_number' => $unitNumber,
                    'status' => 'available',
                ]);
            }
        } elseif ($request->quantity < $oldQuantity) {
            $unitsToDelete = $room->roomUnits()
                ->where('status', 'available')
                ->orderByDesc('room_number')
                ->take($oldQuantity - $request->quantity)
                ->get();
            foreach ($unitsToDelete as $unit) {
                $unit->delete();
            }
        }

        return redirect()->route('admin.rooms.index')->with('success', 'Room updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        // Check if room has reservations
        if ($room->reservations()->exists()) {
            return back()->with('error', 'This room cannot be deleted because it has reservations.');
        }

        // Delete room images
        if ($room->featured_image) {
            Storage::disk('public')->delete($room->featured_image);
        }
        
        if ($room->gallery_images) {
            $galleryImages = json_decode($room->gallery_images, true);
            foreach ($galleryImages as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $room->delete();

        return redirect()->route('admin.rooms.index')->with('success', 'Room deleted successfully.');
    }
} 