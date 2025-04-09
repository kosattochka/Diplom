@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/account.css">
<link rel="stylesheet" href="/css/main.css">
@endsection
@section('title')Личный кабинет@endsection
@section('main_content')
    @include('block.header', [
        'active' => 12,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'user' => $user,
    ])

    <div class="six"><p><span><img src="/img/account-bronirov.svg" alt="">Мои бронирования</span></p></div>

    @foreach($reservations as $card)
        <div class="book-card">
            <div>
                <img src="{{$card->img}}" alt="">
            </div>
            <div>
                <div class="row">
                    <figure></figure>
                    <span></span>
                </div>
                <h1>{{$card->title}}</h1>
                <div class="row">
                    <span class="text-yellow">Заезд: <span>{{$card->start_date}}</span></span>
                    <span class="text-yellow">Выезд: <span>{{$card->end_date}}</span></span>
                </div>
                <span>{{$card->price}} р/ сутки </span>
                <span class="text-yellow">Дата бронирования: <span>{{$card->created_at}}</span></span>
                <span class="text-yellow">Оплата: <span>{{$card->score}} р </span></span>
            </div>
        </div>
        <hr>
    @endforeach

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])

@endsection


