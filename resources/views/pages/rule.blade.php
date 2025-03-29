@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/service.css">
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('title') Правила Павловского парка @endsection
@section('main_content')
    @include('block.header', [
        'active' => 3,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk
    ])

    <div class="service-container">
        @foreach ($rule as $item)
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
