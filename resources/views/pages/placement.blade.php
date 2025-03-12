@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/placement.css">
<link rel="stylesheet" href="/css/main.css">
@endsection
@section('title') Размещение @endsection
@section('main_content')
    @include('block.header', [
        'active' => 1,
        'phone' => '8 (800) 600-93-44',
        'telegram' => 'https://t.me/Pavlovskij_Park',
        'vk' => 'https://vk.com/club23119361',
    ])
    <div class="reservation">
        <span>Поиск свободных номеров</span>
    </div>
    <div class="card-placement">
        @include('element.card', [
            'img' => '/img/rooms/standart.png',
            'name' => 'Стандарт',
            'square' => '22',
            'capasity' => '2',
            'text' => 'Однокомнатный номер с возможностью размещения +1 человека (за доплату). Всего 59 номеров, расположенных на 1-3 этажах.',
            'link' => ''
        ])
        @include('element.card', [
            'img' => '/img/rooms/lux.png',
            'name' => 'Люкс',
            'square' => '60',
            'capasity' => '4-6',
            'text' => 'Номер включает 2 спальни, гостиную, ванную с подогревом полов и кладовую. Всего 4 номера.',
            'link' => ''
        ])
        @include('element.card', [
            'img' => '/img/rooms/best-lux.png',
            'name' => 'Люкс плюс',
            'square' => '60',
            'capasity' => '4-6',
            'text' => 'Трехкомнатный номер: гостиная, 2 спальни, ванная с подогревом полов и туалетная комната. Всего 2 номера на 3 этаже.',
            'link' => ''
        ])
    </div>

    @include('block.footer', [
        'phone' => '8 (800) 600-93-44',
        'telegram' => 'https://t.me/Pavlovskij_Park',
        'vk' => 'https://vk.com/club23119361',
        'email' => 'pavlovpark@yandex.ru',
        'address' => 'г. Уфа, ул. Российская, 98/2'
    ])

@endsection
