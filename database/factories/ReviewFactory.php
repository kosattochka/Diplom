<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = ['Яндекс', '2gis'];
        return [
            'services' => $services[array_rand($services)],
            'name' => $this->faker->name,
            'text' => $this->faker->text,
            'date' => $this->faker->date,
            'stars' => $this->faker->numberBetween(1,5),
        ];
    }
}
