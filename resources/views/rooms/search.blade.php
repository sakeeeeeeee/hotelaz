@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
    <!-- Hero Section -->
    <div class="bg-indigo-700 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-extrabold text-white tracking-tight">
                    Available Rooms
                </h1>
                <p class="mt-2 text-lg text-indigo-200">
                    {{ \Carbon\Carbon::parse($checkIn)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($checkOut)->format('M d, Y') }} · {{ $guests }} {{ $guests > 1 ? 'Guests' : 'Guest' }}
                </p>
            </div>
        </div>
    </div>
    
    <!-- Search Form -->
    <div class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <form action="{{ route('rooms.search') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @csrf
                <div>
                    <label for="check_in" class="block text-sm font-medium text-gray-700">Check In</label>
                    <input type="date" name="check_in" id="check_in" value="{{ $checkIn }}" min="{{ date('Y-m-d') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="check_out" class="block text-sm font-medium text-gray-700">Check Out</label>
                    <input type="date" name="check_out" id="check_out" value="{{ $checkOut }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="guests" class="block text-sm font-medium text-gray-700">Guests</label>
                    <select name="guests" id="guests" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $i == $guests ? 'selected' : '' }}>{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-medium">
                        Update Search
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Results Section -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">
                        {{ $availableRooms->total() }} {{ $availableRooms->total() === 1 ? 'Room' : 'Rooms' }} Available
                    </h2>
                    <p class="text-gray-500">
                        For {{ \Carbon\Carbon::parse($checkIn)->diffInDays(\Carbon\Carbon::parse($checkOut)) }} {{ \Carbon\Carbon::parse($checkIn)->diffInDays(\Carbon\Carbon::parse($checkOut)) > 1 ? 'nights' : 'night' }}
                    </p>
                </div>
                <div>
                    <label for="sort" class="sr-only">Sort by</label>
                    <select id="sort" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="price_asc">Price: Low to High</option>
                        <option value="price_desc">Price: High to Low</option>
                        <option value="capacity_asc">Capacity: Low to High</option>
                        <option value="capacity_desc">Capacity: High to Low</option>
                    </select>
                </div>
            </div>
            
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($availableRooms as $room)
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
                            
                            <div class="mt-4 border-t border-gray-200 pt-4">
                                <div class="flex justify-between items-center mb-4">
                                    <div class="text-gray-700">
                                        <span class="font-semibold text-xl">{{ number_format($room->price_per_night * \Carbon\Carbon::parse($checkIn)->diffInDays(\Carbon\Carbon::parse($checkOut)), 0) }}</span>
                                        <span class="text-gray-500 text-sm"> total for {{ \Carbon\Carbon::parse($checkIn)->diffInDays(\Carbon\Carbon::parse($checkOut)) }} {{ \Carbon\Carbon::parse($checkIn)->diffInDays(\Carbon\Carbon::parse($checkOut)) > 1 ? 'nights' : 'night' }}</span>
                                    </div>
                                </div>
                                
                                <div class="flex space-x-4">
                                    <a href="{{ route('rooms.show', $room) }}" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 px-4 rounded-md text-center font-medium">
                                        View Details
                                    </a>
                                    <a href="{{ route('reservations.create', ['room' => $room, 'check_in' => $checkIn, 'check_out' => $checkOut, 'guests' => $guests]) }}" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md text-center font-medium">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white p-8 rounded-lg shadow-md text-center">
                        <i class="fas fa-search text-4xl text-indigo-300 mb-4"></i>
                        <h3 class="text-xl font-medium text-gray-900 mb-2">No Rooms Available</h3>
                        <p class="text-gray-500 mb-6">
                            We couldn't find any available rooms matching your search criteria.
                            Try adjusting your dates or guest count.
                        </p>
                        <a href="{{ route('rooms.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                            Browse All Rooms
                        </a>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-8">
                {{ $availableRooms->appends(['check_in' => $checkIn, 'check_out' => $checkOut, 'guests' => $guests])->links() }}
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
        
        // Handle sorting
        const sortSelect = document.getElementById('sort');
        const roomsContainer = document.querySelector('.grid');
        const roomCards = Array.from(document.querySelectorAll('.grid > div'));
        
        sortSelect.addEventListener('change', function() {
            const sortValue = this.value;
            
            roomCards.sort(function(a, b) {
                if (sortValue === 'price_asc') {
                    const priceA = parseInt(a.querySelector('.bg-amber-500').textContent.replace(/[^0-9]/g, ''));
                    const priceB = parseInt(b.querySelector('.bg-amber-500').textContent.replace(/[^0-9]/g, ''));
                    return priceA - priceB;
                } else if (sortValue === 'price_desc') {
                    const priceA = parseInt(a.querySelector('.bg-amber-500').textContent.replace(/[^0-9]/g, ''));
                    const priceB = parseInt(b.querySelector('.bg-amber-500').textContent.replace(/[^0-9]/g, ''));
                    return priceB - priceA;
                } else if (sortValue === 'capacity_asc') {
                    const capacityA = parseInt(a.querySelector('.fa-user-friends').nextElementSibling.textContent);
                    const capacityB = parseInt(b.querySelector('.fa-user-friends').nextElementSibling.textContent);
                    return capacityA - capacityB;
                } else if (sortValue === 'capacity_desc') {
                    const capacityA = parseInt(a.querySelector('.fa-user-friends').nextElementSibling.textContent);
                    const capacityB = parseInt(b.querySelector('.fa-user-friends').nextElementSibling.textContent);
                    return capacityB - capacityA;
                }
            });
            
            // Remove all room cards
            roomCards.forEach(card => card.remove());
            
            // Add sorted room cards back to the container
            roomCards.forEach(card => roomsContainer.appendChild(card));
        });
    });
</script>
@endpush 