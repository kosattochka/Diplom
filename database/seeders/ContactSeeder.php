<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'vk' => 'https://vk.com/club23119361',
                'telegram' => 'https://t.me/Pavlovskij_Park',
                'phone' => '8 (800) 600-93-44',
                'email' => 'pavlovpark@yandex.ru',
                'address_office' => 'г. Уфа, ул. Российская, 98/2',
                'address_place' => 'Республика Башкортостан, Нуримановский район, 7 км от села Павловка.',
                'mail_index' => '450098',
                'operator' => '+7 (987) 621-27-25',
                'map_scripts' => '<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5e2f44b91ee6834a73840f8ee312ec5b03ae9cc448c6e8ce06843e74654de0e1&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>',
                'vis' => 1
            ]
        ]);
    }
}
