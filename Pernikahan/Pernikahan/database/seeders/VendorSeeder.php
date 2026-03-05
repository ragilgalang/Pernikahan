<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Vendor::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $defaultCategories = [
            ['name' => 'Katering', 'image' => 'images/vendors/Cathering/Contoh-menu-catering-wedding-nusantara.jpg'],
            ['name' => 'Dekorasi', 'image' => 'images/vendors/Dekorasi/20250206-023529_dekorasi-pastelwebp.webp'],
            ['name' => 'MUA & Hair', 'image' => 'images/vendors/MUA & Hair/makeup-artist.jpg'],
            ['name' => 'Busana', 'image' => 'images/vendors/Busana/baju-wedding-modern-dengan-aksen-kebaya.jpg'],
            ['name' => 'Dokumentasi', 'image' => 'images/vendors/Dokumentasi/download (2).jpg'],
            ['name' => 'Hiburan', 'image' => 'images/vendors/Hiburan/e88073c1bb9c7105b54c615a3e3f95f500826f1b.webp'],
            ['name' => 'Undangan', 'image' => 'images/vendors/Undangan/contoh-undangan-pernikahan-simple-dan-elegan-25.png'],
            ['name' => 'Kue', 'image' => 'images/vendors/Kue/ea2f0a986fc0ac9f7b5f39e93ceb86c45125fcdc.webp'],
            ['name' => 'Cincin', 'image' => 'images/vendors/Cincin/Cincin-Kawin.jpg'],
            ['name' => 'Transport', 'image' => 'images/vendors/Transport/download.jpg'],
        ];

        $defaultTestimonials = [
            ['text' => 'Layanan yang luar biasa dan sangat profesional.', 'author' => 'Sari & Budi'],
            ['text' => 'Sangat merekomendasikan vendor ini untuk hari bahagia Anda.', 'author' => 'Ani & Adi']
        ];

        $vendors = [
            // Katering
            [
                'name' => 'Nusantara Catering',
                'owner' => 'Bapak Adi',
                'type' => 'katering',
                'location' => 'Jakarta Selatan',
                'price' => 'Rp 50.000 / pax',
                'image' => 'images/vendors/Cathering/Contoh-menu-catering-wedding-nusantara.jpg',
                'rating' => 4.8,
                'about' => 'Menyajikan hidangan Nusantara terbaik untuk hari spesial Anda.',
                'features' => ['Menu Buffet', 'Gubukan Tradisional', 'Test Food Gratis'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Dekorasi
            [
                'name' => 'Rustic Dreams Decoration',
                'owner' => 'Ibu Maya',
                'type' => 'dekorasi',
                'location' => 'Bandung, Jawa Barat',
                'price' => 'Mulai dari Rp 15.000.000',
                'image' => 'images/vendors/Dekorasi/20250206-023529_dekorasi-rusticwebp.webp',
                'rating' => 4.9,
                'about' => 'Spesialis dekorasi tema rustic dan vintage yang elegan.',
                'features' => ['Full Decoration', 'Bunga Segar', 'Setting Pencahayaan'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            [
                'name' => 'Floral Bliss',
                'owner' => 'Bapak Rian',
                'type' => 'dekorasi',
                'location' => 'Jakarta Pusat',
                'price' => 'Mulai dari Rp 20.000.000',
                'image' => 'images/vendors/Dekorasi/20250206-023530_dekorasi-floralwebp.webp',
                'rating' => 4.7,
                'about' => 'Mewujudkan pernikahan penuh bunga yang memukau.',
                'features' => ['Pesta Kebun', 'Bunga Impor', 'Pelaminan Custom'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // MUA
            [
                'name' => 'Imel Vilentcia MUA',
                'owner' => 'Ibu Imel',
                'type' => 'mua',
                'location' => 'Surabaya, Jawa Timur',
                'price' => 'Rp 7.500.000',
                'image' => 'images/vendors/MUA & Hair/imel-vilentcia-mua-surabaya.jpg',
                'rating' => 5.0,
                'about' => 'MUA ternama di Surabaya dengan sentuhan glamour dan elegan.',
                'features' => ['Make up Pengantin', 'Hair Do', 'Accesoris Eksklusif'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            [
                'name' => 'Malvava Make Up',
                'owner' => 'Ibu Malva',
                'type' => 'mua',
                'location' => 'Surabaya',
                'price' => 'Rp 6.000.000',
                'image' => 'images/vendors/MUA & Hair/malvava-mua-surabaya.jpg',
                'rating' => 4.8,
                'about' => 'Spesialis flawless look yang membuat Anda bersinar.',
                'features' => ['Professional Service', 'High End Products', 'On Location'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Busana
            [
                'name' => 'Kebaya Modern Gallery',
                'owner' => 'Ibu Sinta',
                'type' => 'busana',
                'location' => 'Yogyakarta',
                'price' => 'Sewa: Rp 2.500.000',
                'image' => 'images/vendors/Busana/baju-wedding-modern-dengan-aksen-kebaya.jpg',
                'rating' => 4.6,
                'about' => 'Menyediakan koleksi kebaya modern dengan sentuhan tradisional yang kental.',
                'features' => ['Custom Fit', 'Bahan Premium', 'Sewa & Jahit'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Dokumentasi
            [
                'name' => 'Eternal Moments Photo',
                'owner' => 'Bapak Kevin',
                'type' => 'dokumentasi',
                'location' => 'Bali',
                'price' => 'Rp 10.000.000',
                'image' => 'images/vendors/Dokumentasi/download (2).jpg',
                'rating' => 4.9,
                'about' => 'Mengabadikan setiap detik berharga dalam hidup Anda secara puitis.',
                'features' => ['Full Day Coverage', 'Cinematic Video', 'Sameday Edit'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Hiburan
            [
                'name' => 'Acoustic Soul',
                'owner' => 'Bapak Rendy',
                'type' => 'hiburan',
                'location' => 'Semarang',
                'price' => 'Rp 5.000.000',
                'image' => 'images/vendors/Hiburan/e88073c1bb9c7105b54c615a3e3f95f500826f1b.webp',
                'rating' => 4.7,
                'about' => 'Band akustik profesional untuk suasana pernikahan yang hangat dan romantis.',
                'features' => ['Sound System', 'Singer Duo', 'Custom Playlist'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Undangan
            [
                'name' => 'Classic Invite',
                'owner' => 'Bapak Hendra',
                'type' => 'undangan',
                'location' => 'Malang',
                'price' => 'Mulai dari Rp 5.000 / lbr',
                'image' => 'images/vendors/Undangan/contoh-undangan-pernikahan-simple-dan-elegan-25.png',
                'rating' => 4.5,
                'about' => 'Desain undangan elegan dan eksklusif dengan kualitas cetak terbaik.',
                'features' => ['Embose & Hot Print', 'Kertas Premium', 'Desain Custom'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Kue
            [
                'name' => 'Sugar Fairy Cakes',
                'owner' => 'Ibu Linda',
                'type' => 'kue',
                'location' => 'Bogor',
                'price' => 'Mulai dari Rp 3.000.000',
                'image' => 'images/vendors/Kue/ea2f0a986fc0ac9f7b5f39e93ceb86c45125fcdc.webp',
                'rating' => 4.8,
                'about' => 'Kue pernikahan bertingkat dengan rasa yang lezat dan dekorasi cantik.',
                'features' => ['Custom Design', 'Sugar Flowers', 'Varian Rasa Banyak'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Cincin
            [
                'name' => 'Lustre Jewelry',
                'owner' => 'Bapak Anton',
                'type' => 'cincin',
                'location' => 'Surabaya',
                'price' => 'Sepasang: Rp 8.000.000',
                'image' => 'images/vendors/Cincin/Cincin-Kawin.jpg',
                'rating' => 4.9,
                'about' => 'Cincin kawin berlian dan emas dengan pengerjaan halus dan presisi.',
                'features' => ['Gratis Grafir', 'Sertifikat Berlian', 'Buyback Guarantee'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
            // Transport
            [
                'name' => 'Royal Wedding Car',
                'owner' => 'Bapak Doni',
                'type' => 'transport',
                'location' => 'Jakarta',
                'price' => 'Sewa: Rp 2.000.000 / hari',
                'image' => 'images/vendors/Transport/download.jpg',
                'rating' => 4.6,
                'about' => 'Menyediakan mobil pengantin klasik dan mewah untuk momen sekali seumur hidup.',
                'features' => ['Driver Profesional', 'Dekorasi Mobil', 'BBM Termasuk'],
                'categories' => $defaultCategories,
                'testimonials' => $defaultTestimonials,
            ],
        ];

        foreach ($vendors as $vendor) {
            Vendor::create($vendor);
        }
    }
}
