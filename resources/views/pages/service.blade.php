@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/service.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title') Услуги Павловского парка @endsection

@section('main_content')
    @include('block.header', [
        'active' => 2,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' => $contacts->vk,
        'title' => $title ?? null
    ])

    <div class="service-container">
        @foreach ($service as $item)
            @include( 'element.card.card', $item)
        @endforeach
    </div>

    @isset($all)
        <div class="six"><p><span><img src="/img/services/icon-service4.svg" alt="">Другие услуги  </span></p></div>
        @include('block.slider', [
            'desktopCount' => 2,
            'mobileCount' => 1,
            'elements' => $all
        ])
    @endisset

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
