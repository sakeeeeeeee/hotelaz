@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <style>
        /* Custom styles to override any conflicting CSS */
        .hero-heading {
            background: linear-gradient(to right, #fbbf24, #fef3c7, #fbbf24);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textShine 5s ease infinite;
        }
        
        .hero-text {
            color: #fcd34d !important;
        }
        
        .hero-description {
            color: #fef3c7 !important;
        }
        
        .hero-brand {
            color: #f59e0b !important;
            font-weight: bold;
        }
        
        .hero-stat {
            color: #fbbf24 !important;
        }
        
        .hero-stat-label {
            color: #fde68a !important;
        }
        
        .hero-divider {
            background-color: rgba(146, 64, 14, 0.5) !important;
        }
        
        .browse-button {
            background-color: #f59e0b !important;
            color: #000 !important;
        }
        
        .contact-button {
            color: #fcd34d !important;
            border-color: #fcd34d !important;
        }
        
        .contact-button:hover {
            background-color: rgba(146, 64, 14, 0.2) !important;
        }
        
        @keyframes textShine {
            0%, 100% {
                background-position: left center;
            }
            50% {
                background-position: right center;
            }
        }
    </style>
    
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <!-- Video Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/70 via-gray-900/50 to-gray-900/90 z-10"></div>
            <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Hotel Luxury" class="w-full h-full object-cover opacity-80">
        </div>
        
        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 lg:py-32">
            <div class="text-center" id="hero-content">
                <h1 class="hero-heading text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight">
                    Escape to Luxury
                </h1>
                
                <div class="mt-3 flex justify-center space-x-2">
                    <span class="hero-text text-lg md:text-xl font-light typing-animation">Relax.</span>
                    <span class="hero-text text-lg md:text-xl font-light typing-animation delay-1000">Indulge.</span>
                    <span class="hero-text text-lg md:text-xl font-light typing-animation delay-2000">Experience.</span>
                </div>
                
                <p class="hero-description mt-4 max-w-2xl mx-auto text-lg leading-relaxed">
                    Welcome to <span class="hero-brand">HotelAz</span>, where every stay becomes an unforgettable journey of comfort and elegance.
                </p>
                
                <div class="mt-8 flex flex-col sm:flex-row justify-center gap-3 md:mt-8">
                    <div class="rounded-md shadow hover:shadow-lg transform hover:-translate-y-1 transition duration-300 w-full sm:w-auto">
                        <a href="{{ route('rooms.index') }}" class="browse-button w-full flex items-center justify-center px-6 py-2 border border-transparent text-base font-medium rounded-md md:py-3 md:text-lg md:px-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7z" />
                                <path d="M4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                            Browse Rooms
                        </a>
                    </div>
                    
                    <div class="rounded-md shadow hover:shadow-lg transform hover:-translate-y-1 transition duration-300 w-full sm:w-auto">
                        <a href="{{ route('contact') }}" class="contact-button w-full flex items-center justify-center px-6 py-2 border text-base font-medium rounded-md md:py-3 md:text-lg md:px-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                            </svg>
                            Contact Us
                        </a>
                    </div>
                </div>
                
                <div class="mt-8 flex justify-center">
                    <div class="flex items-center space-x-6">
                        <div class="flex flex-col items-center">
                            <div class="hero-stat text-2xl font-bold">300+</div>
                            <div class="hero-stat-label text-xs opacity-75">Luxury Rooms</div>
                        </div>
                        <div class="hero-divider h-8 w-px"></div>
                        <div class="flex flex-col items-center">
                            <div class="hero-stat text-2xl font-bold">24/7</div>
                            <div class="hero-stat-label text-xs opacity-75">Concierge</div>
                        </div>
                        <div class="hero-divider h-8 w-px"></div>
                        <div class="flex flex-col items-center">
                            <div class="hero-stat text-2xl font-bold">5★</div>
                            <div class="hero-stat-label text-xs opacity-75">Experience</div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute bottom-4 left-0 right-0 text-center animate-bounce">
                    <a href="#search" class="inline-block text-amber-400">
                        <span class="sr-only">Scroll Down</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#fbbf24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Room Search Form -->
    <div id="search" class="bg-gradient-to-r from-indigo-700 to-blue-700 shadow-xl" data-aos="fade-up" data-aos-offset="-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h2 class="text-2xl font-bold text-white text-center mb-6">Find Your Perfect Stay</h2>
            <form action="{{ route('rooms.search') }}" method="POST" class="grid grid-cols-1 md:grid-cols-4 gap-5">
                @csrf
                <div>
                    <label for="check_in" class="block text-sm font-medium text-white">Check In</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date" name="check_in" id="check_in" min="{{ date('Y-m-d') }}" required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 py-3">
                    </div>
                </div>
                <div>
                    <label for="check_out" class="block text-sm font-medium text-white">Check Out</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date" name="check_out" id="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 py-3">
                    </div>
                </div>
                <div>
                    <label for="guests" class="block text-sm font-medium text-white">Guests</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <select name="guests" id="guests" required class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 py-3">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white py-3 px-4 rounded-md font-medium hover:-translate-y-1 transition-transform duration-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        Check Availability
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Featured Rooms Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-block rounded-full bg-blue-100 px-3 py-1 text-sm font-semibold text-blue-800 mb-4">
                    Premium Selection
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl">
                    Exceptional Accommodations
                </h2>
                <div class="w-24 h-1 bg-amber-400 mx-auto mt-6 rounded-full"></div>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
                    Discover our handpicked selection of rooms and suites designed for unforgettable experiences.
                </p>
            </div>
            
            <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="featured-rooms">
                <!-- Room Card 1 -->
                <div class="group rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 bg-white">
                    <div class="relative h-72 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Deluxe Room" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1.5 rounded-lg font-semibold shadow-lg">
                            850,000 <span class="text-xs">/night</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Deluxe Room</h3>
                        <p class="mt-3 text-gray-600 line-clamp-3">Experience luxury in our spacious deluxe room with all modern amenities and breathtaking views.</p>
                        
                        <div class="mt-5 flex items-center text-gray-500 space-x-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                                <span>2 Guests</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7z" />
                                    <path d="M4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                                <span>King Size Bed</span>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                WiFi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                AC
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                Smart TV
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Breakfast
                            </span>
                        </div>
                        
                        <div class="mt-6">
                            <a href="{{ route('rooms.index') }}" class="block w-full py-3 px-4 rounded-lg border-2 border-blue-600 text-blue-600 font-medium text-center hover:bg-blue-600 hover:text-white transition-colors duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Room Card 2 -->
                <div class="group rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 bg-white">
                    <div class="relative h-72 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Family Suite" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1.5 rounded-lg font-semibold shadow-lg">
                            1,250,000 <span class="text-xs">/night</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Family Suite</h3>
                        <p class="mt-3 text-gray-600 line-clamp-3">Perfect for families, our spacious suite features two bedrooms, a living area, and a private balcony.</p>
                        
                        <div class="mt-5 flex items-center text-gray-500 space-x-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                                <span>4 Guests</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7z" />
                                    <path d="M4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                                <span>2 Queen Size Beds</span>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                WiFi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                AC
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                Smart TV
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Breakfast
                            </span>
                        </div>
                        
                        <div class="mt-6">
                            <a href="{{ route('rooms.index') }}" class="block w-full py-3 px-4 rounded-lg border-2 border-blue-600 text-blue-600 font-medium text-center hover:bg-blue-600 hover:text-white transition-colors duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Room Card 3 -->
                <div class="group rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 bg-white">
                    <div class="relative h-72 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Executive Suite" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1.5 rounded-lg font-semibold shadow-lg">
                            1,500,000 <span class="text-xs">/night</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">Executive Suite</h3>
                        <p class="mt-3 text-gray-600 line-clamp-3">Our premium executive suite offers luxury amenities, a separate living area, and exclusive access to our lounge.</p>
                        
                        <div class="mt-5 flex items-center text-gray-500 space-x-6">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                </svg>
                                <span>2 Guests</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7z" />
                                    <path d="M4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                                <span>Super King Bed</span>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                WiFi
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                AC
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                Smart TV
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Breakfast
                            </span>
                        </div>
                        
                        <div class="mt-6">
                            <a href="{{ route('rooms.index') }}" class="block w-full py-3 px-4 rounded-lg border-2 border-blue-600 text-blue-600 font-medium text-center hover:bg-blue-600 hover:text-white transition-colors duration-300">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <a href="{{ route('rooms.index') }}" class="inline-flex items-center px-8 py-4 rounded-lg text-white font-medium bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    View All Rooms
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Facilities Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-block rounded-full bg-indigo-100 px-3 py-1 text-sm font-semibold text-indigo-800 mb-4">
                    World-Class Amenities
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl">
                    Exceptional Facilities
                </h2>
                <div class="w-24 h-1 bg-amber-400 mx-auto mt-6 rounded-full"></div>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
                    Indulge in our premium facilities designed to elevate your stay experience.
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8" id="facilities-grid">
    <!-- Tambah fasilitas baru dengan copy-paste struktur card di bawah ini -->
                <!-- Facility Card 1: Restaurant -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Restaurant" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/80 via-indigo-900/50 to-indigo-900/30 bg-opacity-70 group-hover:bg-opacity-80 transition-all"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="rounded-full bg-white/20 p-3 backdrop-blur-sm mb-4 mx-auto w-16 h-16 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Restaurant</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Enjoy delicious meals at our in-house restaurant with a variety of local and international cuisines.</p>
                        <a href="{{ route('facilities.restaurant') }}" class="inline-flex items-center text-indigo-600 font-medium hover:text-indigo-500 transition-colors">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Facility Card 2: Swimming Pool -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1540539234-c14a20fb7c7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Swimming Pool" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-blue-900/50 to-blue-900/30 bg-opacity-70 group-hover:bg-opacity-80 transition-all"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="rounded-full bg-white/20 p-3 backdrop-blur-sm mb-4 mx-auto w-16 h-16 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Swimming Pool</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Take a refreshing dip in our infinity pool with breathtaking views or relax on the luxurious sun loungers.</p>
                        <a href="{{ route('facilities.swimming-pool') }}" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-500 transition-colors">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Facility Card 3: Spa & Wellness -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Spa & Wellness" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 via-purple-900/50 to-purple-900/30 bg-opacity-70 group-hover:bg-opacity-80 transition-all"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="rounded-full bg-white/20 p-3 backdrop-blur-sm mb-4 mx-auto w-16 h-16 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Spa & Wellness</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Rejuvenate your body and mind with our range of spa treatments, sauna, and wellness activities.</p>
                        <a href="{{ route('facilities.spa') }}" class="inline-flex items-center text-purple-600 font-medium hover:text-purple-500 transition-colors">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Facility Card 4: Fitness Center -->
                <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="relative h-56 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1593079831268-3381b0db4a77?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Fitness Center" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-emerald-900/80 via-emerald-900/50 to-emerald-900/30 bg-opacity-70 group-hover:bg-opacity-80 transition-all"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="rounded-full bg-white/20 p-3 backdrop-blur-sm mb-4 mx-auto w-16 h-16 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Fitness Center</h3>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-600 mb-4">Stay active in our state-of-the-art fitness center with modern equipment and professional trainers.</p>
                        <a href="{{ route('facilities.fitness') }}" class="inline-flex items-center text-emerald-600 font-medium hover:text-emerald-500 transition-colors">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('facilities.restaurant') }}" class="inline-flex items-center px-8 py-4 rounded-lg text-white font-medium bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    Explore All Facilities
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Testimonials Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-block rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-800 mb-4">
                    Guest Experiences
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl lg:text-5xl">
                    What Our Guests Say
                </h2>
                <div class="w-24 h-1 bg-amber-400 mx-auto mt-6 rounded-full"></div>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500">
                    Discover why guests choose HotelAz for their memorable stays.
                </p>
            </div>
            
            <div class="mt-16 grid gap-8 md:grid-cols-3">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-md hover:shadow-xl transition-shadow">
                    <div class="flex items-center mb-6">
                        <div class="text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="italic text-gray-600 mb-6">
                        "My stay at HotelAz was absolutely exceptional! The staff went above and beyond to make me feel welcome, the room was immaculate, and the amenities were top-notch. I particularly enjoyed the infinity pool with its breathtaking views."
                    </div>
                    
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Guest" class="h-12 w-12 rounded-full object-cover mr-4">
                        <div>
                            <div class="font-semibold text-gray-900">Sarah Johnson</div>
                            <div class="text-sm text-gray-500">Business Traveler</div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-md hover:shadow-xl transition-shadow">
                    <div class="flex items-center mb-6">
                        <div class="text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="italic text-gray-600 mb-6">
                        "We celebrated our anniversary at HotelAz and it was truly memorable. The Executive Suite was luxurious and romantic, the restaurant served exquisite dishes, and the spa treatments were incredibly relaxing. We'll definitely return!"
                    </div>
                    
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Guest" class="h-12 w-12 rounded-full object-cover mr-4">
                        <div>
                            <div class="font-semibold text-gray-900">Michael & Lisa Chen</div>
                            <div class="text-sm text-gray-500">Couple</div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-md hover:shadow-xl transition-shadow">
                    <div class="flex items-center mb-6">
                        <div class="text-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="italic text-gray-600 mb-6">
                        "Perfect for our family vacation! The Family Suite was spacious and beautifully designed. Our kids loved the swimming pool, and we appreciated the attentive service and family-friendly amenities. Highly recommend for families!"
                    </div>
                    
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/63.jpg" alt="Guest" class="h-12 w-12 rounded-full object-cover mr-4">
                        <div>
                            <div class="font-semibold text-gray-900">Amanda Rodriguez</div>
                            <div class="text-sm text-gray-500">Family Traveler</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Newsletter Section -->
    <div class="bg-indigo-700 py-12 animated-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:justify-between" data-aos="fade-up">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        Subscribe to Our Newsletter
                    </h2>
                    <p class="mt-3 max-w-2xl text-lg text-indigo-100">
                        Stay updated with our latest offers, promotions, and news. Be the first to know about our seasonal deals and special events.
                    </p>
                </div>
                <div class="mt-8 lg:mt-0 lg:w-1/2">
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex flex-col sm:flex-row gap-3">
                        @csrf
                        <div class="w-full sm:max-w-xs">
                            <label for="email" class="sr-only">Email address</label>
                            <input type="email" name="email" id="email" placeholder="Enter your email" required
                                   class="w-full px-4 py-3 border-white focus:ring-amber-500 focus:border-amber-500 block w-full rounded-md hover-lift">
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white py-3 px-4 rounded-md font-medium hover-lift">
                                Subscribe
                            </button>
                        </div>
                    </form>
                    <p class="mt-3 text-sm text-indigo-100">
                        We care about your data. Read our <a href="#" class="text-white underline hover-underline">Privacy Policy</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- CTA Section -->
    <div class="bg-indigo-700 animated-bg">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between" data-aos="fade-up">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to experience luxury?</span>
                <span class="block text-indigo-200">Book your stay today.</span>
            </h2>
            <div class="mt-8 flex flex-col sm:flex-row gap-3 lg:mt-0 lg:flex-shrink-0">
                <div class="rounded-md shadow hover-lift w-full sm:w-auto">
                    <a href="{{ route('rooms.index') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        Book Now
                    </a>
                </div>
                <div class="rounded-md shadow hover-lift w-full sm:w-auto">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-800 hover:bg-indigo-900">
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
        // Initialize star rating
        const ratingInputs = document.querySelectorAll('input[name="rating"]');
        const starIcons = document.querySelectorAll('.fa-star');
        
        ratingInputs.forEach((input, index) => {
            input.addEventListener('change', function() {
                // Reset all stars
                starIcons.forEach((star, i) => {
                    if (i <= index) {
                        star.classList.remove('far');
                        star.classList.add('fas');
                    } else {
                        star.classList.remove('fas');
                        star.classList.add('far');
                    }
                });
            });
        });
        
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
        
        // GSAP animations for a more dynamic hero section
        gsap.timeline()
            .from("#hero-content h1", {
                y: 50,
                opacity: 0,
                duration: 0.8,
                ease: "power3.out"
            })
            .from("#hero-content p", {
                y: 30,
                opacity: 0,
                duration: 0.8,
                ease: "power3.out"
            }, "-=0.4")
            .from("#hero-content .rounded-md", {
                y: 20,
                opacity: 0,
                duration: 0.6,
                stagger: 0.2,
                ease: "power3.out"
            }, "-=0.4");
            
        // Create scroll animations for the featured rooms
        gsap.from("#featured-rooms .grid-item-appear", {
            scrollTrigger: {
                trigger: "#featured-rooms",
                start: "top 80%"
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power3.out"
        });
        
        // NONAKTIFKAN ANIMASI FASILITAS AGAR CARD SELALU MUNCUL
        // gsap.from("#facilities-grid > div", {
        //     scrollTrigger: {
        //         trigger: "#facilities-grid",
        //         start: "top 80%"
        //     },
        //     y: 30,
        //     opacity: 0,
        //     duration: 0.6,
        //     stagger: 0.15,
        //     ease: "power3.out"
        // });
        
        // Create scroll animations for the gallery section
        gsap.from("#gallery-grid > div", {
            scrollTrigger: {
                trigger: "#gallery-grid",
                start: "top 80%"
            },
            scale: 0.9,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: "power3.out"
        });
        
        // Create scroll animations for the testimonials section
        gsap.from("#testimonials-grid > div", {
            scrollTrigger: {
                trigger: "#testimonials-grid",
                start: "top 80%"
            },
            y: 30,
            opacity: 0,
            duration: 0.6,
            stagger: 0.15,
            ease: "power3.out"
        });
    });
</script>
@endpush 