@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/room.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title'){{$room->title}}@endsection
@section('main_content')
    @include('block.header', [
        'active' =>11,
        'phone' => $contacts->phone,
        'telegram' => $contacts->telegram,
        'vk' => $contacts->vk,
        'title' => $room->title,
        'img'=>$room->imgs
    ])

    @include('block.reservation')

    <div class="info-room-container">
        <div>
            <span class="text-yellow">Дополнительное место: <span>{{$room->price_extra_space}} руб.</span></span>
            <span class="text-yellow">Все цены Павловского парка: <a href="/">полный прайс</a></span>
            <span class="text-yellow">Связаться с менеджером: <a href="tel:88006009344">8 (800) 600-93-44</a></span>
        </div>
        <div>
            <div class="price-container-row">
                <img src="/img/rooms/icon-price.svg" alt="">
                <span class="text-yellow">Стоимость <span>от {{$room->price}} руб.</span></span>
            </div>
            <button class="modal-open" data-modal="reservation" data-room="{{$room->alias}}">Заявка на бронь</button>
        </div>
    </div>

    @foreach($room->paragraphs as $key=>$item)
        @if(isset($item['title']))
            <div class="six"><p><span>
                <img src="/img/rules/icon-rule.svg" alt="">
                {{$item['title']}}
            </span></p></div>
        @endif
        <div class="room-container">
            <div class="rectangle-white-container @if($key==0) line-yellow-bottom column-gap @endif">
                {!! $item['text'] !!}
            </div>
        </div>
    @endforeach

    <div class="six"><p><span><img src="/img/rooms/icon-title-room.svg" alt="">Другие номера</span></p></div>
    <div class="room-row-gap">
        @foreach($allRoom as $item)
            {!!$item!!}
        @endforeach
    </div>

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
