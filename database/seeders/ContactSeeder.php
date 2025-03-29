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
                'map' => '<div style="position:relative;overflow:hidden;display:flex;justify-content:center;"><a href="https://yandex.ru/maps/172/ufa/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Уфа</a><a href="https://yandex.ru/maps/172/ufa/?from=mapframe&ll=56.028532%2C54.770634&mode=usermaps&source=mapframe&um=constructor%3ALJ7wHQK_l4qaRS3VG-PyEeT-QhVv8N7o&utm_medium=mapframe&utm_source=maps&z=16" style="color:#eee;font-size:12px;position:absolute;top:14px;border-radius:48px;border:3px solid #0d504d;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=56.028532%2C54.770634&mode=usermaps&source=mapframe&um=constructor%3ALJ7wHQK_l4qaRS3VG-PyEeT-QhVv8N7o&utm_source=mapframe&z=16" width="1330" height="600" frameborder="1" allowfullscreen="true" style="position:relative;border-radius:48px;border:5px solid #0d504d;"></iframe></div>',
                'map_route' => '<div style="position:relative;overflow:hidden;display:flex;justify-content:center;"><a href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a><a href="https://yandex.ru/maps/?from=mapframe&ll=56.450550%2C55.113268&mode=usermaps&source=mapframe&um=constructor%3A406970c28ecca9b127b75748359efb861956a3d8dbdce0cb0af8eded1cfe5eca&utm_medium=mapframe&utm_source=maps&z=9" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=56.450550%2C55.113268&mode=usermaps&source=mapframe&um=constructor%3A406970c28ecca9b127b75748359efb861956a3d8dbdce0cb0af8eded1cfe5eca&utm_source=mapframe&z=9" width="1330" height="600" frameborder="1" allowfullscreen="true" style="position:relative;border-radius:48px;border:5px solid #0d504d;"></iframe></div>',
                'vis' => 1
            ]
        ]);
    }
}
