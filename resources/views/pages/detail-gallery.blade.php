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
        @foreach ($photos->imgs as $img)
            <div>
                <img src="{{$img}}" alt="">
            </div>
        @endforeach
    </div>

    <div class="six"><p><span><img src="/img/albums/icon-gallery-1.svg" alt="">Другие фотоальбомы</span></p></div>
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
