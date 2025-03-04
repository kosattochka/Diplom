<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Paragraph;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<10;$i++){
            $events = News::factory()->create();

            Paragraph::factory(3)->create([
                'parent_id' => $events->id,
                'table'=>'news'
            ]);
        }
    }
}
