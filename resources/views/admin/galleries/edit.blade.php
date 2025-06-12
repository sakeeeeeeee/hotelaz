@extends('layouts.admin')

@section('title', 'Edit Gambar Galeri')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gambar Galeri</h1>
        <a href="{{ route('admin.galleries.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Gambar</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Judul <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="category">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                                <option value="">Pilih Kategori</option>
                                <option value="hotel" {{ old('category', $gallery->category) == 'hotel' ? 'selected' : '' }}>Hotel</option>
                                <option value="room" {{ old('category', $gallery->category) == 'room' ? 'selected' : '' }}>Kamar</option>
                                <option value="restaurant" {{ old('category', $gallery->category) == 'restaurant' ? 'selected' : '' }}>Restoran</option>
                                <option value="facilities" {{ old('category', $gallery->category) == 'facilities' ? 'selected' : '' }}>Fasilitas</option>
                                <option value="other" {{ old('category', $gallery->category) == 'other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="is_featured">Tampilkan di Halaman Utama (Featured)</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image_path">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image_path') is-invalid @enderror" id="image_path" name="image_path">
                                <label class="custom-file-label" for="image_path">Pilih file gambar baru (opsional)</label>
                                @error('image_path')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Format gambar: JPG, JPEG, PNG. Maksimal 2MB.</small>
                        </div>
                        
                        <div class="mt-3">
                            <div class="image-preview" id="imagePreview">
                                @if($gallery->image_path)
                                <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->title }}" class="img-fluid" style="max-height: 300px;">
                                @else
                                <div class="text-center p-3 bg-light">
                                    <i class="fas fa-image fa-3x text-secondary"></i>
                                    <p class="mt-2">Tidak ada gambar</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
            
            <hr class="my-4">
            
            <div class="text-right">
                <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                        <i class="fas fa-trash"></i> Hapus Gambar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image preview
    document.getElementById('image_path').addEventListener('change', function(e) {
        const preview = document.querySelector('#imagePreview img');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                // Create image if it doesn't exist
                if (!preview) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = "Preview Gambar";
                    img.className = "img-fluid";
                    img.style.maxHeight = "300px";
                    
                    const previewDiv = document.getElementById('imagePreview');
                    previewDiv.innerHTML = '';
                    previewDiv.appendChild(img);
                } else {
                    preview.src = e.target.result;
                }
            }
            
            reader.readAsDataURL(file);
            
            // Update file input label
            const label = document.querySelector('.custom-file-label');
            label.textContent = file.name;
        }
    });
</script>
@endpush
@endsection 