@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/new.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title'){{$events->title}}@endsection

@section('main_content')
    @include('block.header', [
        'active' => 15,
        'phone' => $contacts->phone,
        'telegram' => $contacts->telegram,
        'vk' => $contacts->vk,
        'certificate' => $events->certificate,
    ])

    <section class="news-paragraphs">
        @foreach($events->paragraphs as $item)
            @if(isset($item['title']))
                <div class="six"><p><span>
                    <img src="/img/icon-event.svg" alt="">
                    {{$item['title']}}
                </span></p></div>
            @endif
            <div class="rectangle-white-container">
                {{$item['text']}}
            </div>
        @endforeach
    </section>

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
