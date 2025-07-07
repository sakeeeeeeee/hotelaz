<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hotel Az') }} - @yield('title', 'Welcome')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animation Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        [x-cloak] { display: none !important; }
        
        /* Base animations */
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-in-out;
        }
        
        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        /* Modern tech company inspired animations */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .text-gradient {
            background: linear-gradient(90deg, var(--color-medium-green), var(--color-light-green));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .btn-gradient {
            background: linear-gradient(90deg, var(--color-medium-green), var(--color-light-green));
            transition: all 0.3s ease;
            display: inline-block; /* Fix for button alignment */
            text-align: center;
        }
        
        .btn-gradient:hover {
            background: linear-gradient(90deg, var(--color-dark-green), var(--color-medium-green));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        }
        
        .grid-item-appear {
            transition: opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), 
                        transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Animated background */
        .animated-bg {
            position: relative;
            overflow: hidden;
        }
        
        .animated-bg:before {
            content: '';
            position: absolute;
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            background: linear-gradient(
                315deg, 
                rgba(79, 70, 229, 0.2) 0%, 
                rgba(0, 0, 0, 0) 70%
            );
            animation: rotate 15s linear infinite;
        }
        
        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        /* Animated underline effect */
        .hover-underline {
            position: relative;
        }
        
        .hover-underline:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: linear-gradient(90deg, #4f46e5, #ec4899);
            transition: width 0.3s ease;
        }
        
        .hover-underline:hover:after {
            width: 100%;
        }
        
        /* Fix for button alignment */
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Fix for flexbox gaps */
        @media (max-width: 640px) {
            .sm\:flex {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .sm\:mt-0 {
                margin-top: 0.5rem;
            }
        }
        
        body {
            padding-top: 64px; /* Sesuaikan dengan tinggi navbar */
        }
        
        @media (max-width: 640px) {
            body {
                padding-top: 56px; /* Tinggi navbar untuk layar kecil */
            }
        }
        
        /* Navbar styles */
        nav {
            background-color: var(--color-darkest-green);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        
        /* Default state */
        nav a {
            color: var(--color-lightest-green) !important;
            transition: color 0.3s ease, opacity 0.3s ease;
        }
        
        nav a:hover {
            color: var(--color-light-green) !important;
            opacity: 0.9;
        }
        
        nav .text-gradient {
            background: linear-gradient(90deg, var(--color-lightest-green), var(--color-light-green));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Scrolled state - keep consistent */
        nav.scrolled {
            background-color: var(--color-darkest-green);
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        /* Ensure consistent text color */
        nav a,
        nav.scrolled a {
            color: var(--color-lightest-green) !important;
        }
        
        nav .text-gradient,
        nav.scrolled .text-gradient {
            background: linear-gradient(90deg, var(--color-lightest-green), var(--color-light-green));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Active/Current page indicator */
        nav a.active {
            color: var(--color-light-green) !important;
            border-bottom: 2px solid var(--color-light-green);
        }
        
        /* Ensure navbar is always visible */
        body {
            padding-top: 64px;
        }
        
        @media (max-width: 640px) {
            body {
                padding-top: 56px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-lightest-green">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="sticky top-0 z-50" x-data="{ open: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-2xl font-bold">
                                <span class="text-gradient">Hotel<span class="text-amber-500">Az</span></span>
                            </a>
                        </div>
                        
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 hover-underline {{ request()->routeIs('home') ? 'active' : 'border-transparent' }} text-dark-green hover:text-medium-green">
                                Home
                            </a>
                            <a href="{{ route('rooms.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 hover-underline {{ request()->routeIs('rooms.*') ? 'active' : 'border-transparent' }} text-dark-green hover:text-medium-green">
                                Rooms
                            </a>
                            <a href="{{ route('gallery') }}" class="inline-flex items-center px-1 pt-1 border-b-2 hover-underline {{ request()->routeIs('gallery') ? 'active' : 'border-transparent' }} text-dark-green hover:text-medium-green">
                                Gallery
                            </a>
                            <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 hover-underline {{ request()->routeIs('about') ? 'active' : 'border-transparent' }} text-dark-green hover:text-medium-green">
                                About
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 hover-underline {{ request()->routeIs('contact') ? 'active' : 'border-transparent' }} text-dark-green hover:text-medium-green">
                                Contact
                            </a>
                        </div>
                    </div>
                    
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        @guest
                            <div class="ml-3 relative">
                                <button @click="$dispatch('open-auth-modal')" class="inline-flex items-center px-5 py-2 border border-gray-300 rounded-full text-sm font-medium text-dark-green bg-lightest-green hover:bg-light-green focus:outline-none transition duration-150 ease-in-out">
                                    <svg class="mr-2 h-4 w-4 text-dark-green" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Sign In or Join</span>
                                </button>
                            </div>
                        @else
                            <div class="ml-3 relative" x-data="{ open: false }">
                                <div>
                                    <button @click="open = !open" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        @if(Auth::user()->profile_picture)
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="{{ Auth::user()->name }}">
                                        @else
                                            <div class="h-8 w-8 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-600">
                                                {{ substr(Auth::user()->name, 0, 1) }}
                                            </div>
                                        @endif
                                    </button>
                                </div>
                                
                                <div x-show="open" @click.away="open = false" x-cloak class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                                    @if(Auth::user()->is_admin)
                                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Admin Dashboard
                                        </a>
                                    @endif
                                    
                                    <a href="{{ route('reservations.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        My Reservations
                                    </a>
                                    
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Profile
                                    </a>
                                    
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                    
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('home') ? 'border-medium-green text-darkest-green' : 'border-transparent text-dark-green hover:border-medium-green hover:text-dark-green' }}">
                        Home
                    </a>
                    <a href="{{ route('rooms.index') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('rooms.*') ? 'border-medium-green text-darkest-green' : 'border-transparent text-dark-green hover:border-medium-green hover:text-dark-green' }}">
                        Rooms
                    </a>
                    <a href="{{ route('gallery') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('gallery') ? 'border-medium-green text-darkest-green' : 'border-transparent text-dark-green hover:border-medium-green hover:text-dark-green' }}">
                        Gallery
                    </a>
                    <a href="{{ route('about') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('about') ? 'border-medium-green text-darkest-green' : 'border-transparent text-dark-green hover:border-medium-green hover:text-dark-green' }}">
                        About
                    </a>
                    <a href="{{ route('contact') }}" class="block pl-3 pr-4 py-2 border-l-4 {{ request()->routeIs('contact') ? 'border-medium-green text-darkest-green' : 'border-transparent text-dark-green hover:border-medium-green hover:text-dark-green' }}">
                        Contact
                    </a>
                </div>
                
                @guest
                    <div class="pt-4 pb-3 border-t border-gray-200">
                        <div class="space-y-1" x-data="{ dropdownOpen: false }">
                            <div class="px-4 py-2">
                                <button @click="$dispatch('open-auth-modal'); open = false; dropdownOpen = false;" class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-full shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                                    <svg class="mr-2 h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    Sign In or Join
                                </button>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>
        </nav>
        
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm fade-in" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm fade-in" role="alert">
                    <p>{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- Page Content -->
        <main class="flex-1">
            @yield('content')
        </main>
        
        <!-- Sidebar Auth Overlay -->
        <div
            x-data="{ show: false }"
            x-show="show"
            x-on:open-auth-modal.window="show = true"
            x-on:keydown.escape.window="show = false"
            class="fixed inset-0 z-[2001] pointer-events-none overflow-hidden"
            x-cloak
        >
            <!-- Sidebar panel -->
            <div class="fixed inset-y-0 right-0 max-w-full flex pointer-events-auto">
                <div 
                    x-show="show" 
                    x-transition:enter="transform transition ease-in-out duration-300"
                    x-transition:enter-start="translate-x-full" 
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition ease-in-out duration-300" 
                    x-transition:leave-start="translate-x-0" 
                    x-transition:leave-end="translate-x-full"
                    @click.away="show = false"
                    class="w-screen max-w-sm"
                >
                    <div class="h-full flex flex-col bg-white shadow-2xl overflow-y-auto">
                        <!-- Close button -->
                        <div class="absolute top-0 right-0 pt-4 pr-4">
                            <button @click="show = false" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Sidebar content -->
                        <div class="flex-1 flex flex-col divide-y divide-gray-200">
                            <!-- Join Now section -->
                            <div class="px-6 py-6 sm:px-8">
                                <div class="mb-6">
                                    <div class="flex justify-between items-center mb-4">
                                        <h2 class="text-2xl font-bold text-gray-900">Join Now</h2>
                                    </div>
                                    <p class="text-gray-600">
                                        Get unrivaled experiences, mobile check in, member rates, free in-room wifi and more.
                                    </p>
                                </div>
                                
                                <div class="mt-6">
                                    <a href="{{ route('register') }}" class="block w-full py-3 px-4 rounded-md shadow btn-gradient text-white font-medium text-center border border-transparent focus:outline-none">
                                        Join For Free
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Sign In section -->
                            <div class="px-6 py-6 sm:px-8 bg-gray-50 flex-1">
                                <div class="mb-6">
                                    <h2 class="text-2xl font-bold text-gray-900">Sign In</h2>
                                    @if ($errors->any())
                                    <div class="mt-2 text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                
                                <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                                    @csrf
                                    <div class="space-y-4">
                                        <div>
                                            <label for="email" class="block text-xs text-gray-500 font-medium mb-1">
                                                Email or Member Number
                                            </label>
                                            <input id="email" name="email" type="email" required 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="">
                                        </div>
                                        
                                        <div>
                                            <label for="password" class="block text-xs text-gray-500 font-medium mb-1">
                                                Password
                                            </label>
                                            <input id="password" name="password" type="password" required 
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="">
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center">
                                        <input id="remember" name="remember" type="checkbox" 
                                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                        <label for="remember" class="ml-2 block text-sm text-gray-900">
                                            Remember Me
                                        </label>
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white btn-gradient focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-medium-green">
                                            Sign In
                                        </button>
                                    </div>
                                </form>
                                
                                <div class="mt-6 flex flex-col items-center space-y-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-500 text-sm">
                                        Forgot Password
                                    </a>
                                    <a href="#" class="text-blue-600 hover:text-blue-500 text-sm">
                                        Activate Online Account
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Original Login Modal (hidden now) -->
        <div x-data="{ show: false }" x-on:open-login-modal.window="$dispatch('open-auth-modal')" x-cloak></div>
        
        <!-- Original Register Modal (hidden now) -->
        <div x-data="{ show: false }" x-on:open-register-modal.window="$dispatch('open-auth-modal')" x-cloak></div>
        
        <!-- Footer -->
        <footer class="bg-darkest-green text-lightest-green py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Hotel<span class="text-light-green">Az</span></h3>
                        <p class="text-light-green mb-4">Experience luxury and comfort at our premium hotel. We offer the best accommodations for your perfect stay.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-light-green hover:text-lightest-green">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-light-green hover:text-lightest-green">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="text-light-green hover:text-lightest-green">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-lightest-green">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="text-light-green hover:text-lightest-green">Home</a></li>
                            <li><a href="{{ route('rooms.index') }}" class="text-light-green hover:text-lightest-green">Rooms</a></li>
                            <li><a href="{{ route('about') }}" class="text-light-green hover:text-lightest-green">About Us</a></li>
                            <li><a href="{{ route('contact') }}" class="text-light-green hover:text-lightest-green">Contact Us</a></li>
                        </ul>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-lightest-green">Contact Info</h3>
                        <ul class="space-y-2 text-light-green">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                                <span>123 Hotel Street, City Name, Country</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-phone-alt mt-1 mr-2"></i>
                                <span>+1 234 567 890</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-envelope mt-1 mr-2"></i>
                                <span>info@hotelaz.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="border-t border-dark-green mt-8 pt-6 text-center text-light-green">
                    <p>&copy; {{ date('Y') }} HotelAz. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
    
    <!-- Animation Libraries -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.9/dist/scrollreveal.min.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out',
            once: true,
            offset: 100 // Adjusted to fix animation trigger points
        });
        
        // Initialize ScrollReveal
        const sr = ScrollReveal({
            origin: 'bottom',
            distance: '30px',
            duration: 1000,
            delay: 200,
            easing: 'cubic-bezier(0.5, 0, 0, 1)',
        });
        
        // Apply ScrollReveal to common elements
        sr.reveal('.sr-item', { interval: 100 });
        
        // GSAP Animations
        gsap.registerPlugin(ScrollTrigger);
        
        // Page transition effect
        window.addEventListener('load', () => {
            gsap.from('body', {
                opacity: 0,
                duration: 0.6,
                ease: 'power2.in'
            });
            
            // Fix any layout issues that might have occurred
            setTimeout(() => {
                window.dispatchEvent(new Event('resize'));
            }, 1000);
        });
    </script>
    
    @stack('scripts')
    
    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if it's a login or register error
            @if(in_array('email', $errors->keys()) && !in_array('name', $errors->keys()))
                window.dispatchEvent(new CustomEvent('open-auth-modal'));
            @else
                window.dispatchEvent(new CustomEvent('open-auth-modal'));
            @endif
        });
    </script>
    @endif
    
    <!-- Navbar Scroll Script -->
    <script>
        (function() {
            const navbar = document.querySelector('nav[x-data="{ open: false }"]');
            if (!navbar) return;

            const scrollThreshold = 50;
            let lastScrollTop = 0;

            function updateNavbar() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > scrollThreshold) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }

                lastScrollTop = scrollTop;
            }

            // Throttle scroll event
            let ticking = false;
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        updateNavbar();
                        ticking = false;
                    });

                    ticking = true;
                }
            });

            // Initial check
            updateNavbar();
        })();
    </script>
</body>
</html>