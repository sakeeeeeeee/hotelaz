@extends('layouts.app')

@section('title', $room->name)

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <!-- Room Image -->
                <div class="lg:max-w-lg lg:self-end">
                    <div class="rounded-lg overflow-hidden">
                        @if ($room->image)
                            @if (Str::startsWith($room->image, 'http'))
                                <img src="{{ $room->image }}" alt="{{ $room->name }}" class="w-full h-96 object-cover">
                            @else
                                <img src="{{ Storage::url($room->image) }}" alt="{{ $room->name }}" class="w-full h-96 object-cover">
                            @endif
                        @else
                            <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400 text-lg">No Image Available</span>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Room Details -->
                <div class="mt-10 lg:mt-0 lg:col-start-2">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $room->name }}</h1>
                    
                    <div class="mt-4">
                        <h2 class="sr-only">Room Price</h2>
                        <p class="text-3xl text-gray-900">{{ number_format($room->price_per_night, 0) }} <span class="text-base font-medium text-gray-500">/ night</span></p>
                    </div>
                    
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900">Description</h3>
                        <div class="mt-2 prose prose-indigo">
                            <p class="text-gray-500">{{ $room->description }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <div class="flex items-center">
                            <i class="fas fa-user-friends text-gray-500 mr-2"></i>
                            <p class="text-gray-500">{{ $room->capacity }} {{ $room->capacity > 1 ? 'Guests' : 'Guest' }}</p>
                            
                            <i class="fas fa-bed text-gray-500 mx-4 mr-2"></i>
                            <p class="text-gray-500">{{ $room->bed_type }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h3 class="text-lg font-medium text-gray-900">Amenities</h3>
                        <div class="mt-2 grid grid-cols-2 gap-4">
                            @if ($room->has_wifi)
                                <div class="flex items-center">
                                    <i class="fas fa-wifi text-indigo-500 mr-2"></i>
                                    <p class="text-gray-500">Free WiFi</p>
                                </div>
                            @endif
                            
                            @if ($room->has_ac)
                                <div class="flex items-center">
                                    <i class="fas fa-snowflake text-indigo-500 mr-2"></i>
                                    <p class="text-gray-500">Air Conditioning</p>
                                </div>
                            @endif
                            
                            @if ($room->has_tv)
                                <div class="flex items-center">
                                    <i class="fas fa-tv text-indigo-500 mr-2"></i>
                                    <p class="text-gray-500">Television</p>
                                </div>
                            @endif
                            
                            <div class="flex items-center">
                                <i class="fas fa-coffee text-indigo-500 mr-2"></i>
                                <p class="text-gray-500">Coffee Maker</p>
                            </div>
                            
                            <div class="flex items-center">
                                <i class="fas fa-bath text-indigo-500 mr-2"></i>
                                <p class="text-gray-500">Private Bathroom</p>
                            </div>
                            
                            <div class="flex items-center">
                                <i class="fas fa-concierge-bell text-indigo-500 mr-2"></i>
                                <p class="text-gray-500">Room Service</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Booking Form -->
                    <div class="mt-8 border-t border-gray-200 pt-8">
                        <h3 class="text-lg font-medium text-gray-900">Book This Room</h3>
                        
                        <form action="{{ route('rooms.search') }}" method="POST" class="mt-4 grid grid-cols-1 gap-4">
                            @csrf
                            <input type="hidden" name="room_id" value="{{ $room->id }}">
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="check_in" class="block text-sm font-medium text-gray-700">Check In</label>
                                    <input type="date" name="check_in" id="check_in" min="{{ date('Y-m-d') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="check_out" class="block text-sm font-medium text-gray-700">Check Out</label>
                                    <input type="date" name="check_out" id="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            
                            <div>
                                <label for="guests" class="block text-sm font-medium text-gray-700">Guests</label>
                                <select name="guests" id="guests" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    @for ($i = 1; $i <= $room->capacity; $i++)
                                        <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                                    @endfor
                                </select>
                            </div>
                            
                            <div>
                                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-4 rounded-md font-medium">
                                    Check Availability
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Room Policies -->
            <div class="mt-16 border-t border-gray-200 pt-10">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Room Policies</h2>
                
                <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Check-in & Check-out</h3>
                        <ul class="mt-2 text-gray-500 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-clock mt-1 mr-2 text-indigo-500"></i>
                                <span>Check-in time: 2:00 PM</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-clock mt-1 mr-2 text-indigo-500"></i>
                                <span>Check-out time: 12:00 PM</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-info-circle mt-1 mr-2 text-indigo-500"></i>
                                <span>Early check-in and late check-out available upon request (additional charges may apply)</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Cancellation Policy</h3>
                        <ul class="mt-2 text-gray-500 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-calendar-times mt-1 mr-2 text-indigo-500"></i>
                                <span>Free cancellation up to 48 hours before check-in</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-money-bill-wave mt-1 mr-2 text-indigo-500"></i>
                                <span>Cancellations within 48 hours of check-in are subject to a one-night charge</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-ban mt-1 mr-2 text-indigo-500"></i>
                                <span>No-shows will be charged the full amount of the reservation</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Additional Information</h3>
                        <ul class="mt-2 text-gray-500 space-y-2">
                            <li class="flex items-start">
                                <i class="fas fa-credit-card mt-1 mr-2 text-indigo-500"></i>
                                <span>Credit card required at check-in for incidentals</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-smoking-ban mt-1 mr-2 text-indigo-500"></i>
                                <span>All rooms are non-smoking (smoking fee applies for violations)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-paw mt-1 mr-2 text-indigo-500"></i>
                                <span>Pets are not allowed (service animals exempt)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Related Rooms -->
            <div class="mt-16 border-t border-gray-200 pt-10">
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">You May Also Like</h2>
                
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($relatedRooms ?? [] as $relatedRoom)
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg transition-transform duration-300 hover:scale-105">
                            <div class="relative pb-2/3">
                                @if ($relatedRoom->image)
                                    @if (Str::startsWith($relatedRoom->image, 'http'))
                                        <img src="{{ $relatedRoom->image }}" alt="{{ $relatedRoom->name }}" class="w-full h-48 object-cover">
                                    @else
                                        <img src="{{ Storage::url($relatedRoom->image) }}" alt="{{ $relatedRoom->name }}" class="w-full h-48 object-cover">
                                    @endif
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-400 text-lg">No Image Available</span>
                                    </div>
                                @endif
                                <div class="absolute top-0 right-0 bg-amber-500 text-white px-3 py-1 m-2 rounded-md font-semibold">
                                    {{ number_format($relatedRoom->price_per_night, 0) }} / night
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $relatedRoom->name }}</h3>
                                <div class="flex items-center text-gray-600 mb-2">
                                    <i class="fas fa-user-friends mr-2"></i>
                                    <span>{{ $relatedRoom->capacity }} {{ $relatedRoom->capacity > 1 ? 'Guests' : 'Guest' }}</span>
                                </div>
                                <a href="{{ route('rooms.show', $relatedRoom) }}" class="block w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md text-center font-medium">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set min date for check-out to be at least one day after check-in
        const checkInInput = document.getElementById('check_in');
        const checkOutInput = document.getElementById('check_out');
        
        checkInInput.addEventListener('change', function() {
            const checkInDate = new Date(this.value);
            const nextDay = new Date(checkInDate);
            nextDay.setDate(nextDay.getDate() + 1);
            
            const year = nextDay.getFullYear();
            const month = String(nextDay.getMonth() + 1).padStart(2, '0');
            const day = String(nextDay.getDate()).padStart(2, '0');
            
            checkOutInput.min = `${year}-${month}-${day}`;
            
            // If current check-out date is before new min date, update it
            if (new Date(checkOutInput.value) <= checkInDate) {
                checkOutInput.value = `${year}-${month}-${day}`;
            }
        });
    });
</script>
@endpush 