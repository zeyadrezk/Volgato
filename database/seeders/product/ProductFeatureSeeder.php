<?php

namespace Database\Seeders\product;

use App\Models\product\ProductFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    ProductFeature::factory()->count(5)->create();
	    
    }
}
