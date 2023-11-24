<?php

namespace Database\Seeders\services;

use App\Models\services\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    Service::factory()->count(5)->create();
	    
    }
}
