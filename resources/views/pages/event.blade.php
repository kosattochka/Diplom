@extends('block.pattern')
@section('links')
    <link rel="stylesheet" href="/css/event.css">
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('title') Акции Павловского парка @endsection
@section('main_content')
    @include('block.header', [
        'active' => 4,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
    ])

    @foreach ($events['data'] as $card)
        @include('element.event_card', [
            'img'=>$card->img,
            'name'=>$card->name,
            'text' => $card->text,
            'link'=>$card->link
        ])
        <hr>
    @endforeach

    @include('element.paginate', [
        'id'=>"page",
        'field'=>"page",
        'list'=>$events['links'],
        'lastPage'=>$events['meta']['last_page']
    ])

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])

@endsection
