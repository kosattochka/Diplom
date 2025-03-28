<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
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
            'description' => $this->faker->text,
            'imgs' => json_encode(array_fill(0, 8, $this->randomImg()))
        ];
    }

    protected function generateUniqueAlias(string $alias): string
    {
        $attempt = 0;
        $newAlias = $alias;

        while (Album::where('alias', $newAlias)->exists()) {
            $attempt++;
            $newAlias = '' . $alias . $attempt;
        }

        return $newAlias;
    }

    protected function randomImg(): string
    {
        $path = [
            'Group80(1).png',
            'Group80(2).png',
            'Group80.png',
            'image(1).png',
            'image(2).png',
            'image(3).png',
            'image(4).png',
            'image(5).png',
            'image7.png',
            'image.png',
        ];

        return '/img/albums/' . $path[array_rand($path)];
    }
}
