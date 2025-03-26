@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('title') Акции Павловского парка @endsection
@section('main_content')
    @include('block.header', [
        'active' => 4,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
    ])

    <div class="event-card">
        <div>
            <img src="/img/events/Group82.png" alt="">
        </div>
        <div>
            <p>Подарочный сертификат</p>
            <figure></figure>
            <span>Теперь у Вас есть возможность круглый год дарить близким, коллегам и друзьям активный и комфортный отдых в нашем центре отдыха.</span>
            <a href="">Подробнее</a>
        </div>
    </div>


    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])

@endsection
