@extends('block.pattern')

@section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/new.css">
    @endsection

@section('title') Новости Павловского парка @endsection

@section('main_content')
    @include('block.header', [
        'active' => 5,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
    ])

    <div class="new-wrapper">
        @foreach ($news['data'] as $item)
            @include('element.card.new', $item)
            <hr>
        @endforeach
    </div>

    @include('element.paginate', [
        'id'=>"page",
        'field'=>"page",
        'list'=>$news['links'],
        'lastPage'=>$news['meta']['last_page']
    ])

    @include('block.footer', [
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'email' =>$contacts->email,
        'address' =>$contacts->address_office
    ])

@endsection
