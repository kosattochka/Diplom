@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/new.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title'){{$new->title}}@endsection
@section('main_content')
    @include('block.header', [
        'active' =>17,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'img' => $new->img,
        'title' => $new->title,
    ])

    <section class="news-paragraphs">
        @foreach($new->paragraphs as $item)
            @if(isset($item['title']))
                <div class="six"><p><span>
                    <img src="/img/news/title-ico.svg" alt="">
                    {{$item['title']}}
                </span></p></div>
            @endif
            <div class="rectangle-white-container">
                {{$item['text']}}
            </div>
        @endforeach
    </section>

    <section class="new-link">
        @if($prev)
            <a href="/new/{{$prev->alias}}"><span><- </span>{{$prev->title}}</a>
        @else
            <a href="/new"><span><-</span>К блогу</a>
        @endif

        @if($next)
            <a href="/new/{{$next->alias}}">{{$next->title}}<span>-></span></a>
        @else
            <a href="/new">К блогу<span>-></span></a>
        @endif
    </section>

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
