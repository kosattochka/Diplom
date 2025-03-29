@extends('block.pattern')

@section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/service.css">
    @endsection

@section('title') Галерея Павловского парка @endsection

@section('main_content')
    @include('block.header', [
        'active' => 6,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk
    ])
    <br><br><br>
    <div class="service-container">
        @foreach ($photos as $item)
            @include( 'element.card', $item)
        @endforeach
    </div>
    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])
@endsection
