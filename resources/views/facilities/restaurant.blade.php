@extends('layouts.app')

@section('title', 'Restaurant & Dining')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gray-900 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1920&q=80" alt="Restaurant" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight slide-in">
                    Restaurant & Dining
                </h1>
                <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-300 slide-in">
                    Experience culinary excellence with our gourmet dishes prepared by world-class chefs
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Culinary Excellence</h2>
                    <p class="mt-4 text-lg text-gray-500">
                        Our restaurant offers an exceptional dining experience with a diverse menu that celebrates both local Indonesian flavors and international cuisine. Each dish is thoughtfully prepared by our talented chefs using the freshest ingredients sourced from local producers.
                    </p>
                    <p class="mt-4 text-lg text-gray-500">
                        Whether you're joining us for breakfast, lunch, or dinner, you'll find a variety of options to satisfy your palate. Our attentive staff is dedicated to providing outstanding service to ensure your dining experience is nothing short of exceptional.
                    </p>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Opening Hours</h3>
                        <div class="mt-4 border-t border-b border-gray-200 py-4">
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Breakfast</span>
                                <span class="font-medium text-gray-900">6:30 AM - 10:30 AM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Lunch</span>
                                <span class="font-medium text-gray-900">12:00 PM - 3:00 PM</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500">Dinner</span>
                                <span class="font-medium text-gray-900">6:00 PM - 10:30 PM</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Dress Code</h3>
                        <p class="mt-4 text-lg text-gray-500">
                            Smart casual attire is recommended for dinner. For breakfast and lunch, casual attire is acceptable.
                        </p>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-2xl font-bold text-gray-900">Reservations</h3>
                        <p class="mt-4 text-lg text-gray-500">
                            Reservations are recommended, especially for dinner. Please contact our restaurant team to secure your table.
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                Make a Reservation
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 lg:mt-0">
                    <div class="grid grid-cols-1 gap-8">
                        <div class="overflow-hidden rounded-lg">
                            <img src="https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Restaurant Interior" class="w-full h-auto object-cover">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Food" class="w-full h-48 object-cover">
                            </div>
                            <div class="overflow-hidden rounded-lg">
                                <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Dining" class="w-full h-48 object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Highlights -->
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Menu Highlights
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    A selection of our most popular dishes from our award-winning menu
                </p>
            </div>
            
            <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Indonesian Specialties</h3>
                    <ul class="space-y-4">
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Nasi Goreng Special</span>
                                <span class="text-indigo-600">Rp 120.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Traditional Indonesian fried rice with prawns, chicken, and vegetables, served with satay and fried egg</p>
                        </li>
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Sate Ayam</span>
                                <span class="text-indigo-600">Rp 95.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Grilled chicken skewers served with peanut sauce and rice cake</p>
                        </li>
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Rendang Sapi</span>
                                <span class="text-indigo-600">Rp 150.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Slow-cooked beef in rich coconut milk and spices</p>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">International Cuisine</h3>
                    <ul class="space-y-4">
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Grilled Salmon</span>
                                <span class="text-indigo-600">Rp 180.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Served with asparagus, baby potatoes and lemon butter sauce</p>
                        </li>
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Beef Tenderloin</span>
                                <span class="text-indigo-600">Rp 225.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Grilled to your preference, served with mashed potatoes and seasonal vegetables</p>
                        </li>
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Mushroom Risotto</span>
                                <span class="text-indigo-600">Rp 135.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Creamy Italian rice with assorted mushrooms, truffle oil and parmesan</p>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Desserts & Beverages</h3>
                    <ul class="space-y-4">
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Crème Brûlée</span>
                                <span class="text-indigo-600">Rp 75.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Classic vanilla custard with caramelized sugar crust</p>
                        </li>
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Pisang Goreng</span>
                                <span class="text-indigo-600">Rp 65.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Traditional fried banana served with palm sugar syrup and vanilla ice cream</p>
                        </li>
                        <li>
                            <div class="flex justify-between">
                                <span class="font-medium">Signature Cocktails</span>
                                <span class="text-indigo-600">From Rp 110.000</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Ask your server about our selection of handcrafted cocktails</p>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <p class="text-gray-500 mb-4">*Please note that menu items and prices are subject to change</p>
                <a href="#" class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Download Full Menu
                </a>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Gallery
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Take a visual tour of our restaurant and dishes
                </p>
            </div>
            
            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 gap-4">
                @forelse ($images as $image)
                    <div class="overflow-hidden rounded-lg shadow-md">
                        <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->title }}" class="w-full h-64 object-cover transform transition duration-500 hover:scale-110">
                    </div>
                @empty
                    <div class="col-span-3">
                        <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Restaurant" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1514326640560-7d063ef2aed5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Food" class="w-full h-64 object-cover rounded-lg">
                    </div>
                    <div class="col-span-3 md:col-span-1">
                        <img src="https://images.unsplash.com/photo-1551218808-94e220e084d2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Chef" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-indigo-700">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to experience our cuisine?</span>
                <span class="block text-indigo-200">Make a reservation today.</span>
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