@extends('layouts.app')

@section('title', 'Our Rooms')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" alt="Hotel Room" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight slide-in">
                    Our Rooms & Suites
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-300 slide-in">
                    Discover our selection of luxurious rooms and suites designed for your comfort and relaxation.
                </p>
            </div>
        </div>
    </div>
    
    <!-- Room Search Form -->
    <div class="bg-indigo-700 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <form action="{{ route('rooms.search') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @csrf
                <div>
                    <label for="check_in" class="block text-sm font-medium text-white">Check In</label>
                    <input type="date" name="check_in" id="check_in" min="{{ date('Y-m-d') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="check_out" class="block text-sm font-medium text-white">Check Out</label>
                    <input type="date" name="check_out" id="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="guests" class="block text-sm font-medium text-white">Guests</label>
                    <select name="guests" id="guests" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 px-4 rounded-md font-medium">
                        Check Availability
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Rooms Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-6 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($rooms as $room)
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transition-transform duration-300 hover:scale-105">
                        <div class="relative pb-2/3">
                            @if ($room->image)
                                @if (Str::startsWith($room->image, 'http'))
                                    <img src="{{ $room->image }}" alt="{{ $room->name }}" class="w-full h-64 object-cover">
                                @else
                                    <img src="{{ Storage::url($room->image) }}" alt="{{ $room->name }}" class="w-full h-64 object-cover">
                                @endif
                            @else
                                <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400 text-lg">No Image Available</span>
                                </div>
                            @endif
                            <div class="absolute top-0 right-0 bg-amber-500 text-white px-3 py-1 m-2 rounded-md font-semibold">
                                {{ number_format($room->price_per_night, 0) }} / night
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $room->name }}</h3>
                            <p class="text-gray-500 mb-4">{{ Str::limit($room->description, 100) }}</p>
                            <div class="flex items-center text-gray-600 mb-4">
                                <i class="fas fa-user-friends mr-2"></i>
                                <span>{{ $room->capacity }} {{ $room->capacity > 1 ? 'Guests' : 'Guest' }}</span>
                                <i class="fas fa-bed mx-4 mr-2"></i>
                                <span>{{ $room->bed_type }}</span>
                            </div>
                            <div class="flex space-x-4 mb-4">
                                @if ($room->has_wifi)
                                    <span class="inline-flex items-center text-sm text-gray-500">
                                        <i class="fas fa-wifi mr-1"></i> WiFi
                                    </span>
                                @endif
                                @if ($room->has_ac)
                                    <span class="inline-flex items-center text-sm text-gray-500">
                                        <i class="fas fa-snowflake mr-1"></i> AC
                                    </span>
                                @endif
                                @if ($room->has_tv)
                                    <span class="inline-flex items-center text-sm text-gray-500">
                                        <i class="fas fa-tv mr-1"></i> TV
                                    </span>
                                @endif
                            </div>
                            <a href="{{ route('rooms.show', $room) }}" class="block w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md text-center font-medium">
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">No rooms available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-8">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
    
    <!-- Room Features -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Room Features & Amenities
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    All our rooms come with these standard features for your comfort.
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                        <i class="fas fa-wifi text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Free WiFi</h3>
                    <p class="text-gray-500">Stay connected with our high-speed internet access available in all rooms.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                        <i class="fas fa-coffee text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Coffee Maker</h3>
                    <p class="text-gray-500">Start your day with freshly brewed coffee from the in-room coffee maker.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                        <i class="fas fa-bath text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Luxury Bathroom</h3>
                    <p class="text-gray-500">Enjoy our premium bathrooms with complimentary toiletries and fresh towels.</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                        <i class="fas fa-concierge-bell text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Room Service</h3>
                    <p class="text-gray-500">24/7 room service available for your convenience during your stay.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="bg-indigo-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to book your stay?</span>
                <span class="block text-indigo-200">Contact us for special rates and packages.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        Contact Us
                    </a>
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