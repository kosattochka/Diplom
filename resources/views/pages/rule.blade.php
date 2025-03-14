@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('title') Правила Павловского парка @endsection
@section('main_content')
    @include('block.header', [
        'active' => 3,
        'phone' => '8 (800) 600-93-44',
        'telegram' => 'https://t.me/Pavlovskij_Park',
        'vk' => 'https://vk.com/club23119361',
    ])

<div class="service-container">
    @include( 'element.card', [
        'img' => '/img/rules/image(10).png',
        'name' => 'Режим',
        'text' => 'Время заезда в гостиничный комплекс – 15.00 часов текущих суток по местному времени. Выезд до 12.00 часов.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(1).png',
        'name' => 'Бронирование',
        'text' => 'При негарантированном бронировании не вносится предоплата. Гарантированное бронирование предусматривает предоплату.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(2).png',
        'name' => 'Возвраст',
        'text' => 'Перечень необходимых документов варьируется в зависимости от вида произведенной оплаты.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(3).png',
        'name' => 'Питомцы',
        'text' => 'Проживание с домашними животными необходимо согласовывать с администрацией.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(4).png',
        'name' => 'Тюбинг',
        'text' => 'Прокат снаряжения, использования трассы для тюбинга и другое.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(5).png',
        'name' => 'Правила нахождения',
        'text' => 'Гости Круглогодичного центра отдыха обязаны соблюдать и поддерживать общественный порядок и общепринятые нормы поведения...',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(6).png',
        'name' => 'Ски-пассы',
        'text' => 'Правила приобретения и условия использования ски-пассов.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(7).png',
        'name' => 'Инструктор',
        'text' => 'Услугами инструктора по горным лыжам и сноуборду может воспользоваться любой посетитель.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(8).png',
        'name' => 'Бугельный подъёмник',
        'text' => 'Буксировочная канатная дорога предназначена для перевозки лыжников и сноубордистов.Мы оказываем помощь в организации официальных мероприятий – презентаций, семинаров, конференций, корпоративов.',
        'link' => ''
    ])
    @include( 'element.card', [
        'img' => '/img/rules/image(9).png',
        'name' => 'Прокат снаряжения',
        'text' => 'Правила проката горнолыжного оборудования и прочего снаряжения.',
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
