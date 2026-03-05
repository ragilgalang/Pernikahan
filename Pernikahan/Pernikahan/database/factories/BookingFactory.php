<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Venue;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $itemType = $this->faker->randomElement(['Venue', 'Vendor']);
        $itemId = ($itemType === 'Venue') 
            ? Venue::inRandomOrder()->first()->id ?? 1 
            : Vendor::inRandomOrder()->first()->id ?? 1;

        $status = $this->faker->randomElement(['Pending', 'Confirmed', 'Cancelled', 'Completed']);

        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'item_type' => $itemType,
            'item_id' => $itemId,
            'status' => $status,
            'total_price' => 'Rp ' . number_format($this->faker->numberBetween(1, 50) * 1000000, 0, ',', '.'),
            'booking_details' => [
                'event_date' => $this->faker->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
                'notes' => $this->faker->sentence(),
                'guest_count' => $this->faker->numberBetween(50, 1000),
            ],
        ];
    }
}
