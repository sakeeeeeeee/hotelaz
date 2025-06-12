<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = $request->category;
        $query = Gallery::query();
        
        if ($category) {
            $query->where('category', $category);
        }
        
        $galleries = $query->orderBy('created_at', 'desc')->paginate(12);
        
        return view('admin.galleries.index', compact('galleries', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'required|image|max:2048',
            'category' => 'required|string|max:100',
            'is_featured' => 'boolean',
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->category = $request->category;
        $gallery->is_featured = $request->is_featured ? true : false;

        if ($request->hasFile('image_path')) {
            $path = $request->file('image_path')->store('gallery-images', 'public');
            $gallery->image_path = $path;
        }

        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('success', 'Gambar berhasil ditambahkan ke galeri.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|image|max:2048',
            'category' => 'required|string|max:100',
            'is_featured' => 'boolean',
        ]);

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->category = $request->category;
        $gallery->is_featured = $request->is_featured ? true : false;

        if ($request->hasFile('image_path')) {
            // Delete old image
            Storage::disk('public')->delete($gallery->image_path);
            
            $path = $request->file('image_path')->store('gallery-images', 'public');
            $gallery->image_path = $path;
        }

        $gallery->save();

        return redirect()->route('admin.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        // Delete image
        Storage::disk('public')->delete($gallery->image_path);
        
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gambar berhasil dihapus dari galeri.');
    }
} 