@extends('layouts.admin')

@section('title', 'Manajemen Testimonial')
@section('header', 'Manajemen Testimonial')

@section('content')
<div class="w-full">
    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-md overflow-hidden">
        <div class="bg-gray-50 py-3 px-4 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Testimonial</h2>
            <div class="flex space-x-2">
                <a href="{{ route('admin.testimonials.index') }}" class="px-3 py-1 rounded text-sm {{ $isApproved === null ? 'bg-indigo-600 text-white' : 'bg-white text-indigo-600 border border-indigo-600' }}">
                    Semua
                </a>
                <a href="{{ route('admin.testimonials.index', ['is_approved' => 1]) }}" class="px-3 py-1 rounded text-sm {{ $isApproved === '1' ? 'bg-green-600 text-white' : 'bg-white text-green-600 border border-green-600' }}">
                    Disetujui
                </a>
                <a href="{{ route('admin.testimonials.index', ['is_approved' => 0]) }}" class="px-3 py-1 rounded text-sm {{ $isApproved === '0' ? 'bg-yellow-600 text-white' : 'bg-white text-yellow-600 border border-yellow-600' }}">
                    Belum Disetujui
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengguna</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Komentar</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $testimonial->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $testimonial->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <i class="fas fa-star text-yellow-400"></i>
                                @else
                                    <i class="far fa-star text-yellow-400"></i>
                                @endif
                            @endfor
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($testimonial->comment, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if($testimonial->is_approved)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disetujui</span>
                            @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Belum Disetujui</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $testimonial->created_at->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 p-1 rounded">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-blue-600 hover:text-blue-900 bg-blue-100 p-1 rounded">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 p-1 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Tidak ada testimonial.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="py-3 px-6 bg-gray-50 border-t">
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection 