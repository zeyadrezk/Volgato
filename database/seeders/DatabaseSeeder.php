<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
	    category::create([
		    'name' => fake()->name,
	    ]);
	    category::create([
		    'name' => fake()->name,
	    ]);
	    
	    $this->call([
		    CountrySeeder::class,
		    ServiceSeeder::class,
		    ProductSeeder::class,
		    ProductRateSeeder::class,
	    ]);
    }
}
