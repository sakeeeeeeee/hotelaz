@extends('layouts.admin')

@section('title', 'Detail Gambar Galeri')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Gambar Galeri</h1>
        <div>
            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Gambar</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th style="width: 150px;">ID</th>
                            <td>{{ $gallery->id }}</td>
                        </tr>
                        <tr>
                            <th>Judul</th>
                            <td>{{ $gallery->title }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td><span class="badge badge-primary">{{ ucfirst($gallery->category) }}</span></td>
                        </tr>
                        <tr>
                            <th>Featured</th>
                            <td>
                                @if($gallery->is_featured)
                                <span class="badge badge-success">Ya</span>
                                @else
                                <span class="badge badge-secondary">Tidak</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Upload</th>
                            <td>{{ $gallery->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diperbarui</th>
                            <td>{{ $gallery->updated_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                    
                    <h6 class="font-weight-bold mt-4">Deskripsi</h6>
                    <div class="p-3 bg-light rounded">
                        {{ $gallery->description ?: 'Tidak ada deskripsi' }}
                    </div>
                    
                    <div class="mt-4 text-right">
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
                </div>
                <div class="card-body text-center">
                    @if($gallery->image_path)
                    <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="img-fluid" style="max-height: 500px;">
                    <div class="mt-3">
                        <a href="{{ asset('storage/' . $gallery->image_path) }}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fas fa-external-link-alt"></i> Lihat Ukuran Penuh
                        </a>
                    </div>
                    @else
                    <div class="p-5 bg-light rounded">
                        <i class="fas fa-image fa-5x text-secondary"></i>
                        <p class="mt-3">Tidak ada gambar</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 