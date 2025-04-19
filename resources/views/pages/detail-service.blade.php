@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title'){{$service->title}}@endsection
@section('main_content')
    @include('block.header', [
        'active' =>13,
        'phone' => $contacts->phone,
        'telegram' => $contacts->telegram,
        'vk' => $contacts->vk,
        'title' => $service->title,
    ])

    <div class="six"><p><span><img src="/img/icon-price.svg" alt="">Прейскурант цен на услуги буксировочной канатной дороги</span></p></div>
    <section class="table-container">
        <div class="table">
            <table>
                <tr>
                    <th rowspan="2" class="bg-grey">Вид ски-пасса</th>
                    <th colspan="3" class="bg-green">Стоимость, рубли</th>

                </tr>
                <tr aria-rowindex="2">
                    <th>Будни (пн - пт)</th>
                    <th>Выходные (сб - вс)</th>
                    <th>Праздничные дни</th>
                </tr>
                <tr>
                    <td class="bg-green">1 час</td>
                    <td>500</td>
                    <td>600</td>
                    <td>800</td>
                </tr>
                <tr>
                    <td class="bg-green">2 часа</td>
                    <td>650</td>
                    <td>900</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td class="bg-green">3 часа</td>
                    <td>850</td>
                    <td>1200</td>
                    <td>1550</td>
                </tr>
                <tr>
                    <td class="bg-green">4 часа</td>
                    <td>1050</td>
                    <td>1550</td>
                    <td>1800</td>
                </tr>
                <tr>
                    <td class="bg-green">1 день</td>
                    <td>-</td>
                    <td>3100</td>
                    <td>3600</td>
                </tr>
                <tr>
                    <td class="bg-green">1 подъем</td>
                    <td>200</td>
                    <td>200</td>
                    <td>200</td>
                </tr>
            </table>
        </div>
    </section>
    <div class="rectangle-white-container">
        <div>
            <span>
            Праздничные дни:
            <br><br>
            - 01.01.2024 10:00 – 08.01.2025 22:00 <br>
            - 22.02.2025 10:00 – 23.02.2025 22:00 <br>
            - 08.03.2025 10:00 – 09.03.2025 22:00 <br>
            <br><br>
            Работа канатной дороги: <br>
            - Пн-Вт: 11:00–22:00 <br>
            - Ср-Вс: 10:00–22:00 <br>
            <br><br>
            Скидки и условия: <br>
            - Гости отеля получают 20% скидку на ски-пасс (кроме подъемов) по «Карте гостя». <br>
            - Дети до 5 лет катаются бесплатно при покупке ски-пасса родителем. <br>
            - Дети до 14 лет допускаются только с сопровождающим, который отвечает за их безопасность.
            <br><br>
            Ски-пассы: <br>
            - Часовые пассы действуют только в день покупки (до 22:00). <br>
            - Пассы с оплатой по подъемам действуют весь сезон. <br>
            - Возврат возможен за неактивированные пассы и неиспользованные подъемы. <br>
            - Залог 100 руб./карта возвращается при сдаче пасса в исходном состоянии. <br>
            - Утерянные или поврежденные пассы не заменяются и не возвращаются. <br>
            - Активация пасса происходит при первом проходе через турникет.
            </span>
        </div>
    </div>
    <div class="rectangle-attention">
        <span>ВНИМАНИЕ! При температуре ниже -25С подъемник не работает.</span>
    </div>

    <div class="six"><p><span><img src="/img/services/icon-service4.svg" alt="">Другие услуги  </span></p></div>

    @php
    $slider = array_fill(0, 4, view('element.card.card', ['name'=>'123тест', 'text'=>'fjfkf', 'img'=>'/img/albums/winter-album2.png', 'link'=> '/'])->render())
    @endphp

    @include('block.slider', [
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
