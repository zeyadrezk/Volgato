<?php

namespace Database\Seeders;

use App\Models\ProductRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
