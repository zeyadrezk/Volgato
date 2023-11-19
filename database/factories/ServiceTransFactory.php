<?php

namespace Database\Factories;

use App\Models\ServiceTrans;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceTransFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
		        'service_id'=> 1,
		        'name'=>fake()->name,
		        'description'=>fake()->text,
		        'short_description'=>fake()->text,
		        'lang'=>'en',
	        
        ];
    }
}
