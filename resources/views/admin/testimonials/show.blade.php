@extends('layouts.admin')

@section('title', 'Detail Testimonial')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Testimonial</h1>
        <div>
            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
            </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Testimonial</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th style="width: 150px;">ID</th>
                            <td>{{ $testimonial->id }}</td>
                        </tr>
                        <tr>
                            <th>Pengguna</th>
                            <td>{{ $testimonial->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $testimonial->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star text-warning"></i>
                                    @else
                                        <i class="far fa-star text-warning"></i>
                                    @endif
                                @endfor
                                ({{ $testimonial->rating }}/5)
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($testimonial->is_approved)
                                <span class="badge badge-success">Disetujui</span>
                                @else
                                <span class="badge badge-warning">Belum Disetujui</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $testimonial->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="font-weight-bold">Komentar</h6>
                        </div>
                        <div class="card-body">
                            <p>{{ $testimonial->comment }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_approved" value="{{ $testimonial->is_approved ? '0' : '1' }}">
                            <button type="submit" class="btn btn-{{ $testimonial->is_approved ? 'warning' : 'success' }} btn-block">
                                <i class="fas fa-{{ $testimonial->is_approved ? 'times' : 'check' }}"></i> 
                                {{ $testimonial->is_approved ? 'Batalkan Persetujuan' : 'Setujui Testimonial' }}
                            </button>
                        </form>
                        
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="mt-2">
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
@endsection 