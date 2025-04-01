@extends('block.pattern')

@section('links')
    <link href="https://api.rusmeteo.net/service/informers/css/widget-square.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/css/index.css">
    <script async src="https://rusmeteo.net/api/informerV2/95d57fa976e77852942d0bd424383de2/" type="text/javascript"></script>
    <script defer src="/js/aside-index.js"></script>
    <script defer src="/js/slider.js"></script>
@endsection

@section('title') Главная @endsection

@section('main_content')
    @include('block.header', [
        'active' => 0,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk
    ])

    @if(session('email'))
        <div id="modal4" class="modal" style="display: block;">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <div class="subtitle">
                    <div>
                        <img src="/img/logo.svg" alt="">
                    </div>
                </div>
                <h2>ПРИДУМАЙТЕ НОВЫЙ ПАРОЛЬ</h2>
                <form class="registration-form" id="reset_password">
                    <input type="hidden" name="email" value="{{session('email')}}">
                    <div class="form-group">
                        <label>Придумайте пароль</label>
                        <input type="password" name="password" placeholder="Не менее 8 символов" required>
                    </div>
                    <div class="form-group">
                        <label>Повторите пароль</label>
                        <input type="password" name="password_confirmation" placeholder="Повторите ваш пароль" required>
                    </div>
                    <button type="submit" class="submit-btn">Отправить</button>
                </form>
            </div>
        </div>
    @endif

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
                'elements' => $rooms
            ])
            <div class="six" id="gallery"><p><span><img src="/img/gallery.svg" alt="">Галерея</span></p></div>
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
                       <h1>{{round($review['Яндекс'], 1)}}</h1>
                        @include('element.stars', [
                            'rating'=> $review['Яндекс']
                        ])
                    </div>
                    <span>Оценка в Яндекс</span>
                </a>
                <a href="https://2gis.ru/ufa/firm/2393065583227349?utm_source=widget_firm" class="review-block">
                    <img src="/img/2gis.svg" alt="">
                    <div>
                       <h1>{{round($review['2gis'], 1)}}</h1>
                        @include('element.stars', [
                            'rating'=> $review['2gis']
                        ])
                    </div>
                    <span>Оценка в 2gis</span>
                </a>
            </div>
            <div class="new-block">
                <h1>Новости</h1>
                @include('element.card.new', $news[0])
                @include('element.card.new', $news[1])
            </div>
        </aside>
    </div>
    <div id="bottom-content">
        @include('element.paginate', [
            'id'=>"gallery-button",
            'field'=>"gallery",
            'list'=>$album
        ])
        @include('block.slider', [
            'id'=>2,
            'desktopCount' => 2,
            'mobileCount' => 1,
            'elements' => $photo
        ])
    </div>
    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
