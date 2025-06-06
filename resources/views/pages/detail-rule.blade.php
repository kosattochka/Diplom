@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/rule.css">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="/js/slider.js"></script>
@endsection

@section('title'){{$rule->title}}@endsection
@section('main_content')
    @include('block.header', [
        'active' =>14,
        'phone' => $contacts->phone,
        'telegram' => $contacts->telegram,
        'vk' => $contacts->vk,
        'title' => $rule->title,
    ])

    <section class="rule-paragraphs">
        @foreach($rule->paragraphs as $item)
            @if(isset($item['title']))
                <div class="six"><p><span>
                    <img src="/img/rules/icon-rule.svg" alt="">
                    {{$item['title']}}
                </span></p></div>
            @endif
            <div class="rectangle-white-container">
                {{$item['text']}}
            </div>
        @endforeach
    </section>

    <div class="six" id="gallery"><p><span><img src="/img/rules/icon-rule.svg" alt="">Другие правила</span></p></div>
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
