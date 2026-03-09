<?php

namespace Database\Seeders;

use App\Models\Venue;
use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    public function run(): void
    {
        $ballroomDir = '/images/venues/Ballroom/';
        $pulauDir = '/images/venues/Pulau/';
        $resortDir = '/images/venues/Resort/';
        $tamanDir = '/images/venues/Taman/';

        $ballroomGallery = [
            $ballroomDir . 'Aula-Masjid-Manarul-Aman.webp',
            $ballroomDir . 'Balai-Kartini.webp',
            $ballroomDir . 'Balai-Samudera-Kelapa-Gading-Jakarta-Utara.webp',
            $ballroomDir . 'Gedung Sampoerna Strategic Square.jpg',
            $ballroomDir . 'Gedung-Aneka-Bhakti.webp',
            $ballroomDir . 'Graha-Pondok-Pinang-Lebak-Bulus.webp',
            $ballroomDir . 'Grand-Ballroom-LIPI-Kuningan-Barat-Jakarta-Selatan.webp',
            $ballroomDir . 'Lippo-Kuningan-Grand-Ballroom.webp',
            $ballroomDir . 'Pati-Unus-Hall.webp',
            $ballroomDir . 'Smesco-Convention-Hall.webp',
        ];

        $tamanGallery = [
            $tamanDir . 'Bumi Samami.webp',
            $tamanDir . 'Gunung Pancar.webp',
            $tamanDir . 'Taman Langsat.webp',
        ];

        $resortGallery = [
            $resortDir . 'Hotel Ciputra world Surabaya.jpg',
            $resortDir . 'Hotel Dafam Semarang.jpg',
            $resortDir . 'Hotel Neo Candi Semarang.jpg',
            $resortDir . 'Patra Semarang Hotel & Convention.jpg',
            $resortDir . 'Pesonna Hotel Semarang.jpg',
        ];

        $pulauGallery = [
            $pulauDir . 'Merusaka Nusa Dua.jpg',
            $pulauDir . 'Renaissance Bali Nusa Dua.jpg',
            $pulauDir . 'Samabe Bali Suites and Villa.jpg',
            $pulauDir . 'Sofitel Bali Nusa Dua Beach Resort.jpg',
            $pulauDir . 'The Westin Resort Nusa Dua, Bali.jpg',
        ];

        $about = 'Lokasi impian untuk pernikahan Anda. Menawarkan fasilitas terbaik dengan suasana yang tak terlupakan.';
        $features = 'Kapasitas besar, parkir luas, sistem pendingin udara pusat, ruang rias pengantin.';

        $venues = [
            // Gedung / Ballroom (10)
            ['name' => 'Aula Masjid Manarul Aman', 'image' => $ballroomDir . 'Aula-Masjid-Manarul-Aman.webp', 'category' => 'gedung', 'location' => 'Jakarta'],
            ['name' => 'Balai Kartini', 'image' => $ballroomDir . 'Balai-Kartini.webp', 'category' => 'gedung', 'location' => 'Jakarta Selatan'],
            ['name' => 'Balai Samudera Kelapa Gading', 'image' => $ballroomDir . 'Balai-Samudera-Kelapa-Gading-Jakarta-Utara.webp', 'category' => 'gedung', 'location' => 'Jakarta Utara'],
            ['name' => 'Gedung Sampoerna Strategic Square', 'image' => $ballroomDir . 'Gedung Sampoerna Strategic Square.jpg', 'category' => 'gedung', 'location' => 'Jakarta Pusat'],
            ['name' => 'Gedung Aneka Bhakti', 'image' => $ballroomDir . 'Gedung-Aneka-Bhakti.webp', 'category' => 'gedung', 'location' => 'Jakarta Pusat'],
            ['name' => 'Graha Pondok Pinang', 'image' => $ballroomDir . 'Graha-Pondok-Pinang-Lebak-Bulus.webp', 'category' => 'gedung', 'location' => 'Jakarta Selatan'],
            ['name' => 'Grand Ballroom LIPI', 'image' => $ballroomDir . 'Grand-Ballroom-LIPI-Kuningan-Barat-Jakarta-Selatan.webp', 'category' => 'gedung', 'location' => 'Jakarta Selatan'],
            ['name' => 'Lippo Kuningan Grand Ballroom', 'image' => $ballroomDir . 'Lippo-Kuningan-Grand-Ballroom.webp', 'category' => 'gedung', 'location' => 'Jakarta Selatan'],
            ['name' => 'Pati Unus Hall', 'image' => $ballroomDir . 'Pati-Unus-Hall.webp', 'category' => 'gedung', 'location' => 'Jakarta Selatan'],
            ['name' => 'Smesco Convention Hall', 'image' => $ballroomDir . 'Smesco-Convention-Hall.webp', 'category' => 'gedung', 'location' => 'Jakarta Selatan'],

            // Taman / Outdoor (3)
            ['name' => 'Bumi Samami', 'image' => $tamanDir . 'Bumi Samami.webp', 'category' => 'taman', 'location' => 'Bandung'],
            ['name' => 'Gunung Pancar', 'image' => $tamanDir . 'Gunung Pancar.webp', 'category' => 'taman', 'location' => 'Bogor'],
            ['name' => 'Taman Langsat', 'image' => $tamanDir . 'Taman Langsat.webp', 'category' => 'taman', 'location' => 'Jakarta Selatan'],

            // Resort / Hotel (5)
            ['name' => 'Hotel Ciputra World Surabaya', 'image' => $resortDir . 'Hotel Ciputra world Surabaya.jpg', 'category' => 'resort', 'location' => 'Surabaya'],
            ['name' => 'Hotel Dafam Semarang', 'image' => $resortDir . 'Hotel Dafam Semarang.jpg', 'category' => 'resort', 'location' => 'Semarang'],
            ['name' => 'Hotel Neo Candi Semarang', 'image' => $resortDir . 'Hotel Neo Candi Semarang.jpg', 'category' => 'resort', 'location' => 'Semarang'],
            ['name' => 'Patra Semarang Hotel & Convention', 'image' => $resortDir . 'Patra Semarang Hotel & Convention.jpg', 'category' => 'resort', 'location' => 'Semarang'],
            ['name' => 'Pesonna Hotel Semarang', 'image' => $resortDir . 'Pesonna Hotel Semarang.jpg', 'category' => 'resort', 'location' => 'Semarang'],

            // Pulau / Tepi Laut (5)
            ['name' => 'Merusaka Nusa Dua', 'image' => $pulauDir . 'Merusaka Nusa Dua.jpg', 'category' => 'pulau', 'location' => 'Bali'],
            ['name' => 'Renaissance Bali Nusa Dua', 'image' => $pulauDir . 'Renaissance Bali Nusa Dua.jpg', 'category' => 'pulau', 'location' => 'Bali'],
            ['name' => 'Samabe Bali Suites and Villa', 'image' => $pulauDir . 'Samabe Bali Suites and Villa.jpg', 'category' => 'pulau', 'location' => 'Bali'],
            ['name' => 'Sofitel Bali Nusa Dua Beach Resort', 'image' => $pulauDir . 'Sofitel Bali Nusa Dua Beach Resort.jpg', 'category' => 'pulau', 'location' => 'Bali'],
            ['name' => 'The Westin Resort Nusa Dua, Bali', 'image' => $pulauDir . 'The Westin Resort Nusa Dua, Bali.jpg', 'category' => 'pulau', 'location' => 'Bali'],
        ];

        foreach ($venues as $v) {
            // Pilih gallery yang sesuai kategori
            $catGallery = match ($v['category']) {
                    'gedung' => $ballroomGallery,
                    'taman' => $tamanGallery,
                    'resort' => $resortGallery,
                    'pulau' => $pulauGallery,
                    default => [],
                };

            // Pastikan image utama ada di depan gallery
            $finalGallery = array_unique(array_merge([$v['image']], $catGallery));

            Venue::create([
                'name' => $v['name'],
                'owner' => 'Vendor Pernikahan',
                'location' => $v['location'],
                'price' => 'IDR ' . number_format(rand(5, 50), 0, ',', '.') . '.000.000 / Malam',
                'image' => $v['image'],
                'gallery' => array_values($finalGallery),
                'about' => $v['name'] . ' merupakan ' . $about,
                'features' => $features,
                'category' => $v['category'],
            ]);
        }
    }
}
