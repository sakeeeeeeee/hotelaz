@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                <i class="fas fa-bed text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Rooms</p>
                <p class="text-3xl font-semibold text-gray-800">{{ $totalRooms }}</p>
                <p class="text-green-500 text-sm">{{ $availableRooms }} Available</p>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
            <div class="p-3 rounded-full bg-amber-100 text-amber-600 mr-4">
                <i class="fas fa-calendar-check text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Reservations</p>
                <p class="text-3xl font-semibold text-gray-800">{{ $totalReservations }}</p>
                <p class="text-amber-500 text-sm">{{ $pendingReservations }} Pending</p>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <i class="fas fa-dollar-sign text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Revenue</p>
                <p class="text-3xl font-semibold text-gray-800">{{ number_format($totalRevenue, 0) }}</p>
                <p class="text-green-500 text-sm">From Paid Reservations</p>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6 flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Users</p>
                <p class="text-3xl font-semibold text-gray-800">{{ $totalUsers }}</p>
                <p class="text-blue-500 text-sm">Registered Users</p>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Monthly Revenue Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Monthly Revenue</h3>
            <div>
                <canvas id="revenueChart" height="300"></canvas>
            </div>
        </div>
        
        <!-- Recent Reservations -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-700">Recent Reservations</h3>
                <a href="{{ route('admin.reservations.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                    View All
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Guest
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Room
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Check In
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($recentReservations as $reservation)
                            <tr>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if ($reservation->user->profile_picture)
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Storage::url($reservation->user->profile_picture) }}" alt="{{ $reservation->user->name }}">
                                        @else
                                            <div class="h-8 w-8 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-600">
                                                {{ substr($reservation->user->name, 0, 1) }}
                                            </div>
                                        @endif
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $reservation->user->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $reservation->user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $reservation->room->name }}</div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $reservation->check_in_date->format('M d, Y') }}</div>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap">
                                    @if ($reservation->status === 'pending')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Pending
                                        </span>
                                    @elseif ($reservation->status === 'confirmed')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Confirmed
                                        </span>
                                    @elseif ($reservation->status === 'cancelled')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Cancelled
                                        </span>
                                    @elseif ($reservation->status === 'completed')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Completed
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('admin.reservations.show', $reservation) }}" class="text-indigo-600 hover:text-indigo-900">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-3 text-center text-gray-500">
                                    No reservations found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Pending Testimonials -->
    <div class="mt-8 bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Pending Testimonials</h3>
            <a href="{{ route('admin.testimonials.index', ['is_approved' => 0]) }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                View All
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($pendingTestimonials as $testimonial)
                <div class="border border-gray-200 rounded-lg p-4">
                    <div class="flex items-center mb-4">
                        @if ($testimonial->user->profile_picture)
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Storage::url($testimonial->user->profile_picture) }}" alt="{{ $testimonial->user->name }}">
                        @else
                            <div class="h-10 w-10 rounded-full bg-indigo-200 flex items-center justify-center text-indigo-600">
                                {{ substr($testimonial->user->name, 0, 1) }}
                            </div>
                        @endif
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $testimonial->user->name }}
                            </div>
                            <div class="flex text-amber-500">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $testimonial->rating)
                                        <i class="fas fa-star text-xs"></i>
                                    @else
                                        <i class="far fa-star text-xs"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">{{ Str::limit($testimonial->content, 100) }}</p>
                    <div class="flex justify-end space-x-2">
                        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="is_approved" value="1">
                            <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded text-white bg-green-600 hover:bg-green-700">
                                Approve
                            </button>
                        </form>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent text-xs font-medium rounded text-white bg-red-600 hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-4 text-gray-500">
                    No pending testimonials.
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Monthly Revenue Chart
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_keys($monthlyRevenue)) !!},
                datasets: [{
                    label: 'Revenue',
                    data: {!! json_encode(array_values($monthlyRevenue)) !!},
                    backgroundColor: 'rgba(79, 70, 229, 0.2)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += new Intl.NumberFormat().format(context.parsed.y);
                                }
                                return label;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush 