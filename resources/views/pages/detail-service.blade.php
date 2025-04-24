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
        'page_description' => $service->page_description
    ])

    <div class="six"><p><span>
        <img src="/img/icon-price.svg" alt="">
        {{$service->page_heading}}
    </span></p></div>
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
                @foreach ($service->table_price as $string)
                    <tr>
                        <td class="bg-green">{{$string['title']}}</td>
                        <td>{{$string['value'][0]}}</td>
                        <td>{{$string['value'][1]}}</td>
                        <td>{{$string['value'][2]}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
    <div class="rectangle-white-container">
        <div>
            <span>{{$service->page_text}}</span>
        </div>
    </div>
    <div class="rectangle-attention">
        <span>ВНИМАНИЕ! При температуре ниже -25С подъемник не работает.</span>
    </div>

    <div class="six"><p><span><img src="/img/services/icon-service4.svg" alt="">Другие услуги  </span></p></div>
    @include('block.slider', [
        'desktopCount' => 2,
        'mobileCount' => 1,
        'elements' => $all
    ])

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
