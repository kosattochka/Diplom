@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/room.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title'){{$room->title}}@endsection
@section('main_content')
    @include('block.header', [
        'active' =>10,
        'phone' => $contacts->phone,
        'telegram' => $contacts->telegram,
        'vk' => $contacts->vk,
        'title' => $room->title,
        'imgs'=>$room->imgs
    ])

    <div class="info-room-container">
        <div>
            <span class="text-yellow">Дополнительное место: <span>1700 руб.</span></span>
            <span class="text-yellow">Все цены Павловского парка: <a href="/">полный прайс</a></span>
            <span class="text-yellow">Связаться с менеджером: <a href="/"> 8 (800) 600-93-44</a></span>
        </div>
        <div>
            <div class="price-container-row">
                <img src="/img/rooms/icon-price.svg" alt="">
                <span class="text-yellow">Стоимость <span>от 4500 руб.</span></span>
            </div>
            <button>Заявка на бронь</button>
        </div>
    </div>
    <div class="six"><p><span><img src="/img/rooms/icon-title-room.svg" alt="">Описание номера</span></p></div>
    <div class="baner-content-placement">
        <div class="rectangle-white-container line-yellow-bottom column-gap">
            <span>Стандарт - однокомнатный номер общей площадью 22 кв.м со всеми удобствами. В номере 2 основных места, возможно размещение одного дополнительного человека (при оплате дополнительного места). Номера расположены на первом, втором и третьем этаже. Всего 59 номеров.
                <br><br>
                В номере: <br>
                - 2 односпальные кровати,  2 тумбы, 2 пуфика, диван;<br>
                - Шкаф-купе, журнальный стол, телевизор;<br>
                - Холодильник, чайник, чайная пара, полотенца;<br><br>
                Наши менеджеры готовы компетентно ответить на все интересующие вас вопросы по телефону: <a href="">{{$phone}}</a>.</span>
      </div>
    </div>
    <div class="six"><p><span><img src="/img/rooms/icon-title-room.svg" alt="">Другие номера</span></p></div>
    @php
    $slider = array_fill(0, 4, view('element.card.card', ['name'=>'123тест', 'text'=>'fjfkf', 'img'=>'/img/albums/winter-album2.png', 'link'=> '/'])->render())
    @endphp

    @include('block.slider', [
        'id'=>2,
        'desktopCount' => 2,
        'mobileCount' => 1,
        'elements' => $slider
    ])

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
