<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\country;
use App\Models\ServiceTrans;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

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
		    ServiceTransSeeder::class,
		    ProductSeeder::class,
		    ProductTransSeeder::class,
	    ]);
    }
}
