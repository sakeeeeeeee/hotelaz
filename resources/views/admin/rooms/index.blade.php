@extends('layouts.admin')

@section('header', 'Manage Rooms')

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-700">All Rooms</h3>
                <a href="{{ route('admin.rooms.create') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">
                    <i class="fas fa-plus mr-2"></i> Add New Room
                </a>
            </div>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Room
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Capacity
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($rooms as $room)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-16">
                                            @if($room->featured_image)
                                                <img class="h-10 w-16 object-cover rounded" src="{{ asset('storage/' . $room->featured_image) }}" alt="{{ $room->name }}">
                                            @else
                                                <div class="h-10 w-16 bg-gray-200 rounded flex items-center justify-center">
                                                    <i class="fas fa-bed text-gray-500"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $room->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                Room #{{ $room->room_number }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $room->type }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $room->capacity }} persons
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ number_format($room->price_per_night, 0) }} / night
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($room->status === 'available')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Available
                                        </span>
                                    @elseif($room->status === 'booked')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Booked
                                        </span>
                                    @elseif($room->status === 'maintenance')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Maintenance
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.rooms.edit', $room->id) }}" class="text-amber-600 hover:text-amber-900 mr-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button 
                                        onclick="event.preventDefault(); document.getElementById('delete-room-{{ $room->id }}').submit();"
                                        class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-room-{{ $room->id }}" action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $rooms->links() }}
            </div>
        </div>
    </div>
@endsection 