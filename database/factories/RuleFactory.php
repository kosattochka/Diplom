<?php

namespace Database\Factories;

use App\Models\Rule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rule>
 */
class RuleFactory extends Factory
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
            'title'=> $title,
            'alias' => $alias,
            'img' => $this->faker->imageUrl(496,318),
            'short_description'=>$this->faker->sentence(12),
            'page_description'=> $this->faker->text(),
        ];
    }

    protected function generateUniqueAlias(string $alias, int $attempt = 0): string
    {
        $newAlias = $alias;

        while (Rule::where('alias', $newAlias)->exists()) {
            $attempt++;
            $newAlias = $alias . $attempt;
        }

        return $newAlias;
    }
}
