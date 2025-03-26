@extends('block.pattern')

@section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/service.css">
    @endsection

@section('title') Галерея Павловского парка @endsection

@section('main_content')
    @include('block.header', [
        'active' => 6,
        'phone' => '8 (800) 600-93-44',
        'telegram' => 'https://t.me/Pavlovskij_Park',
        'vk' => 'https://vk.com/club23119361',
    ])


@endsection
