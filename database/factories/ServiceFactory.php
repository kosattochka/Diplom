<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
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
            'title' => $title,
            'alias' => $alias,
            'description' => $this->faker->text(),
            'parent_id' => null,
            'page_description' => $this->faker->sentence(12),
            'page_heading' => $this->faker->sentence(),
            'table_price' => '',
            'page_text' => $this->faker->text(),
        ];
    }

    protected function generateUniqueAlias(string $alias, int $attempt = 0): string
    {
        $newAlias = $alias;

        while (Service::where('alias', $newAlias)->exists()) {
            $attempt++;
            $newAlias = $alias . $attempt;
        }

        return $newAlias;
    }
}
