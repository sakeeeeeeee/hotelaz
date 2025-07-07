@extends('layouts.app')

@section('title', 'Swimming Pool')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-darkest-green overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1540280369237-dea08361593a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" alt="Swimming Pool" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-darkest-green"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-lightest-green tracking-tight slide-in">
                    Swimming Pool & Leisure
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-light-green slide-in">
                    Dive into relaxation and refresh your senses in our luxury swimming pools
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-lightest-green py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-darkest-green">Aquatic Paradise</h2>
                    <p class="mt-4 text-lg text-dark-green">
                        Our swimming pool complex offers a perfect retreat for relaxation and recreation. Featuring both indoor and outdoor pools, our facility is designed to provide a luxurious aquatic experience regardless of the weather or season.
                    </p>
                    <p class="mt-4 text-lg text-dark-green">
                        The main outdoor infinity pool overlooks stunning views, creating a seamless blend with the horizon. Our indoor pool is temperature-controlled and features a retractable glass roof, allowing you to enjoy swimming under the stars on clear nights.
                    </p>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-darkest-green">Pool Features</h3>
                        <ul class="mt-4 space-y-2 text-dark-green">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-medium-green mt-1 mr-2"></i>
                                <span>Infinity edge outdoor pool (25m x 10m)</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-medium-green mt-1 mr-2"></i>
                                <span>Heated indoor pool (20m x 8m) with retractable roof</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-medium-green mt-1 mr-2"></i>
                                <span>Children's splash pool with water features</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-medium-green mt-1 mr-2"></i>
                                <span>Relaxation jacuzzi with hydrotherapy jets</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-medium-green mt-1 mr-2"></i>
                                <span>Poolside cabanas and sun loungers</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-medium-green mt-1 mr-2"></i>
                                <span>Pool bar serving refreshing drinks and light snacks</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-darkest-green">Opening Hours</h3>
                        <div class="mt-4 border-t border-b border-light-green py-4">
                            <div class="flex justify-between py-2">
                                <span class="text-dark-green">Outdoor Pool</span>
                                <span class="font-medium text-darkest-green">7:00 AM - 7:00 PM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-dark-green">Indoor Pool</span>
                                <span class="font-medium text-darkest-green">6:00 AM - 10:00 PM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-dark-green">Children's Pool</span>
                                <span class="font-medium text-darkest-green">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-dark-green">Pool Bar</span>
                                <span class="font-medium text-darkest-green">10:00 AM - 6:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 lg:mt-0">
                    <div class="grid grid-cols-1 gap-8">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://images.unsplash.com/photo-1525183995014-bd94c0750cd5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Main Pool" class="w-full h-auto object-cover">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1551105378-78e609e1d468?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Indoor Pool" class="w-full h-48 object-cover">
                            </div>
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Pool Lounge" class="w-full h-48 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pool Services -->
    <div class="bg-light-green py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-darkest-green sm:text-4xl">
                    Pool Services
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-dark-green sm:mt-4">
                    Enhancing your poolside experience with premium amenities and services
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-lightest-green p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-light-green text-medium-green mb-4">
                        <i class="fas fa-cocktail text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-darkest-green mb-2">Pool Bar</h3>
                    <p class="text-dark-green">Enjoy refreshing cocktails, fresh juices, and light snacks without leaving the comfort of your sun lounger with our attentive poolside service.</p>
                </div>
                
                <div class="bg-lightest-green p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-light-green text-medium-green mb-4">
                        <i class="fas fa-umbrella-beach text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-darkest-green mb-2">Cabana Rentals</h3>
                    <p class="text-dark-green">Reserve a private cabana for the ultimate poolside luxury, complete with dedicated service, comfortable seating, and cooling fans.</p>
                </div>
                
                <div class="bg-lightest-green p-6 rounded-lg shadow-md text-center">
                    <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-light-green text-medium-green mb-4">
                        <i class="fas fa-swimmer text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-darkest-green mb-2">Swimming Lessons</h3>
                    <p class="text-dark-green">Private swimming lessons are available for all ages and skill levels, taught by our certified instructors. Perfect for children or adults looking to improve their technique.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Rules & Safety -->
    <div class="bg-lightest-green py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-darkest-green">Pool Rules & Safety</h2>
                    <p class="mt-4 text-dark-green">
                        For your safety and enjoyment, please observe the following pool rules:
                    </p>
                    
                    <ul class="mt-6 space-y-4 text-dark-green">
                        <li class="flex items-start">
                            <i class="fas fa-info-circle text-medium-green mt-1 mr-2"></i>
                            <span>Children under 12 must be accompanied by an adult</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle text-medium-green mt-1 mr-2"></i>
                            <span>Shower before entering the pool</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle text-medium-green mt-1 mr-2"></i>
                            <span>No running around the pool area</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle text-medium-green mt-1 mr-2"></i>
                            <span>No diving in shallow areas</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle text-medium-green mt-1 mr-2"></i>
                            <span>Glass containers are not allowed in the pool area</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle text-medium-green mt-1 mr-2"></i>
                            <span>Please use the towels provided by the hotel</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-info-circle text-medium-green mt-1 mr-2"></i>
                            <span>Lifeguards are on duty during operational hours</span>
                        </li>
                    </ul>
                </div>
                
                <div class="mt-12 lg:mt-0">
                    <h2 class="text-3xl font-extrabold text-darkest-green">What to Bring</h2>
                    <p class="mt-4 text-dark-green">
                        We provide complimentary items for your pool visit, but you may want to bring:
                    </p>
                    
                    <ul class="mt-6 space-y-4 text-dark-green">
                        <li class="flex items-start">
                            <i class="fas fa-check text-medium-green mt-1 mr-2"></i>
                            <span>Swimwear</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-medium-green mt-1 mr-2"></i>
                            <span>Sunscreen</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-medium-green mt-1 mr-2"></i>
                            <span>Sunglasses</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-medium-green mt-1 mr-2"></i>
                            <span>Beach/Pool Towel (though we provide complimentary towels)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-medium-green mt-1 mr-2"></i>
                            <span>Water bottle</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-medium-green mt-1 mr-2"></i>
                            <span>Change of clothes</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <div class="bg-light-green py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-darkest-green sm:text-4xl">
                    Gallery
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-dark-green sm:mt-4">
                    Glimpses of our swimming pool facilities
                </p>
            </div>
            
            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 gap-4">
                @forelse ($images as $image)
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-64 object-cover transform transition duration-500 hover:scale-110">
                    </div>
                @empty
                    <div class="col-span-3">
                        <img src="https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Infinity Pool" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1571091655789-405eb7a3a3a8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Pool Bar" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1560717845-968823efbee1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Loungers" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-medium-green">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-lightest-green sm:text-4xl">
                <span class="block">Ready for a refreshing dip?</span>
                <span class="block text-light-green">Book your stay with pool access today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ route('rooms.index') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-medium-green bg-lightest-green hover:bg-light-green">
                        Book Now
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection 