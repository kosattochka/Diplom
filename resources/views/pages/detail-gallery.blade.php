@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/album.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title'){{$photos->title}}@endsection

@section('main_content')
    @include('block.header', [
        'active' => 16,
        'phone' => $contacts->phone,
        'telegram' => $contacts->telegram,
        'vk' => $contacts->vk,
        'img' => $photos->imgs[0],
        'title' => $photos ->title,
    ])

    <div class="album-container">
        <div>
            <img src="/img/albums/winter-album.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album2.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album2.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album2.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album2.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album2.png" alt="">
        </div>
        <div>
            <img src="/img/albums/winter-album2.png" alt="">
        </div>
    </div>

    <div class="six"><p><span><img src="/img/albums/icon-gallery-1.svg" alt="">Другие фотоальбомы</span></p></div>

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
