<?php
require 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;

$app = new Application(dirname(__DIR__));
$app->bootstrapWith([
    LoadEnvironmentVariables::class
]);

$rooms = \App\Models\Room::all();
echo "Total Rooms: " . $rooms->count() . "\n";
echo "Room Details:\n";
foreach ($rooms as $room) {
    echo "- ID: {$room->id}, Name: {$room->name}, Type: {$room->type}, Status: {$room->status}\n";
} 