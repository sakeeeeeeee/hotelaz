@extends('layouts.admin')

@section('header', 'Edit Room')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200">
            <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">Please check the form for errors.</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Room Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $room->name) }}" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        
                        <div class="mb-4">
                            <label for="room_number" class="block text-sm font-medium text-gray-700 mb-1">Room Number</label>
                            <input type="text" name="room_number" id="room_number" value="{{ old('room_number', $room->room_number) }}" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        
                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Room Type</label>
                            <select name="type" id="type" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="standard" {{ old('type', $room->type) === 'standard' ? 'selected' : '' }}>Standard</option>
                                <option value="deluxe" {{ old('type', $room->type) === 'deluxe' ? 'selected' : '' }}>Deluxe</option>
                                <option value="suite" {{ old('type', $room->type) === 'suite' ? 'selected' : '' }}>Suite</option>
                                <option value="executive" {{ old('type', $room->type) === 'executive' ? 'selected' : '' }}>Executive</option>
                                <option value="presidential" {{ old('type', $room->type) === 'presidential' ? 'selected' : '' }}>Presidential</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Capacity (Persons)</label>
                            <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $room->capacity) }}" min="1" max="10" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        
                        <div class="mb-4">
                            <label for="price_per_night" class="block text-sm font-medium text-gray-700 mb-1">Price Per Night</label>
                            <input type="number" name="price_per_night" id="price_per_night" value="{{ old('price_per_night', $room->price_per_night) }}" min="0" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                        
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" id="status" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="available" {{ old('status', $room->status) === 'available' ? 'selected' : '' }}>Available</option>
                                <option value="booked" {{ old('status', $room->status) === 'booked' ? 'selected' : '' }}>Booked</option>
                                <option value="maintenance" {{ old('status', $room->status) === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" id="description" rows="4" 
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $room->description) }}</textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Features</label>
                            <div class="grid grid-cols-2 gap-2">
                                @php
                                    $features = old('features', $room->features ?? []);
                                    if (!is_array($features) && is_string($features)) {
                                        $features = json_decode($features, true) ?? [];
                                    }
                                @endphp
                                
                                <div class="flex items-center">
                                    <input type="checkbox" name="features[]" value="wifi" id="feature_wifi" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        {{ in_array('wifi', $features) ? 'checked' : '' }}>
                                    <label for="feature_wifi" class="ml-2 text-sm text-gray-700">Wi-Fi</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="features[]" value="tv" id="feature_tv" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        {{ in_array('tv', $features) ? 'checked' : '' }}>
                                    <label for="feature_tv" class="ml-2 text-sm text-gray-700">TV</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="features[]" value="ac" id="feature_ac" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        {{ in_array('ac', $features) ? 'checked' : '' }}>
                                    <label for="feature_ac" class="ml-2 text-sm text-gray-700">Air Conditioning</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="features[]" value="fridge" id="feature_fridge" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        {{ in_array('fridge', $features) ? 'checked' : '' }}>
                                    <label for="feature_fridge" class="ml-2 text-sm text-gray-700">Mini Fridge</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="features[]" value="safe" id="feature_safe" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        {{ in_array('safe', $features) ? 'checked' : '' }}>
                                    <label for="feature_safe" class="ml-2 text-sm text-gray-700">Safe</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" name="features[]" value="balcony" id="feature_balcony" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        {{ in_array('balcony', $features) ? 'checked' : '' }}>
                                    <label for="feature_balcony" class="ml-2 text-sm text-gray-700">Balcony</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                            @if($room->featured_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $room->featured_image) }}" alt="{{ $room->name }}" class="h-32 w-48 object-cover rounded">
                                </div>
                            @endif
                            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image</p>
                        </div>
                        
                        <div class="mb-4">
                            <label for="images" class="block text-sm font-medium text-gray-700 mb-1">Additional Images</label>
                            <input type="file" name="images[]" id="images" accept="image/*" multiple
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <p class="mt-1 text-sm text-gray-500">Leave empty to keep current images</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 flex items-center justify-end">
                    <a href="{{ route('admin.rooms.index') }}" class="text-sm text-gray-700 underline mr-4">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                        Update Room
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 