@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="/css/main.css">
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

    @include('element.card.card', [
        'img' => $service->img,
        'name' => $service->name,
        'text' => $service->text,
        'capacity' => $service->capacity,
        'link' => $service->link
])

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
