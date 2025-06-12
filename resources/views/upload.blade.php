@extends('layouts.app')

@section('title', 'Upload Background Image')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-8 text-center">Upload Background Image</h1>
    
    <form action="{{ route('admin.image.upload') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        <div class="mb-6">
            <label for="image" class="block text-gray-700 font-medium mb-2">Choose Image</label>
            <input type="file" id="image" name="image" accept="image/*" required
                class="block w-full text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:border-blue-500">
            <p class="text-gray-600 text-sm mt-1">Recommended size: 1920×1080 pixels</p>
        </div>
        
        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                Upload Image
            </button>
        </div>
    </form>
</div>
@endsection 