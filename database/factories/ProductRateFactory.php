<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductRate>
 */
class ProductRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'user_id'=>1,
	        'productEvluation'=>['ar'=>fake()->name,'en'=>fake()->name],
	        'comment'=>fake()->name,
	        'rate'=>fake()->biasedNumberBetween(1,5),
	        'commentDate'=>fake()->date(),
	        
        ];
    }
}
