<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rooms')->insert([
            [
                'title' => 'Стандарт',
                'alias' => 'standart',
                'imgs' => json_encode(['/img/rooms/standart.png', '/img/rooms/standart.png', '/img/rooms/standart.png', '/img/rooms/standart.png', '/img/rooms/standart.png']),
                'description' => 'Однокомнатный номер с возможностью размещения +1 человека (за доплату). Всего 59 номеров, расположенных на 1-3 этажах.',
                'square' => 22,
                'capacity' => '2',
                'price' => 5100,
                'price_extra_space' => 1700,
            ],
            [
                'title' => 'Люкс',
                'alias' => 'luks',
                'imgs' => json_encode(['/img/rooms/lux.png', '/img/rooms/lux.png', '/img/rooms/lux.png', '/img/rooms/lux.png', '/img/rooms/lux.png']),
                'description' => 'Номер включает 2 спальни, гостиную, ванную с подогревом полов и кладовую. Всего 4 номера.',
                'square' => 60,
                'capacity' => '4-6',
                'price' => 5100,
                'price_extra_space' => 1700,
            ],
            [
                'title' => 'Люкс плюс',
                'alias' => 'luks-plus',
                'imgs' => json_encode(['/img/rooms/best-lux.png', '/img/rooms/best-lux.png', '/img/rooms/best-lux.png', '/img/rooms/best-lux.png', '/img/rooms/best-lux.png']),
                'description' => 'Трехкомнатный номер: гостиная, 2 спальни, ванная с подогревом полов и туалетная комната. Всего 2 номера на 3 этаже.',
                'square' => 60,
                'capacity' => '4-6',
                'price' => 5100,
                'price_extra_space' => 1700,
            ],
        ]);

        DB::table('paragraphs')->insert([
            [
                'parent_id' => 1,
                'table' => 'rooms',
                'title' => 'ОПИСАНИЕ НОМЕРА',
                'text' => 'Стандарт - однокомнатный номер общей площадью 22 кв.м со всеми удобствами. В номере 2 основных места, возможно размещение одного дополнительного человека (при оплате дополнительного места). Номера расположены на первом, втором и третьем этаже. Всего 59 номеров.<br/><br/>В номере:  <br/>- 2 односпальные кровати,  2 тумбы, 2 пуфика, диван <br/>- Шкаф-купе, журнальный стол, телевизор  <br/>- Холодильник, чайник, чайная пара, полотенца'
            ],
            [
                'parent_id' => 2,
                'table' => 'rooms',
                'title' => 'ОПИСАНИЕ НОМЕРА',
                'text' => 'Стандарт - однокомнатный номер общей площадью 22 кв.м со всеми удобствами. В номере 2 основных места, возможно размещение одного дополнительного человека (при оплате дополнительного места). Номера расположены на первом, втором и третьем этаже. Всего 59 номеров.<br/><br/>В номере:  <br/>- 2 односпальные кровати,  2 тумбы, 2 пуфика, диван <br/>- Шкаф-купе, журнальный стол, телевизор  <br/>- Холодильник, чайник, чайная пара, полотенца'
            ],
            [
                'parent_id' => 3,
                'table' => 'rooms',
                'title' => 'ОПИСАНИЕ НОМЕРА',
                'text' => 'Стандарт - однокомнатный номер общей площадью 22 кв.м со всеми удобствами. В номере 2 основных места, возможно размещение одного дополнительного человека (при оплате дополнительного места). Номера расположены на первом, втором и третьем этаже. Всего 59 номеров.<br/><br/>В номере:  <br/>- 2 односпальные кровати,  2 тумбы, 2 пуфика, диван <br/>- Шкаф-купе, журнальный стол, телевизор  <br/>- Холодильник, чайник, чайная пара, полотенца'
            ],
        ]);
    }
}
