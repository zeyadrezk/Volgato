<?php

namespace Database\Seeders\product;

use App\Models\product\FavouriteProduct;
use Illuminate\Database\Seeder;

class FavouriteProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    FavouriteProduct::factory()->count(5)->create();
    }
}
