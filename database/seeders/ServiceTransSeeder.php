<?php

namespace Database\Seeders;

use App\Models\ServiceTrans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceTransSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    ServiceTrans::factory()->count(10)->create();
	    
    }
}
