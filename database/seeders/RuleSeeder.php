<?php

namespace Database\Seeders;

use App\Models\Paragraph;
use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0;$i<10;$i++){
            $events = Rule::factory()->create();

            Paragraph::factory(5)->create([
                'parent_id' => $events->id,
                'table'=>'rules'
            ]);
        }
    }
}
