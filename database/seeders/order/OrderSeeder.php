<?php

namespace Database\Seeders\order;

use App\Models\order\order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    order::factory()->count(5)->create();
	    
    }
}
