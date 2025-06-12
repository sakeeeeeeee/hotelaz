<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Room;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $featuredRooms = Room::where('status', 'available')->take(3)->get();
        $galleries = Gallery::where('is_featured', true)->take(6)->get();
        $testimonials = Testimonial::where('is_approved', true)->take(4)->get();
        
        return view('home', compact('featuredRooms', 'galleries', 'testimonials'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO: Send email notification
        
        return back()->with('success', 'Pesan Anda telah terkirim. Kami akan segera menghubungi Anda.');
    }
    
    public function subscribeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);
        
        // Check if email already exists in subscribers
        $exists = \App\Models\NewsletterSubscriber::where('email', $validated['email'])->exists();
        
        if ($exists) {
            return back()->with('info', 'Email Anda sudah terdaftar dalam newsletter kami.');
        }
        
        // Create new subscriber
        \App\Models\NewsletterSubscriber::create([
            'email' => $validated['email'],
        ]);
        
        return back()->with('success', 'Terima kasih telah berlangganan newsletter kami!');
    }
    
    public function gallery()
    {
        $categories = [
            'all' => 'All',
            'rooms' => 'Rooms',
            'facilities' => 'Facilities',
            'dining' => 'Dining',
            'events' => 'Events'
        ];
        
        $galleries = Gallery::all();
        
        return view('gallery', compact('galleries', 'categories'));
    }
    
    public function restaurant()
    {
        $images = Gallery::where('category', 'dining')->take(6)->get();
        return view('facilities.restaurant', compact('images'));
    }
    
    public function swimmingPool()
    {
        $images = Gallery::where('category', 'facilities')->take(6)->get();
        return view('facilities.swimming-pool', compact('images'));
    }
    
    public function spa()
    {
        $images = Gallery::where('category', 'facilities')->take(6)->get();
        return view('facilities.spa', compact('images'));
    }
    
    public function fitness()
    {
        $images = Gallery::where('category', 'facilities')->take(6)->get();
        return view('facilities.fitness', compact('images'));
    }
    
    public function uploadForm()
    {
        return view('upload');
    }
    
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'hotel-background.' . $image->getClientOriginalExtension();
            
            // Move the uploaded file to the public/images directory
            $image->move(public_path('images'), $filename);
            
            return redirect()->route('home')->with('success', 'Background image has been uploaded successfully!');
        }
        
        return back()->with('error', 'Failed to upload image.');
    }
} 