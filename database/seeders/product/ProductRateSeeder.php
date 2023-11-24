<?php

namespace Database\Seeders\product;

use App\Models\product\ProductRate;
use Illuminate\Database\Seeder;

class ProductRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    ProductRate::factory()->count(5)->create();
	    
    }
}
