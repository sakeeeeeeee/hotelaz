<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'price_per_night',
        'capacity',
        'features',
        'featured_image',
        'gallery_images',
        'status', // available, booked, maintenance
        'quantity', // jumlah unit kamar
    ];

    protected $casts = [
        'features' => 'array',
        'gallery_images' => 'array',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function roomUnits()
    {
        return $this->hasMany(RoomUnit::class);
    }
} 