<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:10|max:500',
        ]);

        $testimonial = new Testimonial();
        $testimonial->user_id = Auth::id();
        $testimonial->rating = $request->rating;
        $testimonial->content = $request->content;
        $testimonial->is_approved = false;
        $testimonial->save();

        return back()->with('success', 'Terima kasih atas testimonial Anda. Testimonial akan ditampilkan setelah disetujui oleh admin.');
    }
} 