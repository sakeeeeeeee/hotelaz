@extends('layouts.app')

@section('title', 'Fitness Center')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" alt="Fitness Center" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight slide-in">
                    Fitness Center
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-300 slide-in">
                    State-of-the-art fitness facilities to keep you active during your stay
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Premium Fitness Experience</h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Our state-of-the-art fitness center is designed to meet the needs of fitness enthusiasts and casual exercisers alike. Whether you're maintaining your regular workout routine or starting a new fitness journey, our modern facility offers everything you need for an effective and enjoyable workout.
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                        The fitness center features premium cardio and strength training equipment from leading manufacturers, spacious workout areas, and professional staff ready to assist you with your fitness needs.
                    </p>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Fitness Center Features</h3>
                        <ul class="mt-4 space-y-2 text-gray-500">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Latest cardio equipment with integrated entertainment systems</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Comprehensive strength training area with free weights and machines</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Functional training zone with TRX, kettlebells, and medicine balls</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Dedicated stretching and cool-down area</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Group fitness studio with daily classes</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Complimentary towel service and water station</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Opening Hours</h3>
                        <div class="mt-4 border-t border-b border-gray-200 py-4">
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Monday - Friday</span>
                                <span class="font-medium text-gray-900">6:00 AM - 10:00 PM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Saturday - Sunday</span>
                                <span class="font-medium text-gray-900">7:00 AM - 9:00 PM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Hotel Guests Access</span>
                                <span class="font-medium text-gray-900">24/7 with Room Key</span>
                            </div>
                        </div>
                        <p class="mt-4 text-sm text-gray-500">
                            *Fitness trainers available daily from 7:00 AM - 8:00 PM
                        </p>
                    </div>
                </div>
                
                <div class="mt-12 lg:mt-0">
                    <div class="grid grid-cols-1 gap-8">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Fitness Center" class="w-full h-auto object-cover">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Weight Training" class="w-full h-48 object-cover">
                            </div>
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1574680096145-d05b474e2155?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Cardio Equipment" class="w-full h-48 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fitness Services -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Fitness Services
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Additional fitness services to enhance your workout experience
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                        <i class="fas fa-user-friends text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Personal Training</h3>
                    <p class="text-gray-500">Our certified personal trainers are available for one-on-one sessions tailored to your fitness goals, whether you're looking to improve strength, endurance, or overall fitness.</p>
                    <p class="mt-4 text-indigo-600 font-medium">From Rp 500,000 per session</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Group Fitness Classes</h3>
                    <p class="text-gray-500">Join our energizing group classes including yoga, pilates, HIIT, spinning, and more. Classes are designed for all fitness levels and are a great way to stay motivated.</p>
                    <p class="mt-4 text-indigo-600 font-medium">Complimentary for hotel guests</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 text-indigo-600 mb-4">
                        <i class="fas fa-clipboard-list text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Fitness Assessment</h3>
                    <p class="text-gray-500">Start your fitness journey with a comprehensive assessment including body composition analysis, fitness testing, and goal setting with one of our professional trainers.</p>
                    <p class="mt-4 text-indigo-600 font-medium">Rp 350,000 per assessment</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Class Schedule -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Group Class Schedule
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Weekly fitness classes included with your stay
                </p>
            </div>
            
            <div class="mt-12 bg-white shadow overflow-hidden rounded-lg">
                <div class="px-4 py-5 sm:px-6 bg-indigo-700 text-white">
                    <h3 class="text-lg leading-6 font-medium">
                        This Week's Classes
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-indigo-100">
                        All classes are 45-60 minutes. Please arrive 10 minutes early.
                    </p>
                </div>
                <div class="border-t border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Time
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Monday
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tuesday
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Wednesday
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Thursday
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Friday
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Saturday
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Sunday
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        7:00 AM
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Morning Yoga
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Pilates
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Morning Yoga
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Pilates
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Morning Yoga
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Weekend Stretch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Weekend Stretch
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        9:00 AM
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        HIIT
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Spinning
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Body Pump
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Spinning
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        HIIT
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Body Pump
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        —
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        5:30 PM
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Body Pump
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Zumba
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Spinning
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Zumba
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Body Combat
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        —
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        —
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        7:00 PM
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Yoga Flow
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Body Combat
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Yoga Flow
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        HIIT
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Relaxation Yoga
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Relaxation Yoga
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        —
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 text-center">
                <p class="text-gray-500">
                    Class schedule is subject to change. Please check with the fitness center for the most up-to-date information.
                </p>
                <p class="mt-2 text-gray-500">
                    Registration required for all classes. Sign up at the fitness center reception or call extension 4550 from your room.
                </p>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Gallery
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Take a tour of our fitness facilities
                </p>
            </div>
            
            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 gap-4">
                @forelse ($images as $image)
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-64 object-cover transform transition duration-500 hover:scale-110">
                    </div>
                @empty
                    <div class="col-span-3">
                        <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Gym Equipment" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1518310383802-640c2de311b6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Yoga Class" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1581009137042-c552e485697a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Weight Area" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-indigo-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to stay fit during your visit?</span>
                <span class="block text-indigo-200">Book your stay with fitness center access included.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('rooms.index') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 