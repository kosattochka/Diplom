<?php

namespace Database\Seeders;

use App\Models\Paragraph;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++)
            Reservation::factory()->create();
    }
}
