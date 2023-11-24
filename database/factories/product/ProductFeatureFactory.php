<?php

namespace Database\Factories\product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product\ProductFeature>
 */
class ProductFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'name'=>fake()->name,
	        'image'=>'images/products/1.jpg',
	        'product_id'=>fake()->biasedNumberBetween(1,5),
        
        ];
    }
}
