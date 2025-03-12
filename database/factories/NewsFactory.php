<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->word();
        $alias = $this->generateUniqueAlias(Str::slug($title));
        return [
            'title' => $title,
            'alias' => $alias,
            'img' => $this->randomImg(),
            'short_description' => $this->faker->text(),
            'date' => $this->faker->date
        ];
    }

    protected function generateUniqueAlias(string $alias): string
    {
        $attempt = 0;
        $newAlias = $alias;

        while (News::where('alias', $newAlias)->exists()) {
            $attempt++;
            $newAlias = '' . $alias . $attempt;
        }
        if (News::where('alias', $newAlias)->exists())
            dd($newAlias, $attempt);

        return $newAlias;
    }

    protected function randomImg(): string
    {
        $path = [
            'image2.png',
        ];

        return '/img/news/' . $path[array_rand($path)];
    }
}
