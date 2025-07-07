@extends('layouts.app')

@section('title', 'Our Rooms')

@push('head')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
@endpush

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-darkest-green overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" alt="Hotel Room" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-darkest-green"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-lightest-green tracking-tight slide-in">
                    Our Rooms & Suites
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-light-green slide-in">
                    Discover our selection of luxurious rooms and suites designed for your comfort and relaxation.
                </p>
            </div>
        </div>
    </div>
    
    <!-- Room Search Form -->
    <div class="bg-dark-green shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <form action="{{ route('rooms.search') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @csrf
                <div>
                    <label for="check_in" class="block text-sm font-medium text-lightest-green">Check In</label>
                    <input type="date" name="check_in" id="check_in" min="{{ date('Y-m-d') }}" required class="mt-1 block w-full rounded-md border-light-green shadow-sm focus:border-medium-green focus:ring-medium-green bg-lightest-green text-darkest-green">
                </div>
                <div>
                    <label for="check_out" class="block text-sm font-medium text-lightest-green">Check Out</label>
                    <input type="date" name="check_out" id="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required class="mt-1 block w-full rounded-md border-light-green shadow-sm focus:border-medium-green focus:ring-medium-green bg-lightest-green text-darkest-green">
                </div>
                <div>
                    <label for="guests" class="block text-sm font-medium text-lightest-green">Guests</label>
                    <select name="guests" id="guests" required class="mt-1 block w-full rounded-md border-light-green shadow-sm focus:border-medium-green focus:ring-medium-green bg-lightest-green text-darkest-green">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-medium-green hover:bg-light-green text-darkest-green py-2 px-4 rounded-md font-medium">
                        Check Availability
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Rooms Section -->
    <div class="bg-lightest-green py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div 
                x-data="{ 
                    init() {
                        AOS.init({
                            duration: 800,
                            once: true
                        });
                    }
                }"
                class="mt-6 grid gap-8 md:grid-cols-2 lg:grid-cols-3"
            >
                @forelse ($rooms as $index => $room)
                    <div 
                        x-data="{ isHovered: false }"
                        @mouseenter="isHovered = true"
                        @mouseleave="isHovered = false"
                        data-aos="fade-up"
                        data-aos-delay="{{ $index * 100 }}"
                        class="bg-lightest-green overflow-hidden shadow-lg rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl relative"
                    >
                        <div class="relative pb-2/3 overflow-hidden">
                            @if ($room->featured_image)
                                <img 
                                    src="{{ route('storage.image', ['path' => $room->featured_image]) }}" 
                                    alt="{{ $room->name }}" 
                                    class="w-full h-64 object-cover transition-transform duration-300 ease-in-out"
                                    :class="{ 'scale-110': isHovered }"
                                >
                            @else
                                <div class="w-full h-64 bg-light-green flex items-center justify-center">
                                    <span class="text-darkest-green text-lg">No Image Available</span>
                                </div>
                            @endif
                            <div class="absolute top-0 right-0 bg-medium-green text-darkest-green px-3 py-1 m-2 rounded-md font-semibold">
                                {{ number_format($room->price_per_night, 0) }} / night
                            </div>
                        </div>
                        
                        <div 
                            class="p-6 transition-all duration-300 ease-in-out"
                            x-show="!isHovered"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                        >
                            <h3 class="text-xl font-semibold text-darkest-green mb-2">{{ $room->name }}</h3>
                            <p class="text-dark-green mb-4">{{ Str::limit($room->description, 100) }}</p>
                            <div class="flex items-center text-dark-green mb-4">
                                <i class="fas fa-user-friends mr-2"></i>
                                <span>{{ $room->capacity }} {{ $room->capacity > 1 ? 'Guests' : 'Guest' }}</span>
                            </div>
                            <div class="flex space-x-4 mb-4">
                                @if ($room->has_wifi)
                                    <span class="inline-flex items-center text-sm text-dark-green">
                                        <i class="fas fa-wifi mr-1"></i> WiFi
                                    </span>
                                @endif
                                @if ($room->has_ac)
                                    <span class="inline-flex items-center text-sm text-dark-green">
                                        <i class="fas fa-snowflake mr-1"></i> AC
                                    </span>
                                @endif
                                @if ($room->has_tv)
                                    <span class="inline-flex items-center text-sm text-dark-green">
                                        <i class="fas fa-tv mr-1"></i> TV
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div 
                            x-show="isHovered"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="absolute inset-0 bg-darkest-green bg-opacity-80 text-white p-6 flex flex-col justify-center items-center text-center"
                        >
                            <h3 class="text-2xl font-bold mb-4">{{ $room->name }}</h3>
                            <p class="mb-4 text-light-green">{{ Str::limit($room->description, 150) }}</p>
                            <div class="flex space-x-4 mb-4">
                                <span class="inline-flex items-center text-sm">
                                    <i class="fas fa-users mr-2"></i> {{ $room->capacity }} {{ $room->capacity > 1 ? 'Guests' : 'Guest' }}
                                </span>
                                <span class="inline-flex items-center text-sm">
                                    <i class="fas fa-dollar-sign mr-1"></i> {{ number_format($room->price_per_night, 0) }} / night
                                </span>
                            </div>
                            <a 
                                href="{{ route('rooms.show', $room) }}" 
                                class="bg-medium-green hover:bg-light-green text-darkest-green py-2 px-4 rounded-md transition-all duration-300 ease-in-out transform hover:scale-105"
                            >
                                View Details
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-dark-green">No rooms available at the moment.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-8">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
    
    <!-- Room Features -->
    <div class="bg-light-green py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-darkest-green sm:text-4xl">
                    Room Features & Amenities
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-dark-green sm:mt-4">
                    All our rooms come with these standard features for your comfort.
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                <div class="bg-lightest-green p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-light-green text-darkest-green mb-4">
                        <i class="fas fa-wifi text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-darkest-green mb-2">Free WiFi</h3>
                    <p class="text-dark-green">Stay connected with our high-speed internet access available in all rooms.</p>
                </div>
                
                <div class="bg-lightest-green p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-light-green text-darkest-green mb-4">
                        <i class="fas fa-coffee text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-darkest-green mb-2">Coffee Maker</h3>
                    <p class="text-dark-green">Start your day with freshly brewed coffee from the in-room coffee maker.</p>
                </div>
                
                <div class="bg-lightest-green p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-light-green text-darkest-green mb-4">
                        <i class="fas fa-bath text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-darkest-green mb-2">Luxury Bathroom</h3>
                    <p class="text-dark-green">Enjoy our premium bathrooms with complimentary toiletries and fresh towels.</p>
                </div>
                
                <div class="bg-lightest-green p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-light-green text-darkest-green mb-4">
                        <i class="fas fa-concierge-bell text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-darkest-green mb-2">Room Service</h3>
                    <p class="text-dark-green">24/7 room service available for your convenience during your stay.</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="bg-darkest-green">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-lightest-green sm:text-4xl">
                <span class="block">Ready to book your stay?</span>
                <span class="block text-light-green">Contact us for special rates and packages.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-darkest-green bg-lightest-green hover:bg-light-green">
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

        // Reinitialize AOS on page load to ensure animations work
        AOS.init({
            duration: 800,
            once: true
        });
    });
</script>
@endpush 