<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'desc'=> fake()->sentence(),//$this->faker->randomNumber(5)
            'newPrice'=>fake()->randomNumber(5),
            'oldPrice'=>fake()->randomNumber(5),
            'offerNotic'=> fake()->sentence(),
            'user_id'=>1,
            'category_id'=>1

        ];
    }
}
