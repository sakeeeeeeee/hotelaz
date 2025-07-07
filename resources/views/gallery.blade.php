@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="bg-lightest-green py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-darkest-green">Hotel<span class="text-light-green">Az</span> Gallery</h1>
            <p class="mt-4 text-lg text-dark-green">Explore our beautiful hotel through pictures</p>
        </div>
    </div>
</div>

<div class="py-12 bg-lightest-green">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Category Filter -->
        <div class="mb-8 flex flex-wrap justify-center gap-2">
            @foreach($categories as $key => $category)
                <button 
                    class="filter-btn px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 
                          {{ $key === 'all' ? 'bg-medium-green text-lightest-green' : 'bg-light-green text-darkest-green hover:bg-medium-green hover:text-lightest-green' }}"
                    data-category="{{ $key }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="gallery-grid">
            @forelse($galleries as $gallery)
                <div class="gallery-item rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 flex flex-col h-full" 
                     data-category="{{ $gallery->category }}">
                    <div class="relative w-full h-64">
                        <img src="{{ Storage::url($gallery->image_path) }}" 
                             alt="{{ $gallery->title }}" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-darkest-green bg-opacity-0 hover:bg-opacity-50 transition-opacity duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
                            <button class="text-lightest-green bg-medium-green hover:bg-light-green px-4 py-2 rounded-md font-medium view-image" 
                                    data-image="{{ Storage::url($gallery->image_path) }}" 
                                    data-title="{{ $gallery->title }}" 
                                    data-description="{{ $gallery->description }}">
                                <i class="fas fa-search-plus mr-2"></i> View
                            </button>
                        </div>
                    </div>
                    <div class="p-4 flex-grow flex flex-col bg-lightest-green">
                        <h3 class="text-lg font-semibold text-darkest-green">{{ $gallery->title }}</h3>
                        <p class="text-sm text-dark-green flex-grow">{{ Str::limit($gallery->description, 80) }}</p>
                        <div class="mt-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-light-green text-darkest-green">
                                {{ ucfirst($gallery->category) }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-dark-green">No gallery images available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Image Viewer Modal -->
<div id="image-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="fixed inset-0 bg-darkest-green bg-opacity-75 transition-opacity"></div>
    <div class="relative bg-lightest-green rounded-lg max-w-3xl w-full mx-4 overflow-hidden">
        <div class="absolute top-0 right-0 pt-4 pr-4 z-10">
            <button id="close-modal" class="text-dark-green hover:text-darkest-green">
                <i class="fas fa-times fa-lg"></i>
            </button>
        </div>
        <div class="p-6">
            <img id="modal-image" src="" alt="" class="w-full h-auto">
            <div class="mt-4">
                <h3 id="modal-title" class="text-xl font-semibold text-darkest-green"></h3>
                <p id="modal-description" class="mt-2 text-dark-green"></p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Ensure all gallery items have the same height */
    .gallery-item {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    /* Force consistent image container height */
    .gallery-item .image-container {
        height: 256px; /* 64rem = 16px * 16 = 256px */
        overflow: hidden;
    }
    
    /* Adjust content area to fill remaining space */
    .gallery-item .content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    /* Make description take up available space so category tags align */
    .gallery-item .description {
        flex: 1;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter gallery items by category
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Update active button
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-medium-green', 'text-lightest-green');
                    btn.classList.add('bg-light-green', 'text-darkest-green', 'hover:bg-medium-green', 'hover:text-lightest-green');
                });
                button.classList.remove('bg-light-green', 'text-darkest-green', 'hover:bg-medium-green', 'hover:text-lightest-green');
                button.classList.add('bg-medium-green', 'text-lightest-green');
                
                const category = button.getAttribute('data-category');
                
                // Show/hide gallery items based on category
                galleryItems.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
        
        // Image modal functionality
        const modal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const closeModal = document.getElementById('close-modal');
        const viewButtons = document.querySelectorAll('.view-image');
        
        viewButtons.forEach(button => {
            button.addEventListener('click', () => {
                const image = button.getAttribute('data-image');
                const title = button.getAttribute('data-title');
                const description = button.getAttribute('data-description');
                
                modalImage.src = image;
                modalTitle.textContent = title;
                modalDescription.textContent = description;
                
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
            });
        });
        
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
        
        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
</script>
@endpush 