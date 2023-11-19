<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductTrans>
 */
class ProductTransFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'product_id'=> 1,
	        'name'=>fake()->name,
	        'description'=>fake()->text,
	        'short_description'=>fake()->text,
	        'quantity'=>10,
	        'lang'=>'en',
        ];
    }
}
