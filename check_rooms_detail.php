<?php
require 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

$app = new Application(dirname(__DIR__));
$app->bootstrapWith([
    LoadEnvironmentVariables::class
]);

$availableRooms = \App\Models\Room::where('status', 'available')->get();
echo "Total Available Rooms: " . $availableRooms->count() . "\n";
echo "Available Room Details:\n";
foreach ($availableRooms as $room) {
    echo "- ID: {$room->id}, Name: {$room->name}, Type: {$room->type}, Status: {$room->status}, Price: {$room->price_per_night}\n";
} 