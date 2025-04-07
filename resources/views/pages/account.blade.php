@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/account.css">
<link rel="stylesheet" href="/css/main.css">
@endsection
@section('title') Размещение @endsection
@section('main_content')
    @include('block.header', [
        'active' => 12,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'user' => $user,
    ])

    <div class="six"><p><span><img src="/img/account-bronirov.svg" alt="">Мои бронирования</span></p></div>
    <div class="book-card">
        <div>
            <img src="/img/rooms/standart.png" alt="">
        </div>
        <div>
            <div class="row">
                <figure></figure>
                <span></span>
            </div>
            <h1>Номер "Люкс"</h1>
            <div class="row">
                <span class="text-yellow">Заезд: <span>18.12.24</span></span>
                <span class="text-yellow">Выезд: <span>21.12.24</span></span>
            </div>
            <span>11 000 р/ сутки </span>
            <span class="text-yellow">Дата бронирования: <span>08.12.24</span></span>
            <span class="text-yellow">Оплата: <span>44 000 р </span></span>
        </div>
    </div>
    <hr>

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])

@endsection


