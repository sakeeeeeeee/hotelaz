<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Room '.$this->faker->unique()->numberBetween(100, 999),
            'room_number' => 'RM'.$this->faker->unique()->numberBetween(100, 999),
            'type' => $this->faker->randomElement(['standard', 'deluxe', 'suite']),
            'description' => $this->faker->paragraph(),
            'price_per_night' => $this->faker->randomFloat(2, 50, 500),
            'capacity' => $this->faker->numberBetween(1, 4),
            'features' => ['wifi', 'ac', 'tv'],
            'status' => 'available',
            'quantity' => 2,
        ];
    }
}
