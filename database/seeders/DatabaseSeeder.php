<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users (includes admin and regular users)
        $this->call(UserSeeder::class);
        
        // Seed rooms
        $this->call(RoomSeeder::class);
        
        // Seed galleries
        $this->call(GallerySeeder::class);
        
        // Seed testimonials
        $this->call(TestimonialSeeder::class);
    }
}
