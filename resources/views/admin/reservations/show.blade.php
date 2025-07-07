@extends('layouts.admin')

@section('header', 'Reservation Details')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-700">Reservation #{{ $reservation->id }}</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="px-4 py-2 bg-amber-600 text-white text-sm font-medium rounded-md hover:bg-amber-500 focus:outline-none focus:bg-amber-500">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                    <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-md hover:bg-gray-500 focus:outline-none focus:bg-gray-500">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                </div>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
            <!-- Reservation Status Card -->
            <div class="mb-6 p-4 border rounded-lg 
                @if($reservation->status === 'pending') bg-yellow-50 border-yellow-200
                @elseif($reservation->status === 'confirmed') bg-blue-50 border-blue-200
                @elseif($reservation->status === 'checked_in') bg-green-50 border-green-200
                @elseif($reservation->status === 'checked_out') bg-gray-50 border-gray-200
                @elseif($reservation->status === 'cancelled') bg-red-50 border-red-200
                @endif">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-sm font-medium text-gray-500">Status</span>
                        <div class="text-xl font-bold 
                            @if($reservation->status === 'pending') text-yellow-700
                            @elseif($reservation->status === 'confirmed') text-blue-700
                            @elseif($reservation->status === 'checked_in') text-green-700
                            @elseif($reservation->status === 'checked_out') text-gray-700
                            @elseif($reservation->status === 'cancelled') text-red-700
                            @endif">
                            {{ ucfirst(str_replace('_', ' ', $reservation->status)) }}
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="action" value="update_status">
                            <select name="status" onchange="this.form.submit()" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="" disabled>Change Status</option>
                                <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="checked_in" {{ $reservation->status === 'checked_in' ? 'selected' : '' }}>Checked In</option>
                                <option value="checked_out" {{ $reservation->status === 'checked_out' ? 'selected' : '' }}>Checked Out</option>
                                <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Guest Information -->
                <div>
                    <h4 class="text-md font-semibold text-gray-700 mb-4 border-b pb-2">Guest Information</h4>
                    <div class="space-y-3">
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Name</div>
                            <div class="flex-1 text-sm">{{ $reservation->user->name }}</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Email</div>
                            <div class="flex-1 text-sm">{{ $reservation->user->email }}</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Phone</div>
                            <div class="flex-1 text-sm">{{ $reservation->user->phone_number ?? 'Not provided' }}</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Address</div>
                            <div class="flex-1 text-sm">
                                @if($reservation->user->address)
                                    {{ $reservation->user->address }}<br>
                                    {{ $reservation->user->city }}, {{ $reservation->user->postal_code }}<br>
                                    {{ $reservation->user->country }}
                                @else
                                    Not provided
                                @endif
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Special Requests</div>
                            <div class="flex-1 text-sm">{{ $reservation->special_requests ?? 'None' }}</div>
                        </div>
                    </div>
                </div>
                
                <!-- Reservation Details -->
                <div>
                    <h4 class="text-md font-semibold text-gray-700 mb-4 border-b pb-2">Reservation Details</h4>
                    <div class="space-y-3">
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Room</div>
                            <div class="flex-1 text-sm">
                                {{ $reservation->room->name }} ({{ $reservation->room->room_number }})
                            </div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Check In</div>
                            <div class="flex-1 text-sm">{{ $reservation->check_in_date ? $reservation->check_in_date->format('d M Y') : '-' }}</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Check Out</div>
                            <div class="flex-1 text-sm">{{ $reservation->check_out_date ? $reservation->check_out_date->format('d M Y') : '-' }}</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Nights</div>
                            <div class="flex-1 text-sm">{{ ($reservation->check_in_date && $reservation->check_out_date) ? $reservation->check_in_date->diffInDays($reservation->check_out_date) : '-' }}</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Guests</div>
                            <div class="flex-1 text-sm">{{ $reservation->adults }} adults, {{ $reservation->children }} children</div>
                        </div>
                        <div class="flex">
                            <div class="w-32 text-sm font-medium text-gray-500">Created</div>
                            <div class="flex-1 text-sm">{{ $reservation->created_at->format('d M Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Information -->
            <div class="mt-6">
                <h4 class="text-md font-semibold text-gray-700 mb-4 border-b pb-2">Payment Information</h4>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-500">Room Rate (per night)</span>
                        <span class="text-sm">{{ number_format($reservation->room->price_per_night, 0) }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-500">Number of Nights</span>
                        <span class="text-sm">{{ ($reservation->check_in_date && $reservation->check_out_date) ? $reservation->check_in_date->diffInDays($reservation->check_out_date) : '-' }}</span>
                    </div>
                    @if($reservation->discount > 0)
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-500">Discount</span>
                        <span class="text-sm text-green-600">-{{ number_format($reservation->discount, 0) }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-gray-500">Taxes & Fees</span>
                        <span class="text-sm">{{ number_format($reservation->tax, 0) }}</span>
                    </div>
                    <div class="flex justify-between items-center font-bold pt-2 border-t border-gray-200 mt-2">
                        <span>Total</span>
                        <span>{{ number_format($reservation->total_price, 0) }}</span>
                    </div>
                    
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-500">Payment Status</span>
                            <div>
                                @if($reservation->payment_status === 'paid')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Paid
                                    </span>
                                @elseif($reservation->payment_status === 'pending')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                @elseif($reservation->payment_status === 'failed')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Failed
                                    </span>
                                @elseif($reservation->payment_status === 'waiting_confirmation')
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                        Waiting Confirmation
                                    </span>
                                @endif
                                
                                <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="inline ml-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="action" value="update_payment">
                                    <select name="payment_status" onchange="this.form.submit()" class="text-sm rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="" disabled>Change Payment</option>
                                        <option value="pending" {{ $reservation->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid" {{ $reservation->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="failed" {{ $reservation->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($reservation->payment_proof)
                        <div class="mt-4">
                            <span class="text-sm font-medium text-gray-500">Payment Proof:</span>
                            @if(Str::endsWith($reservation->payment_proof, ['.jpg', '.jpeg', '.png']))
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $reservation->payment_proof) }}" alt="Payment Proof" class="max-w-xs rounded shadow">
                                </div>
                            @elseif(Str::endsWith($reservation->payment_proof, ['.pdf']))
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $reservation->payment_proof) }}" target="_blank" class="text-medium-green underline">View PDF</a>
                                </div>
                            @else
                                <div class="mt-2">
                                    <a href="{{ asset('storage/' . $reservation->payment_proof) }}" target="_blank" class="text-medium-green underline">Download File</a>
                                </div>
                            @endif
                        </div>
                    @endif
                    @if($reservation->payment_status === 'waiting_confirmation')
                        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="mt-4 flex space-x-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="action" value="update_payment">
                            <input type="hidden" name="payment_status" value="paid">
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Confirm Payment</button>
                        </form>
                        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST" class="mt-2 flex space-x-2">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="action" value="update_payment">
                            <input type="hidden" name="payment_status" value="failed">
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Reject Payment</button>
                        </form>
                    @endif
                </div>
            </div>
            
            <!-- Admin Notes -->
            <div class="mt-6">
                <h4 class="text-md font-semibold text-gray-700 mb-4 border-b pb-2">Admin Notes</h4>
                <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="action" value="update_notes">
                    <textarea name="admin_notes" rows="3" 
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 mb-2">{{ $reservation->admin_notes }}</textarea>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                        Save Notes
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection 