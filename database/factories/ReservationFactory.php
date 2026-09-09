<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    public function definition(): array
    {
        $checkIn = $this->faker->dateTimeBetween('+1 week', '+2 weeks');

        return [
            'check_in_date' => $checkIn,
            'check_out_date' => (clone $checkIn)->modify('+'.random_int(1, 5).' days'),
            'total_guests' => $this->faker->numberBetween(1, 4),
            'total_price' => $this->faker->randomFloat(2, 100, 2000),
            'status' => 'pending',
            'payment_status' => 'waiting_confirmation',
        ];
    }
}
