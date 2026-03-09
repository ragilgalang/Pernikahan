<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['katering', 'dekorasi', 'mua', 'busana', 'dokumentasi', 'hiburan', 'undangan', 'kue', 'cincin', 'transport'];
        $type = $this->faker->randomElement($types);
        
        $defaultCategories = [
            'katering' => ['name' => 'Katering', 'image' => 'images/vendors/Cathering/Contoh-menu-catering-wedding-nusantara.jpg'],
            'dekorasi' => ['name' => 'Dekorasi', 'image' => 'images/vendors/Dekorasi/20250206-023529_dekorasi-pastelwebp.webp'],
            'mua' => ['name' => 'MUA & Hair', 'image' => 'images/vendors/MUA & Hair/makeup-artist.jpg'],
            'busana' => ['name' => 'Busana', 'image' => 'images/vendors/Busana/baju-wedding-modern-dengan-aksen-kebaya.jpg'],
            'dokumentasi' => ['name' => 'Dokumentasi', 'image' => 'images/vendors/Dokumentasi/download (2).jpg'],
            'hiburan' => ['name' => 'Hiburan', 'image' => 'images/vendors/Hiburan/e88073c1bb9c7105b54c615a3e3f95f500826f1b.webp'],
            'undangan' => ['name' => 'Undangan', 'image' => 'images/vendors/Undangan/contoh-undangan-pernikahan-simple-dan-elegan-25.png'],
            'kue' => ['name' => 'Kue', 'image' => 'images/vendors/Kue/ea2f0a986fc0ac9f7b5f39e93ceb86c45125fcdc.webp'],
            'cincin' => ['name' => 'Cincin', 'image' => 'images/vendors/Cincin/Cincin-Kawin.jpg'],
            'transport' => ['name' => 'Transport', 'image' => 'images/vendors/Transport/download.jpg'],
        ];

        $image = $defaultCategories[$type]['image'] ?? 'images/vendors/Dekorasi/20250206-023529_dekorasi-rusticwebp.webp';

        return [
            'name' => $this->faker->company() . ' ' . ucfirst($type),
            'owner' => $this->faker->name(),
            'location' => $this->faker->city(),
            'price' => 'Mulai dari Rp ' . number_format($this->faker->numberBetween(1, 20) * 1000000, 0, ',', '.'),
            'image' => $image,
            'rating' => $this->faker->randomFloat(1, 4, 5),
            'type' => $type,
            'about' => $this->faker->paragraph(),
            'features' => ['Layanan Profesional', 'Kualitas HQ', 'Diskon Spesial'],
            'categories' => array_values($defaultCategories),
            'testimonials' => [
                ['text' => $this->faker->sentence(), 'author' => $this->faker->name()],
                ['text' => $this->faker->sentence(), 'author' => $this->faker->name()],
            ],
        ];
    }
}
