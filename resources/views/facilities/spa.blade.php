@extends('layouts.app')

@section('title', 'Spa & Wellness')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1600334129128-685c5582fd35?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" alt="Spa" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight slide-in">
                    Spa & Wellness Center
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-300 slide-in">
                    Immerse yourself in ultimate relaxation and rejuvenation for body, mind, and soul
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Wellness Sanctuary</h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Our Spa & Wellness Center is a tranquil oasis designed to transport you to a state of complete relaxation and rejuvenation. Inspired by ancient healing traditions and modern therapeutic techniques, our spa offers a comprehensive range of treatments to nurture your body, mind, and spirit.
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                        Each treatment begins with a personal consultation to ensure that your experience is tailored to your specific needs and preferences. Our highly trained therapists use only premium products, combining natural ingredients with advanced formulations to deliver exceptional results.
                    </p>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Spa Facilities</h3>
                        <ul class="mt-4 space-y-2 text-gray-500">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>6 private treatment rooms including couples' suites</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Aromatic steam room and dry sauna</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Tranquil relaxation lounge</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Vitality hydrotherapy pool</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Indoor meditation garden</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-indigo-500 mt-1 mr-2"></i>
                                <span>Spa boutique with luxury products</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Opening Hours</h3>
                        <div class="mt-4 border-t border-b border-gray-200 py-4">
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Monday - Sunday</span>
                                <span class="font-medium text-gray-900">9:00 AM - 9:00 PM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Last Appointment</span>
                                <span class="font-medium text-gray-900">7:30 PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Reservations</h3>
                        <p class="mt-4 text-lg text-gray-500">
                            We recommend booking your spa treatment in advance to ensure availability. Hotel guests receive priority booking.
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                Book a Treatment
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 lg:mt-0">
                    <div class="grid grid-cols-1 gap-8">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Spa Treatment" class="w-full h-auto object-cover">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1629209296099-0e641f24f05a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Massage" class="w-full h-48 object-cover">
                            </div>
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Spa Products" class="w-full h-48 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Signature Treatments -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Signature Treatments
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Explore our exclusive spa treatments designed to restore harmony and balance
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Indonesian Heritage Ritual</h3>
                    <p class="text-gray-500 mb-4">
                        This traditional treatment begins with a Balinese massage using warm aromatic oils, followed by a turmeric and yogurt body polish, and concludes with a warm herbal bath.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-medium">120 minutes</span>
                        <span class="text-indigo-600 font-medium">Rp 1,500,000</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Royal Java Lulur</h3>
                    <p class="text-gray-500 mb-4">
                        A centuries-old beauty ritual from the royal palaces of Central Java. Includes a deep tissue massage, traditional lulur body scrub, and a moisturizing yogurt application.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-medium">90 minutes</span>
                        <span class="text-indigo-600 font-medium">Rp 1,200,000</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Stress Recovery Massage</h3>
                    <p class="text-gray-500 mb-4">
                        A customized therapeutic massage targeting areas of tension and stress. Combines various techniques including Swedish, deep tissue, and acupressure.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-medium">60/90 minutes</span>
                        <span class="text-indigo-600 font-medium">Rp 850,000/1,100,000</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Detoxifying Seaweed Wrap</h3>
                    <p class="text-gray-500 mb-4">
                        A purifying treatment that begins with dry brushing, followed by a mineral-rich seaweed body wrap to draw out impurities, and concludes with a hydrating body moisturizer.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-medium">75 minutes</span>
                        <span class="text-indigo-600 font-medium">Rp 950,000</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Rejuvenating Facial</h3>
                    <p class="text-gray-500 mb-4">
                        A revitalizing facial treatment using premium botanical products tailored to your skin type. Includes deep cleansing, exfoliation, mask, and facial massage.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-medium">60 minutes</span>
                        <span class="text-indigo-600 font-medium">Rp 750,000</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Couples Harmony</h3>
                    <p class="text-gray-500 mb-4">
                        Share a relaxing experience with your partner in our couples suite. Includes side-by-side massages, private steam room session, and complimentary champagne.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-indigo-600 font-medium">120 minutes</span>
                        <span class="text-indigo-600 font-medium">Rp 2,500,000</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <p class="text-gray-500 mb-4">*All prices are subject to 21% government tax and service charge</p>
                <a href="#" class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Download Full Spa Menu
                </a>
            </div>
        </div>
    </div>

    <!-- Wellness Programs -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Wellness Programs
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Comprehensive wellness experiences for lasting benefits
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 md:grid-cols-2">
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Half-Day Escape</h3>
                    <p class="text-gray-500 mb-6">
                        A 4-hour journey to revitalize your body and mind, perfect for guests seeking a comprehensive spa experience without committing to a full day.
                    </p>
                    
                    <h4 class="text-lg font-medium text-indigo-600 mb-2">Includes:</h4>
                    <ul class="space-y-2 text-gray-500 mb-6">
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Aromatic welcome ritual</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>60-minute massage of your choice</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>30-minute body scrub</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>30-minute facial</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Use of all spa facilities</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Herbal tea and light refreshments</span>
                        </li>
                    </ul>
                    
                    <div class="text-right">
                        <span class="text-2xl font-semibold text-indigo-600">Rp 2,500,000</span>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4">Full Wellness Journey</h3>
                    <p class="text-gray-500 mb-6">
                        A complete day of wellness designed to address physical, mental, and emotional well-being through a carefully curated sequence of treatments.
                    </p>
                    
                    <h4 class="text-lg font-medium text-indigo-600 mb-2">Includes:</h4>
                    <ul class="space-y-2 text-gray-500 mb-6">
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Aromatic welcome ritual</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>30-minute private yoga or meditation session</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>90-minute signature massage</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>60-minute facial treatment</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Body scrub and wrap (60 minutes)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Spa cuisine lunch</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Use of all spa facilities</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-indigo-500 mt-1 mr-2"></i>
                            <span>Wellness gift set</span>
                        </li>
                    </ul>
                    
                    <div class="text-right">
                        <span class="text-2xl font-semibold text-indigo-600">Rp 4,500,000</span>
                    </div>
                </div>
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
                    Experience the tranquil environment of our spa
                </p>
            </div>
            
            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 gap-4">
                @forelse ($images as $image)
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-64 object-cover transform transition duration-500 hover:scale-110">
                    </div>
                @empty
                    <div class="col-span-3">
                        <img src="https://images.unsplash.com/photo-1620733723572-11c53f73a416?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Spa Interior" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1544161497-6095fb868d58?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Massage" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1592639296346-560c37a0f711?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Spa Products" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-indigo-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready for a rejuvenating experience?</span>
                <span class="block text-indigo-200">Book your spa treatment today.</span>
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