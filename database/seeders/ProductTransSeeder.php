<?php

namespace Database\Seeders;

use App\Models\ProductTrans;
use App\Models\ServiceTrans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    ProductTrans::factory()->count(10)->create();
	    
    }
}
