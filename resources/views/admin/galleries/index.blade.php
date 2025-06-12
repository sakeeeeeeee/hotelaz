@extends('layouts.admin')

@section('title', 'Manajemen Galeri')
@section('header', 'Manajemen Galeri')

@section('content')
<div class="w-full">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Manajemen Galeri</h1>
        <a href="{{ route('admin.galleries.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Gambar
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-md overflow-hidden">
        <div class="bg-gray-50 py-3 px-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Gambar</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.galleries.index') }}" class="px-3 py-1 rounded text-sm {{ !$category ? 'bg-indigo-600 text-white' : 'bg-white text-indigo-600 border border-indigo-600' }}">
                    Semua
                </a>
                <a href="{{ route('admin.galleries.index', ['category' => 'hotel']) }}" class="px-3 py-1 rounded text-sm {{ $category === 'hotel' ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 border border-blue-600' }}">
                    Hotel
                </a>
                <a href="{{ route('admin.galleries.index', ['category' => 'room']) }}" class="px-3 py-1 rounded text-sm {{ $category === 'room' ? 'bg-green-600 text-white' : 'bg-white text-green-600 border border-green-600' }}">
                    Kamar
                </a>
                <a href="{{ route('admin.galleries.index', ['category' => 'restaurant']) }}" class="px-3 py-1 rounded text-sm {{ $category === 'restaurant' ? 'bg-yellow-600 text-white' : 'bg-white text-yellow-600 border border-yellow-600' }}">
                    Restoran
                </a>
                <a href="{{ route('admin.galleries.index', ['category' => 'facilities']) }}" class="px-3 py-1 rounded text-sm {{ $category === 'facilities' ? 'bg-red-600 text-white' : 'bg-white text-red-600 border border-red-600' }}">
                    Fasilitas
                </a>
            </div>
        </div>
        <div class="p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($galleries as $gallery)
                <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200 transition-transform duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $gallery->title }}</h3>
                        <p class="text-gray-600 text-sm mb-3 h-12 overflow-hidden">{{ Str::limit($gallery->description, 100) }}</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="px-2 py-1 text-xs rounded-full {{ 
                                $gallery->category == 'hotel' ? 'bg-blue-100 text-blue-800' :
                                ($gallery->category == 'room' ? 'bg-green-100 text-green-800' :
                                ($gallery->category == 'restaurant' ? 'bg-yellow-100 text-yellow-800' :
                                'bg-red-100 text-red-800')) 
                            }}">
                                {{ ucfirst($gallery->category) }}
                            </span>
                            @if($gallery->is_featured)
                            <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">Featured</span>
                            @endif
                        </div>
                        <div class="flex justify-between mt-3 pt-3 border-t border-gray-200">
                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 flex items-center">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 flex items-center" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3">
                    <div class="bg-blue-50 text-blue-600 p-4 rounded-md">
                        Tidak ada gambar ditemukan. <a href="{{ route('admin.galleries.create') }}" class="font-medium underline">Tambah gambar baru</a>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="mt-6">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 