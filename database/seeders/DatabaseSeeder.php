<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\cart\CartItemSeeder;
use Database\Seeders\cart\CartSeeder;
use Database\Seeders\order\OrderItemsSeeder;
use Database\Seeders\order\OrderSeeder;
use Database\Seeders\product\FavouriteProductSeeder;
use Database\Seeders\product\ProductFeatureSeeder;
use Database\Seeders\product\ProductRateSeeder;
use Database\Seeders\product\ProductSeeder;
use Database\Seeders\services\ServiceRateSeeder;
use Database\Seeders\services\ServiceSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
//	    category::create([
//		    'name' => fake()->name,
//		    'image'=>public_path('images/categories/2.jpg'),
//	    ]);
//	    category::create([
//		    'name' => fake()->name,
//		    'image'=>public_path('images/categories/1.jpg'),
//
//	    ]);
	    
	    $this->call([
		    CountrySeeder::class,
		    CategorySeeder::class,
		    ServiceSeeder::class,
		    ProductSeeder::class,
		    ProductRateSeeder::class,
		    ServiceRateSeeder::class,
		    CartSeeder::class,
		    CartItemSeeder::class,
		    ProductFeatureSeeder::class,
		    FavouriteProductSeeder::class,
		    OrderSeeder::class,
		    OrderItemsSeeder::class,
	    
	    
	    
	    ]);
    }
}
