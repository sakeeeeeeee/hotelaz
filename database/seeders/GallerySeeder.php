<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing records to prevent duplicates
        Gallery::truncate();
        
        // Delete existing images
        Storage::deleteDirectory('public/gallery-images');
        
        $galleries = [
            [
                'title' => 'Hotel Lobby',
                'description' => 'Our elegant and spacious lobby welcomes guests with comfortable seating and modern design.',
                'image_path' => 'gallery-images/lobby.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=800',
                'category' => 'facilities',
                'is_featured' => true,
            ],
            [
                'title' => 'Swimming Pool',
                'description' => 'Enjoy our refreshing swimming pool with comfortable loungers and poolside service.',
                'image_path' => 'gallery-images/pool.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1572331165267-854da2b10ccc?q=80&w=800',
                'category' => 'facilities',
                'is_featured' => true,
            ],
            [
                'title' => 'Restaurant',
                'description' => 'Our restaurant offers a variety of local and international cuisines prepared by expert chefs.',
                'image_path' => 'gallery-images/restaurant.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1590846406792-0adc7f938f1d?q=80&w=800',
                'category' => 'dining',
                'is_featured' => true,
            ],
            [
                'title' => 'Spa',
                'description' => 'Relax and rejuvenate at our spa with a range of treatments and services.',
                'image_path' => 'gallery-images/spa.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1596178065887-1198b6148b2b?q=80&w=800',
                'category' => 'facilities',
                'is_featured' => true,
            ],
            [
                'title' => 'Fitness Center',
                'description' => 'Stay fit during your stay with our well-equipped fitness center.',
                'image_path' => 'gallery-images/fitness.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1637666062717-1c6bcfa4a4df?q=80&w=800',
                'category' => 'facilities',
                'is_featured' => true,
            ],
            [
                'title' => 'Conference Room',
                'description' => 'Host your business meetings and events in our modern conference facilities.',
                'image_path' => 'gallery-images/conference.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?q=80&w=800',
                'category' => 'facilities',
                'is_featured' => true,
            ],
            [
                'title' => 'Deluxe King Room',
                'description' => 'Our spacious Deluxe King Room features a comfortable king-size bed and modern amenities.',
                'image_path' => 'gallery-images/deluxe-king.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?q=80&w=800',
                'category' => 'rooms',
                'is_featured' => false,
            ],
            [
                'title' => 'Superior Twin Room',
                'description' => 'The Superior Twin Room offers two comfortable single beds, perfect for friends or family.',
                'image_path' => 'gallery-images/superior-twin.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?q=80&w=800',
                'category' => 'rooms',
                'is_featured' => false,
            ],
            [
                'title' => 'Breakfast Buffet',
                'description' => 'Start your day with our extensive breakfast buffet offering a variety of options.',
                'image_path' => 'gallery-images/breakfast.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1533777857889-4be7c70b33f7?q=80&w=800',
                'category' => 'dining',
                'is_featured' => false,
            ],
            [
                'title' => 'Bar & Lounge',
                'description' => 'Unwind with your favorite drink at our stylish bar and lounge area.',
                'image_path' => 'gallery-images/bar.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=800',
                'category' => 'dining',
                'is_featured' => false,
            ],
            [
                'title' => 'Hotel Exterior',
                'description' => 'The impressive exterior of our hotel showcasing modern architecture.',
                'image_path' => 'gallery-images/exterior.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=800',
                'category' => 'facilities',
                'is_featured' => false,
            ],
            [
                'title' => 'Garden Area',
                'description' => 'Relax in our beautifully landscaped garden area.',
                'image_path' => 'gallery-images/garden.jpg',
                'image_url' => 'https://images.unsplash.com/photo-1551927336-09d50efd69cd?q=80&w=800',
                'category' => 'facilities',
                'is_featured' => false,
            ],
        ];

        // Create storage directory if it doesn't exist
        $storagePath = storage_path('app/public/gallery-images');
        if (!file_exists($storagePath)) {
            mkdir($storagePath, 0755, true);
        }

        // Download images and insert gallery records
        foreach ($galleries as $gallery) {
            $imagePath = storage_path('app/public/' . $gallery['image_path']);
            $this->downloadImage($gallery['image_url'], $imagePath);
            
            // Remove image_url before creating the record
            unset($gallery['image_url']);
            Gallery::create($gallery);
        }
    }

    /**
     * Download image from URL and save it to the specified path
     */
    private function downloadImage($url, $path)
    {
        try {
            // Create directory if it doesn't exist
            $dir = dirname($path);
            if (!file_exists($dir)) {
                mkdir($dir, 0755, true);
            }
            
            // Download the image
            $response = Http::get($url);
            
            if ($response->successful()) {
                file_put_contents($path, $response->body());
                return true;
            }
            
            // If download fails, create a fallback image
            $this->createFallbackImage($path);
            return false;
        } catch (\Exception $e) {
            // In case of any error, create a fallback image
            $this->createFallbackImage($path);
            return false;
        }
    }
    
    /**
     * Create a fallback image if download fails
     */
    private function createFallbackImage($path)
    {
        // Create a 800x600 image
        $image = imagecreatetruecolor(800, 600);
        
        // Use a gradient background
        $topColor = imagecolorallocate($image, 100, 150, 200);
        $bottomColor = imagecolorallocate($image, 50, 100, 150);
        
        // Fill with gradient
        for ($y = 0; $y < 600; $y++) {
            $ratio = $y / 600;
            $r = 100 - (50 * $ratio);
            $g = 150 - (50 * $ratio);
            $b = 200 - (50 * $ratio);
            $color = imagecolorallocate($image, $r, $g, $b);
            imageline($image, 0, $y, 800, $y, $color);
        }
        
        // Add text
        $white = imagecolorallocate($image, 255, 255, 255);
        $text = "Image Not Available";
        imagestring($image, 5, 300, 280, $text, $white);
        
        // Save the image
        imagejpeg($image, $path, 90);
        imagedestroy($image);
    }
} 