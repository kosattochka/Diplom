<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Paragraph;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 45; $i++) {
            $events = Event::factory()->create();

            Paragraph::factory(3)->create([
                'parent_id' => $events->id,
                'table' => 'events'
            ]);
        }
    }
}
