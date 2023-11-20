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
	        'oldprice'=>fake()->randomNumber(3),
	        'name'=>['en'=>fake()->name,'ar'=>fake()->name],
	        'image'=>fake()->image,
	        'description'=>['en'=>fake()->text,'ar'=>fake()->text],
	        'details'=>['en'=>fake()->text,'ar'=>fake()->text],
	        'short_description'=>['en'=>fake()->text,'ar'=>fake()->text],
	        'quantity'=>10,
	        'country_id'=>fake()->biasedNumberBetween(1,3),
	        'category_id'=>fake()->biasedNumberBetween(1,2),
        
        ];
    }
}
