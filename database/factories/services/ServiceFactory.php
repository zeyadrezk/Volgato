<?php

namespace Database\Factories\services;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\services\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'name'=>['en'=>fake()->name,'ar'=>fake()->name],
	        'price'=>fake()->randomNumber(3),
	        'oldprice'=>fake()->randomNumber(3),
	        'price'=>fake()->randomNumber(3),
	        'image'=>'images/products/1.jpg',
	        'details'=>['en'=>fake()->text,'ar'=>fake()->text],
	        'description'=>['en'=>fake()->text,'ar'=>fake()->text],
	        'short_description'=>['en'=>fake()->text,'ar'=>fake()->text],
	        'total_rate'=>fake()->biasedNumberBetween(1,5),
	        'country_id'=>fake()->biasedNumberBetween(1,3),
	        'duration'=>fake()->biasedNumberBetween(1,3),
        ];
    }
}
