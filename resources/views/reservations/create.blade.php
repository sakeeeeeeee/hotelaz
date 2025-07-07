@extends('layouts.app')

@section('title', 'Book Room')

@section('content')
<div class="bg-lightest-green py-12 min-h-screen">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-medium-green to-light-green h-24 flex items-end p-6">
                <h1 class="text-2xl font-bold text-white">Confirm Your Booking</h1>
            </div>
            <div class="p-6 sm:p-8">
                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded text-red-700">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-dark-green mb-2">Room: {{ $room->name }}</h2>
                    <div class="grid grid-cols-2 gap-4 text-dark-green">
                        <div>
                            <span class="font-medium">Check In:</span> {{ $checkIn }}
                        </div>
                        <div>
                            <span class="font-medium">Check Out:</span> {{ $checkOut }}
                        </div>
                        <div>
                            <span class="font-medium">Guests:</span> {{ $guests }}
                        </div>
                        <div>
                            <span class="font-medium">Nights:</span> {{ $nights }}
                        </div>
                        <div class="col-span-2 mt-2">
                            <span class="font-medium">Total Price:</span> <span class="text-medium-green font-bold">{{ number_format($totalPrice, 0) }}</span>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('reservations.store') }}" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="check_in_date" value="{{ $checkIn }}">
                    <input type="hidden" name="check_out_date" value="{{ $checkOut }}">
                    <input type="hidden" name="total_guests" value="{{ $guests }}">
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div>
                        <label for="special_requests" class="block text-sm font-medium text-dark-green">Special Requests (optional)</label>
                        <textarea id="special_requests" name="special_requests" rows="2" class="mt-1 block w-full rounded-md border-light-green shadow-sm focus:border-medium-green focus:ring-medium-green"></textarea>
                    </div>
                    <div>
                        <label for="payment_proof" class="block text-sm font-medium text-dark-green">Upload Payment Proof <span class="text-red-500">*</span></label>
                        <input type="file" id="payment_proof" name="payment_proof" accept="image/*,application/pdf" required class="mt-1 block w-full rounded-md border-light-green shadow-sm focus:border-medium-green focus:ring-medium-green">
                        @error('payment_proof')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-medium-green hover:bg-dark-green text-lightest-green py-3 px-4 rounded-md font-medium">
                            Confirm Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 