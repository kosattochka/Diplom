<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Carbon::now()->addDays(rand(1, 30));
        $endDate = Carbon::now()->addDays(rand(31, 35));

        return [
            'room_id' => Room::query()->inRandomOrder()->first()->id,
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $this->faker->randomElement(['new', 'confirmed', 'cancelled', 'completed']),
            'guests' => $this->faker->numberBetween(1, 4),
            'child' => $this->faker->numberBetween(0, 2),
        ];
    }
}
