@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Testimonial</h1>
        <a href="{{ route('admin.testimonials.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Testimonial</h6>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="font-weight-bold">Informasi Testimonial</h6>
                        </div>
                        <div class="card-body">
                            <p><strong>ID:</strong> {{ $testimonial->id }}</p>
                            <p><strong>Pengguna:</strong> {{ $testimonial->user->name }}</p>
                            <p><strong>Email:</strong> {{ $testimonial->user->email }}</p>
                            <p><strong>Rating:</strong>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-warning"></i>
                                    @endif
                                @endfor
                                ({{ $testimonial->rating }}/5)
                            </p>
                            <p><strong>Tanggal:</strong> {{ $testimonial->created_at->format('d/m/Y H:i') }}</p>
                            <p><strong>Komentar:</strong></p>
                            <div class="p-3 bg-light rounded">
                                {{ $testimonial->comment }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="font-weight-bold">Ubah Status</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="form-group">
                                    <label for="is_approved">Status Testimonial</label>
                                    <select class="form-control" id="is_approved" name="is_approved">
                                        <option value="1" {{ $testimonial->is_approved ? 'selected' : '' }}>Disetujui</option>
                                        <option value="0" {{ !$testimonial->is_approved ? 'selected' : '' }}>Belum Disetujui</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                            </form>
                            
                            <hr>
                            
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                    <i class="fas fa-trash"></i> Hapus Testimonial
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 