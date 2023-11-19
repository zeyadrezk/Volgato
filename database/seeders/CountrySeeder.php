<?php

namespace Database\Seeders;

use App\Models\country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    country::create([
		    'name' => fake()->country,
	    ]);  country::create([
		    'name' => fake()->country,
	    ]);  country::create([
		    'name' => fake()->country,
	    ]);
		
    }
}
