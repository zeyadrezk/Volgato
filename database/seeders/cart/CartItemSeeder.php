<?php

namespace Database\Seeders\cart;

use App\Models\cart\CartItem;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    CartItem::factory()->count(5)->create();
	    
    }
	
	
	
}
