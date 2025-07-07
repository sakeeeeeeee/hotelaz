@extends('layouts.app')

@section('title', 'Reservation Details')

@section('content')
<div class="bg-lightest-green py-12 min-h-screen">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-medium-green to-light-green h-24 flex items-end p-6">
                <h1 class="text-2xl font-bold text-white">Reservation Details</h1>
            </div>
            <div class="p-6 sm:p-8">
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded text-green-700">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-dark-green mb-2">Room: {{ $reservation->room->name }}</h2>
                    <div class="grid grid-cols-2 gap-4 text-dark-green">
                        <div>
                            <span class="font-medium">Check In:</span> {{ $reservation->check_in_date->format('Y-m-d') }}
                        </div>
                        <div>
                            <span class="font-medium">Check Out:</span> {{ $reservation->check_out_date->format('Y-m-d') }}
                        </div>
                        <div>
                            <span class="font-medium">Guests:</span> {{ $reservation->total_guests }}
                        </div>
                        <div>
                            <span class="font-medium">Nights:</span> {{ $reservation->check_in_date->diffInDays($reservation->check_out_date) }}
                        </div>
                        <div class="col-span-2 mt-2">
                            <span class="font-medium">Total Price:</span> <span class="text-medium-green font-bold">{{ number_format($reservation->total_price, 0) }}</span>
                        </div>
                        <div class="col-span-2 mt-2">
                            <span class="font-medium">Status:</span> <span class="text-dark-green">{{ ucfirst(str_replace('_', ' ', $reservation->status)) }}</span>
                        </div>
                        <div class="col-span-2 mt-2">
                            <span class="font-medium">Payment Status:</span> <span class="text-dark-green">{{ ucfirst(str_replace('_', ' ', $reservation->payment_status)) }}</span>
                        </div>
                    </div>
                </div>
                @if($reservation->payment_proof)
                    <div class="mb-6">
                        <span class="block text-sm font-medium text-dark-green mb-2">Payment Proof:</span>
                        @if(Str::endsWith($reservation->payment_proof, ['.jpg', '.jpeg', '.png']))
                            <img src="{{ asset('storage/' . $reservation->payment_proof) }}" alt="Payment Proof" class="max-w-xs rounded shadow">
                        @elseif(Str::endsWith($reservation->payment_proof, ['.pdf']))
                            <a href="{{ asset('storage/' . $reservation->payment_proof) }}" target="_blank" class="text-medium-green underline">View PDF</a>
                        @else
                            <a href="{{ asset('storage/' . $reservation->payment_proof) }}" target="_blank" class="text-medium-green underline">Download File</a>
                        @endif
                    </div>
                @endif
                <div class="mt-6">
                    <a href="{{ route('rooms.index') }}" class="inline-block bg-medium-green hover:bg-dark-green text-lightest-green py-2 px-4 rounded-md font-medium">Back to Rooms</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 