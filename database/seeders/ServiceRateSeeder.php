<?php

namespace Database\Seeders;

use App\Models\ServiceRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
