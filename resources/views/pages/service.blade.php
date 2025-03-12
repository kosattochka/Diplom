@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/service.css">
@endsection
@section('title') Услуги @endsection
@section('main_content')
    @include('block.header', [
        'active' => 2,
        'phone' => '8 (800) 600-93-44',
        'telegram' => 'https://t.me/Pavlovskij_Park',
        'vk' => 'https://vk.com/club23119361',
    ])

    <div class="service-container">
        @include( 'element.card', [
            'img' => '/img/winter-service.svg',
            'name' => 'Зимние',
            'text' => 'Площадки для катания на коньках и увлекательные тюбинговые трассы не дадут заскучать.',
            'link' => ''
        ])
        @include( 'element.card', [
            'img' => '/img/sauna-service.svg',
            'name' => 'Сауна',
            'text' => 'Сауна способна снять усталость и восстановить силы после катания на горнолыжной трассе или длительных летних прогулок.',
            'link' => ''
        ])
        @include( 'element.card', [
            'img' => '/img/bbq-service.svg',
            'name' => 'Зона барбекю',
            'text' => 'Отлично благоустроенная зона для самостоятельной жарки шашлыков, барбекю. Специально для наших гостей!',
            'link' => ''
        ])
        @include( 'element.card', [
            'img' => '/img/game-service.svg',
            'name' => 'Аэрохоккей',
            'text' => 'Если вы любите захватывающие и динамичные игры, то аэрохоккей однозначно придется вам по вкусу',
            'link' => ''
        ])
        @include( 'element.card', [
            'img' => '/img/wedding-service.svg',
            'name' => 'Коттедж на свадьбу',
            'text' => 'Свадьба в «Павловском Парке» – это великолепный и незабываемый праздник в очень красивом месте.',
            'link' => ''
        ])
        @include( 'element.card', [
            'img' => '/img/turism-service.svg',
            'name' => 'Деловой теризм',
            'text' => 'Мы оказываем помощь в организации официальных мероприятий – презентаций, семинаров, конференций, корпоративов.',
            'link' => ''
        ])
        @include( 'element.card', [
            'img' => '/img/hotel-service.svg',
            'name' => 'Снять гостиницу',
            'text' => 'Поселившись в «Павловский Парк», вы можете не переживать за удобство и комфорт размещения.',
            'link' => ''
        ])
        @include( 'element.card', [
            'img' => '/img/summer-service.svg',
            'name' => 'Летние',
            'text' => 'Отдыхая у нас, вам не придется ни о чем беспокоиться – можно отправляться налегке и отдыхать на природе.',
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
