<?php

namespace Database\Factories\product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
	        'name' => ['en'=>fake()->name,'ar'=>fake()->name],
	        'image'=>'images/products/2.jpg',
        
        ];
    }
}
