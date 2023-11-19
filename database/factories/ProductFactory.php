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
	        'price'=>fake()->randomNumber(3),
	        'category_id'=>fake()->biasedNumberBetween(1,2),
	        'country_id'=>fake()->biasedNumberBetween(1,3),
        
        ];
    }
}
