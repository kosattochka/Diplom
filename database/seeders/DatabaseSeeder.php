<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Album;
use App\Models\Event;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(NewsSeeder::class);
        Review::factory(50)->create();
        $this->call(RuleSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ReservationSeeder::class);
    }
}
