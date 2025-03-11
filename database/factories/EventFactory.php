<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        $alias = $this->generateUniqueAlias(Str::slug($title));
        return [
            'img' => $this->faker->imageUrl(496, 318),
            'title' => $title,
            'alias' => $alias,
            'slogan' => $this->faker->sentence,
            'short_description' => $this->faker->sentence(12),
            'description' => $this->faker->text(),
            'detailed' => $this->faker->text(),
            'limit_date' => $this->faker->date(),
            'active' => $this->faker->boolean,
            'vis' => 1
        ];
    }

    protected function generateUniqueAlias(string $alias, int $attempt = 0): string
    {
        $newAlias = $alias;

        while (Event::where('alias', $newAlias)->exists()) {
            $attempt++;
            $newAlias = $alias . $attempt;
        }

        return $newAlias;
    }
}
