<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hotel Az') }} - Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        body { padding-top: 0 !important; }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
        
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-indigo-700 lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-white">Hotel<span class="text-amber-400">Az</span> Admin</span>
                </div>
            </div>
            
            <nav class="mt-10">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 bg-opacity-50 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white' }}">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span class="mx-3">Dashboard</span>
                </a>
                
                <a href="{{ route('admin.rooms.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.rooms.*') ? 'bg-indigo-800 bg-opacity-50 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white' }}">
                    <i class="fas fa-bed w-6"></i>
                    <span class="mx-3">Rooms</span>
                </a>
                
                <a href="{{ route('admin.reservations.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.reservations.*') ? 'bg-indigo-800 bg-opacity-50 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white' }}">
                    <i class="fas fa-calendar-check w-6"></i>
                    <span class="mx-3">Reservations</span>
                </a>
                
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.users.*') ? 'bg-indigo-800 bg-opacity-50 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white' }}">
                    <i class="fas fa-users w-6"></i>
                    <span class="mx-3">Users</span>
                </a>
                
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.testimonials.*') ? 'bg-indigo-800 bg-opacity-50 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white' }}">
                    <i class="fas fa-comment w-6"></i>
                    <span class="mx-3">Testimonials</span>
                </a>

                <a href="{{ route('admin.galleries.index') }}" class="flex items-center px-6 py-3 {{ request()->routeIs('admin.galleries.*') ? 'bg-indigo-800 bg-opacity-50 text-white' : 'text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white' }}">
                    <i class="fas fa-images w-6"></i>
                    <span class="mx-3">Gallery</span>
                </a>
                
                <div class="border-t border-indigo-800 my-4"></div>
                
                <a href="{{ route('home') }}" class="flex items-center px-6 py-3 text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white">
                    <i class="fas fa-home w-6"></i>
                    <span class="mx-3">Back to Website</span>
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="flex items-center px-6 py-3 text-indigo-100 hover:bg-indigo-800 hover:bg-opacity-50 hover:text-white">
                    @csrf
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <button type="submit" class="mx-3">Logout</button>
                </form>
            </nav>
        </div>

        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-6 py-4 bg-white border-b-4 border-indigo-600">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <div class="relative mx-4 lg:mx-0">
                        <span class="text-gray-600 font-semibold">
                            @yield('header', 'Dashboard')
                        </span>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 relative focus:outline-none">
                            @if(Auth::user()->profile_picture)
                            <img class="h-9 w-9 rounded-full object-cover" src="{{ Storage::url(Auth::user()->profile_picture) }}" alt="{{ Auth::user()->name }}">
                            @else
                            <div class="h-9 w-9 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-600">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            @endif
                            <span class="text-gray-700">{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mx-6 mt-4">
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif
            
            @if(session('error'))
                <div class="mx-6 mt-4">
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html> 