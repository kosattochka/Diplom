@extends('block.pattern')

@section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/new.css">
    @endsection

@section('title') Новости Павловского парка @endsection

@section('main_content')
    @include('block.header', [
        'active' => 5,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
    ])

    <div class="new-wrapper">
        @include('element.new-card', [
            'img' => '/img/news/image2.png',
            'date' => '27.12.25',
            'title' => 'ИДЕАЛЬНЫЙ ЗИМНИЙ УИКЕНД',
            'text' => 'Зима — время для снежных пейзажей, активного отдыха и уютных вечеров у камина. Как совместить спорт, отдых и комфорт?',
            'link' => ''
        ])
        <hr>
    </div>
    @include('element.paginate', [
        'id'=>"page",
        'field'=>"page",
        'list'=>[
            'Первая'=>"Первая",
            '2024'=>2024,
            '2023'=>2023,
            '2022'=>2022,
            'Последняя'=>'Последняя',
        ]
    ])
    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])

@endsection
