<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $isApproved = $request->is_approved;
        $query = Testimonial::with('user');
        
        if ($isApproved !== null) {
            $query->where('is_approved', $isApproved);
        }
        
        $testimonials = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.testimonials.index', compact('testimonials', 'isApproved'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'is_approved' => 'required|boolean',
        ]);

        $testimonial->is_approved = $request->is_approved;
        $testimonial->save();

        return redirect()->route('admin.testimonials.index')->with('success', 'Status testimonial berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }
} 