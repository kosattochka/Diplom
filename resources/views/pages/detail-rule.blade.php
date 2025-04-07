@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/room.css">
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('title'){{$room->title}}@endsection
@section('main_content')
    @include('block.header', [
        'active' =>13,
        'phone' => $contacts->phone,
        'telegram' => $contacts->telegram,
        'vk' => $contacts->vk,
        'title' => $room->title,
    ])
