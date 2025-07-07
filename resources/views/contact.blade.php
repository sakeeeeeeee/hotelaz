@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="bg-lightest-green py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-darkest-green">Contact Hotel<span class="text-light-green">Az</span></h1>
            <p class="mt-4 text-lg text-dark-green">We'd love to hear from you. Reach out to us with any questions or inquiries.</p>
        </div>
    </div>
</div>

<div class="py-16 bg-lightest-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="text-2xl font-bold text-darkest-green mb-6">Send Us a Message</h2>
                
                @if ($errors->any())
                    <div class="bg-light-green border-l-4 border-medium-green text-darkest-green p-4 mb-6" role="alert">
                        <p class="font-medium">Please correct the following errors:</p>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-dark-green font-medium mb-2">Your Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-2 border border-light-green rounded-md focus:outline-none focus:ring-medium-green focus:border-medium-green bg-lightest-green text-darkest-green">
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-dark-green font-medium mb-2">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-2 border border-light-green rounded-md focus:outline-none focus:ring-medium-green focus:border-medium-green bg-lightest-green text-darkest-green">
                    </div>
                    
                    <div class="mb-4">
                        <label for="subject" class="block text-dark-green font-medium mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                               class="w-full px-4 py-2 border border-light-green rounded-md focus:outline-none focus:ring-medium-green focus:border-medium-green bg-lightest-green text-darkest-green">
                    </div>
                    
                    <div class="mb-4">
                        <label for="message" class="block text-dark-green font-medium mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="w-full px-4 py-2 border border-light-green rounded-md focus:outline-none focus:ring-medium-green focus:border-medium-green bg-lightest-green text-darkest-green">{{ old('message') }}</textarea>
                    </div>
                    
                    <div class="mt-6">
                        <button type="submit" class="w-full bg-medium-green text-darkest-green py-2 px-4 rounded-md hover:bg-light-green focus:outline-none focus:ring-2 focus:ring-medium-green focus:ring-offset-2">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-bold text-darkest-green mb-6">Contact Information</h2>
                
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-green text-darkest-green">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-darkest-green">Our Location</h3>
                            <p class="mt-1 text-dark-green">
                                123 Hotel Street<br>
                                Surabaya, East Java 60234<br>
                                Indonesia
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-green text-darkest-green">
                                <i class="fas fa-phone-alt text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-darkest-green">Phone Numbers</h3>
                            <p class="mt-1 text-dark-green">
                                Front Desk: +62 31 1234 5678<br>
                                Reservations: +62 31 8765 4321<br>
                                Customer Service: +62 31 2468 1357
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-green text-darkest-green">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-darkest-green">Email Addresses</h3>
                            <p class="mt-1 text-dark-green">
                                General Inquiries: info@hotelaz.com<br>
                                Reservations: book@hotelaz.com<br>
                                Customer Support: support@hotelaz.com
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-green text-darkest-green">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-darkest-green">Business Hours</h3>
                            <p class="mt-1 text-dark-green">
                                Check-in: 2:00 PM<br>
                                Check-out: 12:00 PM<br>
                                Front Desk: 24/7
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-12 bg-light-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-darkest-green">Find Us on the Map</h2>
        </div>
        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
            <!-- Ganti dengan actual map embed -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126646.19583388567!2d112.63897554647136!3d-7.275763696197686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbf8381ac47f%3A0x3027a76e352be40!2sSurabaya%2C%20Surabaya%20City%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1695546800201!5m2!1sen!2sid" 
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection 