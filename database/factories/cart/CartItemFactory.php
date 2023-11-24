<?php

namespace Database\Factories\cart;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cart\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'cart_id'=>fake()->biasedNumberBetween(1,3),
	        'product_id'=>fake()->biasedNumberBetween(1,5),
	        'quantity'=>fake()->biasedNumberBetween(1,5),
        ];
    }
}
