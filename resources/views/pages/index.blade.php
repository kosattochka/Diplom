@extends('block.pattern')

@section('links')
    <link href="https://api.rusmeteo.net/service/informers/css/widget-square.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/index.css">
    <script async src="https://rusmeteo.net/api/informerV2/95d57fa976e77852942d0bd424383de2/" type="text/javascript"></script>
    <script defer src="/js/aside-index.js"></script>
    <script defer src="/js/slider.js"></script>
@endsection

@section('title') Главная @endsection

@php
    $card =view('element/card', [
            'img' => '/img/standart.svg',
            'name' => 'Стандарт',
            'square' => '22',
            'capasity' => '2',
            'text' => 'Однокомнатный номер с возможностью размещения +1 человека (за доплату). Всего 59 номеров, расположенных на 1-3 этажах.',
            'link' => ''
        ])->render();
    $card = array_fill(0, 3, $card);

    $galleryTitle = [];
    for($i=0; $i<8; $i++){
        $gallery_title[] = json_decode(json_encode(['alias'=>'zima'.$i,'text'=>'Зима']), false);
    }

    $galleryPhoto=array_fill(0,10,'<img src="/img/luh.svg" class="galleryPhoto">');
@endphp

@section('main_content')
    @include('block.header', [
        'active' => 0,
        'phone' =>$contacts['phone'],
        'telegram' =>$contacts['telegram'],
        'vk' =>$contacts['vk']
    ])
    <div class="web-content">
        <div>
            <div class="six"><p><span><img src="/img/icon-certificate.svg" alt="">Подарочный сертификат</span></p></div>
            <div class="certificate-block">
                <div>
                    <img src="{{$certificate}}" alt="">
                    <span class="Playfair_Bold_24">
                        Приглашаем в уютный
                        <span>«Павловский Парк»</span>
                        – идеальное место для отдыха в любое время года! Десятки развлечений, развитая инфраструктура и живописные пейзажи помогут отвлечься от повседневных забот.
                        <span>Приезжайте</span>
                        с друзьями, коллегами или партнерами –
                        <span>у нас есть всё</span>
                        для отдыха, развлечений и работы.
                        <br>
                        <br>
                        <span>Павловка</span>
                        – уникальное
                        <span>место, где вы</span>
                        насладитесь природой, отдохнете от городской суеты и
                        <span>зарядитесь энергией!</span>
                    </span>
                </div>
            </div>
            <div class="six"><p><span><img src="/img/placement.svg" alt="">Проживание</span></p></div>
            @include('block.slider', [
                'desktopCount' => 1,
                'elements' => $card
            ])
            <div class="six"><p><span><img src="/img/gallery.svg" alt="">Галерея</span></p></div>
        </div>

        <aside>
            <a href="https://rusmeteo.net/weather/ufa/" class="rus-widget-square" id="95d57fa976e77852942d0bd424383de2" style="width:100%;color:rgb(13, 80, 77); font-family: PlayfairDisplay_Bold;">Погода в Уфе</a>
            <div class="alert">
                <h1>Внимание!</h1>
                <span class="Playfair_Bold_24">При температуре -25°С и ниже подъёмник не работает.</span>
            </div>
            <div>
                <div class="row">
                    <figure></figure>
                    <h1>Рейтинг</h1>
                </div>
                <a href="https://yandex.ru/maps/org/pavlovskiy_park/1203779586/reviews/?ll=56.525875%2C55.459164&utm_campaign=v1&utm_medium=rating&utm_source=badge&z=13" class="review-block">
                    <img src="/img/Yandex.svg" alt="">
                    <div>
                       <h1>4,9</h1>
                        @include('element.stars', [
                            'rating'=> 4.9
                        ])
                    </div>
                    <span>Оценка в Яндекс</span>
                </a>
                <a href="https://2gis.ru/ufa/firm/2393065583227349?utm_source=widget_firm" class="review-block">
                    <img src="/img/2gis.svg" alt="">
                    <div>
                       <h1>3,2</h1>
                        @include('element.stars', [
                            'rating'=> 3.2
                        ])
                    </div>
                    <span>Оценка в 2gis</span>
                </a>
            </div>
            <div class="new-block">
                <h1>Новости</h1>
                @include('element.new-card', $news[0])
                @include('element.new-card', $news [1])
            </div>
        </aside>
    </div>
    <div id="bottom-content">
        <div class="gallery-button" id="gallery-button">
            <div>
                @foreach ($gallery_title as $item)
                    <a
                        href="{{request()->url() . '?gallery=' . $item->alias .  '#gallery-button'}}"
                        @if (request()->input('gallery') == $item->alias)
                            style="background-color: #FDB10B;"
                        @endif
                    >{{$item->text}}</a>
                @endforeach
            </div>
        </div>
        @include('block.slider', [
            'id'=>2,
            'desktopCount' => 2,
            'mobileCount' => 1,
            'elements' => $galleryPhoto
        ])
    </div>
    @include('block.footer', [
        'phone' =>$contacts['phone'],
        'telegram' =>$contacts['telegram'],
        'vk' =>$contacts['vk'],
        'email' =>$contacts['email'],
        'address' =>$contacts['address_office']
    ])
@endsection
