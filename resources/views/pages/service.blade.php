@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/service.css">
@endsection
@section('title') Услуги @endsection
@section('main_content')
    @include('block.header', [
        'active' => 2,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
    ])

    <div class="service-container">
        @foreach ($service as $item)
            @include( 'element.card', [
                'img' => $item['img'],
                'name' => $item['name'],
                'text' => $item['text'],
                'link' => $item['link']
            ])
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
