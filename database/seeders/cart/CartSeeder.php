<?php

namespace Database\Seeders\cart;

use App\Models\cart\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    Cart::factory()->count(3)->create();
	    
    }
}
