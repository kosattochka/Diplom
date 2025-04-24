<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++)
            Service::factory()->create();

        $id = Service::inRandomOrder()->first()->id;
        for ($i = 0; $i < 5; $i++) {
            Service::factory()->create(['parent_id' => $id]);
        }
    }
}
