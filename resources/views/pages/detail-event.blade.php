@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('title'){{$events->title}}@endsection
@section('main_content')
    @include('block.header', [
        'active' =>15,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'img' => $events->img,
        'title' => $events->title,
    ])

@endsection
