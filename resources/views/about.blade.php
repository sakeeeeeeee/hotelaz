@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="bg-lightest-green py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-darkest-green">About Hotel<span class="text-light-green">Az</span></h1>
            <p class="mt-4 text-lg text-dark-green">Learn about our story, mission, and commitment to excellence</p>
        </div>
    </div>
</div>

<div class="py-16 bg-lightest-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-darkest-green">Our Story</h2>
                <p class="mt-4 text-lg text-dark-green">
                    Founded in 2010, HotelAz began with a simple vision: to create a place where travelers 
                    could experience the perfect blend of luxury, comfort, and authentic local experiences.
                </p>
                <p class="mt-4 text-lg text-dark-green">
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

<div class="py-16 bg-lightest-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" 
                     alt="Hotel Team" 
                     class="rounded-lg shadow-lg w-full h-auto">
            </div>
            <div>
                <h2 class="text-3xl font-bold text-darkest-green">Our Team</h2>
                <p class="mt-4 text-lg text-dark-green">
                    Our exceptional team is the heart of HotelAz. From our attentive front desk staff to our 
                    skilled chefs and dedicated housekeeping team, each member contributes to creating 
                    memorable experiences for our guests.
                </p>
                <p class="mt-4 text-lg text-dark-green">
                    We invest in our team through continuous training and development, ensuring they have 
                    the skills and knowledge to provide the highest level of service and hospitality.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-light-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-darkest-green">Our Values</h2>
            <p class="mt-4 text-lg text-dark-green">What drives us every day</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-lightest-green p-6 rounded-lg shadow-md">
                <div class="w-12 h-12 bg-light-green rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-star text-darkest-green text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-darkest-green">Excellence</h3>
                <p class="mt-3 text-dark-green">
                    We strive for excellence in everything we do, from the quality of our rooms to the 
                    service provided by our staff.
                </p>
            </div>
            
            <div class="bg-lightest-green p-6 rounded-lg shadow-md">
                <div class="w-12 h-12 bg-light-green rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-heart text-darkest-green text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-darkest-green">Hospitality</h3>
                <p class="mt-3 text-dark-green">
                    We believe in warm, genuine hospitality that makes every guest feel welcome, valued, 
                    and cared for during their stay.
                </p>
            </div>
            
            <div class="bg-lightest-green p-6 rounded-lg shadow-md">
                <div class="w-12 h-12 bg-light-green rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-leaf text-darkest-green text-xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-darkest-green">Sustainability</h3>
                <p class="mt-3 text-dark-green">
                    We're committed to sustainable practices that respect and protect the environment 
                    while providing exceptional experiences.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-lightest-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-darkest-green">Frequently Asked Questions</h2>
            <p class="mt-4 text-lg text-dark-green">Find answers to common questions about our hotel and services</p>
        </div>
        
        <div class="max-w-3xl mx-auto space-y-4" x-data="{active: null}">
            <!-- FAQ Item 1 -->
            <div class="border border-light-green rounded-lg overflow-hidden">
                <button 
                    @click="active !== 1 ? active = 1 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-lightest-green hover:bg-light-green"
                >
                    <span class="text-lg font-medium text-darkest-green">What are your check-in and check-out times?</span>
                    <svg 
                        :class="{'rotate-180': active === 1}" 
                        class="h-5 w-5 text-medium-green transform transition-transform duration-200" 
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
                    class="px-6 py-4 bg-light-green"
                >
                    <p class="text-dark-green">Our check-in time is at 2:00 PM and check-out time is at 12:00 PM. Early check-in and late check-out may be available upon request, subject to availability and additional charges may apply.</p>
                </div>
            </div>
            
            <!-- FAQ Item 2 -->
            <div class="border border-light-green rounded-lg overflow-hidden">
                <button 
                    @click="active !== 2 ? active = 2 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-lightest-green hover:bg-light-green"
                >
                    <span class="text-lg font-medium text-darkest-green">Is breakfast included in the room rate?</span>
                    <svg 
                        :class="{'rotate-180': active === 2}" 
                        class="h-5 w-5 text-medium-green transform transition-transform duration-200" 
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
                    class="px-6 py-4 bg-light-green"
                >
                    <p class="text-dark-green">Yes, our room rates include a complimentary breakfast buffet served at our restaurant from 6:30 AM to 10:30 AM daily. The buffet features a wide variety of local and international breakfast options.</p>
                </div>
            </div>
            
            <!-- FAQ Item 3 -->
            <div class="border border-light-green rounded-lg overflow-hidden">
                <button 
                    @click="active !== 3 ? active = 3 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-lightest-green hover:bg-light-green"
                >
                    <span class="text-lg font-medium text-darkest-green">Do you offer airport shuttle services?</span>
                    <svg 
                        :class="{'rotate-180': active === 3}" 
                        class="h-5 w-5 text-medium-green transform transition-transform duration-200" 
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
                    class="px-6 py-4 bg-light-green"
                >
                    <p class="text-dark-green">Yes, we offer airport shuttle services for our guests. Please inform us of your flight details at least 24 hours in advance to arrange pickup. Additional charges apply based on the distance from the airport.</p>
                </div>
            </div>
            
            <!-- FAQ Item 4 -->
            <div class="border border-light-green rounded-lg overflow-hidden">
                <button 
                    @click="active !== 4 ? active = 4 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-lightest-green hover:bg-light-green"
                >
                    <span class="text-lg font-medium text-darkest-green">Is Wi-Fi available throughout the hotel?</span>
                    <svg 
                        :class="{'rotate-180': active === 4}" 
                        class="h-5 w-5 text-medium-green transform transition-transform duration-200" 
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
                    class="px-6 py-4 bg-light-green"
                >
                    <p class="text-dark-green">Yes, complimentary high-speed Wi-Fi is available throughout the hotel, including all guest rooms, public areas, and meeting spaces. No password is required, simply connect to the "HotelAz_Guest" network.</p>
                </div>
            </div>
            
            <!-- FAQ Item 5 -->
            <div class="border border-light-green rounded-lg overflow-hidden">
                <button 
                    @click="active !== 5 ? active = 5 : active = null" 
                    class="flex justify-between items-center w-full px-6 py-4 text-left bg-lightest-green hover:bg-light-green"
                >
                    <span class="text-lg font-medium text-darkest-green">Do you have facilities for guests with disabilities?</span>
                    <svg 
                        :class="{'rotate-180': active === 5}" 
                        class="h-5 w-5 text-medium-green transform transition-transform duration-200" 
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
                    class="px-6 py-4 bg-light-green"
                >
                    <p class="text-dark-green">Yes, we have specially designed rooms and facilities to accommodate guests with disabilities. Our hotel features wheelchair-accessible rooms, ramps, elevators, and trained staff to assist guests with special needs.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-16 bg-darkest-green text-lightest-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold">Ready to Experience HotelAz?</h2>
        <p class="mt-4 text-xl text-light-green">Book your stay today and discover why our guests keep coming back.</p>
        <div class="mt-8">
            <a href="{{ route('rooms.index') }}" class="bg-lightest-green text-darkest-green hover:bg-light-green px-6 py-3 rounded-md font-semibold text-lg inline-block">
                Browse Our Rooms
            </a>
        </div>
    </div>
</div>
@endsection 