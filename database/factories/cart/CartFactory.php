<?php

namespace Database\Factories\cart;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cart\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'user_id'=>fake()->unique()->biasedNumberBetween(1,5),
	        'total'=>500,
        ];
    }
}
