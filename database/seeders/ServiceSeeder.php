<?php

namespace Database\Seeders;

use App\Models\country;
use App\Models\service;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		service::factory()->count(10)->create();
    }
}
