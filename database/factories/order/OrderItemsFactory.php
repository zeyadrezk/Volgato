<?php

namespace Database\Factories\order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'order_id'=>fake()->biasedNumberBetween(1,3),
	        'product_id'=>fake()->biasedNumberBetween(1,5),
	        'quantity'=>fake()->biasedNumberBetween(1,5),
        
        ];
    }
}
