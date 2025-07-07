@extends('layouts.admin')

@section('header', 'Edit Reservation')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl mx-auto mt-8">
    <div class="p-6 bg-white border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Edit Reservation #{{ $reservation->id }}</h3>
        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Guest</label>
                    <input type="text" value="{{ $reservation->user->name }} ({{ $reservation->user->email }})" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" disabled>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Room</label>
                    <input type="text" value="{{ $reservation->room->name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm bg-gray-100" disabled>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Check In</label>
                        <input type="date" name="check_in_date" value="{{ $reservation->check_in_date ? $reservation->check_in_date->format('Y-m-d') : '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Check Out</label>
                        <input type="date" name="check_out_date" value="{{ $reservation->check_out_date ? $reservation->check_out_date->format('Y-m-d') : '' }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Total Guests</label>
                    <input type="number" name="total_guests" value="{{ $reservation->total_guests }}" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Total Price</label>
                    <input type="number" name="total_price" value="{{ $reservation->total_price }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="pending" {{ $reservation->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ $reservation->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="checked_in" {{ $reservation->status === 'checked_in' ? 'selected' : '' }}>Checked In</option>
                        <option value="checked_out" {{ $reservation->status === 'checked_out' ? 'selected' : '' }}>Checked Out</option>
                        <option value="cancelled" {{ $reservation->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Payment Status</label>
                    <select name="payment_status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        <option value="pending" {{ $reservation->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="waiting_confirmation" {{ $reservation->payment_status === 'waiting_confirmation' ? 'selected' : '' }}>Waiting Confirmation</option>
                        <option value="paid" {{ $reservation->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="failed" {{ $reservation->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Special Requests</label>
                    <textarea name="special_requests" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ $reservation->special_requests }}</textarea>
                </div>
                @if($reservation->payment_proof)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Payment Proof</label>
                        @if(Str::endsWith($reservation->payment_proof, ['.jpg', '.jpeg', '.png']))
                            <img src="{{ asset('storage/' . $reservation->payment_proof) }}" alt="Payment Proof" class="max-w-xs rounded shadow mt-2">
                        @elseif(Str::endsWith($reservation->payment_proof, ['.pdf']))
                            <a href="{{ asset('storage/' . $reservation->payment_proof) }}" target="_blank" class="text-indigo-600 underline mt-2 inline-block">View PDF</a>
                        @else
                            <a href="{{ asset('storage/' . $reservation->payment_proof) }}" target="_blank" class="text-indigo-600 underline mt-2 inline-block">Download File</a>
                        @endif
                    </div>
                @endif
            </div>
            <div class="mt-6 flex justify-end">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update Reservation</button>
            </div>
        </form>
    </div>
</div>
@endsection 