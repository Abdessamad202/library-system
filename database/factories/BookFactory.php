<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'description' => $this->faker->text(),
            'date_edition' => $this->faker->date(),
            'image' => "storage/books/".$this->faker->numberBetween(1, 10).".jpg",
            'category_id' => $this->faker->numberBetween(1, 3),
            'stock' => $this->faker->numberBetween(1, 4),
            //
        ];
    }
}
