<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'user_email' => 'john@example.com',
                'rating' => 5,
                'content' => 'Pengalaman menginap yang luar biasa! Kamar yang nyaman, staf yang ramah, dan fasilitas yang lengkap. Saya sangat merekomendasikan Hotel Az untuk siapa saja yang mencari pengalaman menginap yang mewah dengan harga terjangkau.',
                'is_approved' => true,
            ],
            [
                'user_email' => 'jane@example.com',
                'rating' => 4,
                'content' => 'Kami sangat menikmati waktu kami di Hotel Az. Kamarnya bersih dan nyaman, sarapan pagi sangat lezat dengan banyak pilihan. Lokasi hotel juga strategis, dekat dengan pusat perbelanjaan dan tempat wisata.',
                'is_approved' => true,
            ],
            [
                'user_email' => 'robert@example.com',
                'rating' => 5,
                'content' => 'Pelayanan di Hotel Az sungguh luar biasa. Staf sangat membantu dan ramah. Fasilitas spa dan kolam renang sangat menyegarkan. Saya pasti akan kembali lagi saat berkunjung ke kota ini.',
                'is_approved' => true,
            ],
            [
                'user_email' => 'emily@example.com',
                'rating' => 4,
                'content' => 'Hotel yang sangat nyaman dengan desain interior yang indah. Restoran hotel menyajikan makanan yang lezat. Satu-satunya kekurangan adalah WiFi yang kadang lambat, tapi secara keseluruhan pengalaman yang menyenangkan.',
                'is_approved' => true,
            ],
            [
                'user_email' => 'test@example.com',
                'rating' => 5,
                'content' => 'Sebagai tamu yang sering menginap di berbagai hotel, saya bisa mengatakan bahwa Hotel Az adalah salah satu yang terbaik. Pelayanan prima, kamar yang luas, dan fasilitas lengkap membuat pengalaman menginap saya sangat berkesan.',
                'is_approved' => false,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            $user = User::where('email', $testimonial['user_email'])->first();
            
            if ($user) {
                Testimonial::create([
                    'user_id' => $user->id,
                    'rating' => $testimonial['rating'],
                    'content' => $testimonial['content'],
                    'is_approved' => $testimonial['is_approved'],
                ]);
            }
        }
    }
} 