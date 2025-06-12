@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900">About Hotel<span class="text-amber-500">Az</span></h1>
            <p class="mt-4 text-lg text-gray-600">Learn about our story, mission, and commitment to excellence</p>
        </div>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Our Story</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Founded in 2010, HotelAz began with a simple vision: to create a place where travelers 
                    could experience the perfect blend of luxury, comfort, and authentic local experiences.
                </p>
                <p class="mt-4 text-lg text-gray-600">
                    Over the years, we've grown from a small boutique hotel to a premier destination known 
                    for exceptional service and unforgettable stays. Our commitment to personalized 
                    hospitality has earned us numerous awards and the loyalty of guests from around the world.
                </p>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" 
                     alt="Hotel Exterior" 
                     class="rounded-lg shadow-lg w-full h-auto">
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" 
                     alt="Hotel Team" 
                     class="rounded-lg shadow-lg w-full h-auto">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Our Team</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Our exceptional team is the heart of HotelAz. From our attentive front desk staff to our 
                    skilled chefs and dedicated housekeeping team, each member contributes to creating 
                    memorable experiences for our guests.
                </p>
                <p class="mt-4 text-lg text-gray-600">
                    We invest in our team through continuous training and development, ensuring they have 
                    the skills and knowledge to provide the highest level of service and hospitality.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Our Values</h2>
            <p class="mt-4 text-lg text-gray-600">What drives us every day</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-star text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Excellence</h3>
                <p class="mt-3 text-gray-600">
                    We strive for excellence in everything we do, from the quality of our rooms to the 
                    service provided by our staff.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-heart text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Hospitality</h3>
                <p class="mt-3 text-gray-600">
                    We believe in warm, genuine hospitality that makes every guest feel welcome, valued, 
                    and cared for during their stay.
                </p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-leaf text-indigo-600 text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900">Sustainability</h3>
                <p class="mt-3 text-gray-600">
                    We're committed to sustainable practices that respect and protect the environment 
                    while providing exceptional experiences.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Frequently Asked Questions</h2>
            <p class="mt-4 text-lg text-gray-600">Find answers to common questions about our hotel and services</p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-4" x-data="{active: null}">
            <!-- FAQ Item 1 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    @click="active !== 1 ? active = 1 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-white hover:bg-gray-50"
                >
                    <span class="text-lg font-medium text-gray-900">What are your check-in and check-out times?</span>
                    <svg 
                        :class="{'rotate-180': active === 1}" 
                        class="h-5 w-5 text-indigo-500 transform transition-transform duration-200" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 20 20" 
                        fill="currentColor"
                    >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div 
                    x-show="active === 1" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 -translate-y-2" 
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="px-6 py-4 bg-gray-50"
                >
                    <p class="text-gray-600">Our check-in time is at 2:00 PM and check-out time is at 12:00 PM. Early check-in and late check-out may be available upon request, subject to availability and additional charges may apply.</p>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    @click="active !== 2 ? active = 2 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-white hover:bg-gray-50"
                >
                    <span class="text-lg font-medium text-gray-900">Is breakfast included in the room rate?</span>
                    <svg 
                        :class="{'rotate-180': active === 2}" 
                        class="h-5 w-5 text-indigo-500 transform transition-transform duration-200" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 20 20" 
                        fill="currentColor"
                    >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div 
                    x-show="active === 2" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 -translate-y-2" 
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="px-6 py-4 bg-gray-50"
                >
                    <p class="text-gray-600">Yes, our room rates include a complimentary breakfast buffet served at our restaurant from 6:30 AM to 10:30 AM daily. The buffet features a wide variety of local and international breakfast options.</p>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    @click="active !== 3 ? active = 3 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-white hover:bg-gray-50"
                >
                    <span class="text-lg font-medium text-gray-900">Do you offer airport shuttle services?</span>
                    <svg 
                        :class="{'rotate-180': active === 3}" 
                        class="h-5 w-5 text-indigo-500 transform transition-transform duration-200" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 20 20" 
                        fill="currentColor"
                    >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div 
                    x-show="active === 3" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 -translate-y-2" 
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="px-6 py-4 bg-gray-50"
                >
                    <p class="text-gray-600">Yes, we offer airport shuttle services for our guests. Please inform us of your flight details at least 24 hours in advance to arrange pickup. Additional charges apply based on the distance from the airport.</p>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    @click="active !== 4 ? active = 4 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-white hover:bg-gray-50"
                >
                    <span class="text-lg font-medium text-gray-900">Is Wi-Fi available throughout the hotel?</span>
                    <svg 
                        :class="{'rotate-180': active === 4}" 
                        class="h-5 w-5 text-indigo-500 transform transition-transform duration-200" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 20 20" 
                        fill="currentColor"
                    >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div 
                    x-show="active === 4" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 -translate-y-2" 
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="px-6 py-4 bg-gray-50"
                >
                    <p class="text-gray-600">Yes, complimentary high-speed Wi-Fi is available throughout the hotel, including all guest rooms, public areas, and meeting spaces. No password is required, simply connect to the "HotelAz_Guest" network.</p>
                </div>
            </div>
            
            <!-- FAQ Item 5 -->
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button 
                    @click="active !== 5 ? active = 5 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-white hover:bg-gray-50"
                >
                    <span class="text-lg font-medium text-gray-900">Do you have facilities for guests with disabilities?</span>
                    <svg 
                        :class="{'rotate-180': active === 5}" 
                        class="h-5 w-5 text-indigo-500 transform transition-transform duration-200" 
                        xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 20 20" 
                        fill="currentColor"
                    >
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div 
                    x-show="active === 5" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 -translate-y-2" 
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="px-6 py-4 bg-gray-50"
                >
                    <p class="text-gray-600">Yes, our hotel is equipped with facilities for guests with disabilities, including wheelchair-accessible rooms, elevators, ramps, and designated parking spaces. Please let us know your specific requirements when making a reservation.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-indigo-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold">Ready to Experience HotelAz?</h2>
        <p class="mt-4 text-xl">Book your stay today and discover why our guests keep coming back.</p>
        <div class="mt-8">
            <a href="{{ route('rooms.index') }}" class="bg-white text-indigo-600 hover:bg-gray-100 px-6 py-3 rounded-md font-semibold text-lg inline-block">
                Browse Our Rooms
            </a>
        </div>
    </div>
</div>
@endsection 