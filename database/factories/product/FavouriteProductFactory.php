<?php

namespace Database\Factories\product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product\FavouriteProduct>
 */
class FavouriteProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'user_id'=>fake()->biasedNumberBetween(1,5),
	        'product_id'=>fake()->biasedNumberBetween(1,5),
        ];
    }
}
