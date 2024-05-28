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
            'book_code' => $this->faker->isbn10(),
            'title' => $this->faker->word(),
            'author' => fake()->name(),
            'stock' => mt_rand(1, 10),
            'status' => 'in stock',
        ];
    }
}
