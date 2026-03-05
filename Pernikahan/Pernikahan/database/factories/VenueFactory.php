<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venue>
 */
class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['gedung', 'taman', 'resort', 'pulau'];
        $category = $this->faker->randomElement($categories);
        
        $galleries = [
            'gedung' => [
                '/images/venues/Ballroom/Aula-Masjid-Manarul-Aman.webp',
                '/images/venues/Ballroom/Balai-Kartini.webp',
                '/images/venues/Ballroom/Balai-Samudera-Kelapa-Gading-Jakarta-Utara.webp',
                '/images/venues/Ballroom/Gedung Sampoerna Strategic Square.jpg',
                '/images/venues/Ballroom/Gedung-Aneka-Bhakti.webp',
                '/images/venues/Ballroom/Graha-Pondok-Pinang-Lebak-Bulus.webp',
                '/images/venues/Ballroom/Grand-Ballroom-LIPI-Kuningan-Barat-Jakarta-Selatan.webp',
                '/images/venues/Ballroom/Lippo-Kuningan-Grand-Ballroom.webp',
                '/images/venues/Ballroom/Pati-Unus-Hall.webp',
                '/images/venues/Ballroom/Smesco-Convention-Hall.webp',
            ],
            'taman' => [
                '/images/venues/Taman/Bumi Samami.webp',
                '/images/venues/Taman/Gunung Pancar.webp',
                '/images/venues/Taman/Taman Langsat.webp',
            ],
            'resort' => [
                '/images/venues/Resort/Hotel Ciputra world Surabaya.jpg',
                '/images/venues/Resort/Hotel Dafam Semarang.jpg',
                '/images/venues/Resort/Hotel Neo Candi Semarang.jpg',
                '/images/venues/Resort/Patra Semarang Hotel & Convention.jpg',
                '/images/venues/Resort/Pesonna Hotel Semarang.jpg',
            ],
            'pulau' => [
                '/images/venues/Pulau/Merusaka Nusa Dua.jpg',
                '/images/venues/Pulau/Renaissance Bali Nusa Dua.jpg',
                '/images/venues/Pulau/Samabe Bali Suites and Villa.jpg',
                '/images/venues/Pulau/Sofitel Bali Nusa Dua Beach Resort.jpg',
                '/images/venues/Pulau/The Westin Resort Nusa Dua, Bali.jpg',
            ],
        ];

        $image = $this->faker->randomElement($galleries[$category]);

        return [
            'name' => $this->faker->company() . ' Wedding Hall',
            'owner' => $this->faker->name(),
            'location' => $this->faker->city(),
            'price' => 'IDR ' . number_format($this->faker->numberBetween(5, 50), 0, ',', '.') . '.000.000 / Malam',
            'image' => $image,
            'gallery' => array_values(array_unique(array_merge([$image], $galleries[$category]))),
            'about' => $this->faker->paragraph(),
            'features' => 'Kapasitas besar, parkir luas, AC, ruang rias.',
            'category' => $category,
        ];
    }
}
