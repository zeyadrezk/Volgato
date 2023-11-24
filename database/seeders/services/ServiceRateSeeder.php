<?php

namespace Database\Seeders\services;

use App\Models\services\ServiceRate;
use Illuminate\Database\Seeder;

class ServiceRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    ServiceRate::factory()->count(5)->create();
	    
    }
}
