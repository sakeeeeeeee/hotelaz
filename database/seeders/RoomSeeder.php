<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Deluxe King Room',
                'description' => 'Nikmati kenyamanan dengan kamar Deluxe kami yang luas dengan tempat tidur king-size. Kamar ini dilengkapi dengan TV layar datar, minibar, dan kamar mandi pribadi dengan shower dan bathtub. Pemandangan kota yang menakjubkan tersedia dari jendela besar kamar.',
                'price_per_night' => 850000,
                'capacity' => 2,
                'bed_type' => 'King Size',
                'has_wifi' => true,
                'has_ac' => true,
                'has_tv' => true,
                'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=1000&auto=format&fit=crop',
                'status' => 'available',
            ],
            [
                'name' => 'Superior Twin Room',
                'description' => 'Kamar Superior Twin kami menawarkan dua tempat tidur single yang nyaman, ideal untuk teman atau keluarga yang bepergian bersama. Dilengkapi dengan meja kerja, TV kabel, dan kamar mandi pribadi dengan perlengkapan mandi gratis.',
                'price_per_night' => 750000,
                'capacity' => 2,
                'bed_type' => 'Twin Beds',
                'has_wifi' => true,
                'has_ac' => true,
                'has_tv' => true,
                'image' => 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?q=80&w=1000&auto=format&fit=crop',
                'status' => 'available',
            ],
            [
                'name' => 'Executive Suite',
                'description' => 'Suite Executive kami yang mewah menawarkan ruang tamu terpisah dan kamar tidur dengan tempat tidur king-size. Nikmati pemandangan panorama kota dari balkon pribadi Anda. Dilengkapi dengan fasilitas premium termasuk jubah mandi, sandal, dan akses ke Executive Lounge.',
                'price_per_night' => 1500000,
                'capacity' => 2,
                'bed_type' => 'King Size',
                'has_wifi' => true,
                'has_ac' => true,
                'has_tv' => true,
                'image' => 'https://images.unsplash.com/photo-1629140727571-9b5c6f6267b4?q=80&w=1000&auto=format&fit=crop',
                'status' => 'available',
            ],
            [
                'name' => 'Family Room',
                'description' => 'Kamar Keluarga kami yang luas ideal untuk keluarga dengan anak-anak. Kamar ini memiliki satu tempat tidur king-size dan dua tempat tidur single, TV layar datar, dan kamar mandi luas dengan shower dan bathtub. Paket sarapan keluarga tersedia dengan biaya tambahan.',
                'price_per_night' => 1200000,
                'capacity' => 4,
                'bed_type' => 'King Size + 2 Singles',
                'has_wifi' => true,
                'has_ac' => true,
                'has_tv' => true,
                'image' => 'https://images.unsplash.com/photo-1591088398332-8a7791972843?q=80&w=1000&auto=format&fit=crop',
                'status' => 'available',
            ],
            [
                'name' => 'Presidential Suite',
                'description' => 'Presidential Suite kami adalah puncak kemewahan. Suite dua kamar tidur ini menawarkan ruang tamu dan ruang makan terpisah, dapur kecil, dan kamar mandi marmer dengan jacuzzi. Layanan butler 24 jam tersedia untuk memastikan kenyamanan Anda. Nikmati pemandangan panorama kota dari balkon pribadi Anda.',
                'price_per_night' => 3500000,
                'capacity' => 4,
                'bed_type' => '2 King Size Beds',
                'has_wifi' => true,
                'has_ac' => true,
                'has_tv' => true,
                'image' => 'https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=1000&auto=format&fit=crop',
                'status' => 'available',
            ],
            [
                'name' => 'Honeymoon Suite',
                'description' => 'Rayakan momen spesial Anda di Honeymoon Suite kami yang romantis. Suite ini menawarkan tempat tidur king-size mewah, ruang tamu terpisah, dan kamar mandi dengan jacuzzi untuk dua orang. Pemandangan laut yang memukau, dekorasi romantis, dan layanan kamar 24 jam tersedia untuk membuat pengalaman Anda tak terlupakan.',
                'price_per_night' => 2000000,
                'capacity' => 2,
                'bed_type' => 'King Size',
                'has_wifi' => true,
                'has_ac' => true,
                'has_tv' => true,
                'image' => 'https://images.unsplash.com/photo-1602002418816-5c0aeef426aa?q=80&w=1000&auto=format&fit=crop',
                'status' => 'available',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
