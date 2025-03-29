@extends('block.pattern')

@section('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/review.css">
@endsection

@section('title') Отзывы Павловского парка @endsection

@section('main_content')
    @include('block.header', [
        'active' => 7,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
        'rating' =>$rating,
    ])'

    @include('element.paginate', [
        'id'=>"year1",
        'field'=>"year",
        'list'=>$years
    ])

    <div class="review-container">
        @foreach ($reviews as $item)
            @include('element.card.review', $item)
            <hr>
        @endforeach
    </div>

    @include('element.paginate', [
        'id'=>"year2",
        'field'=>"year",
        'list'=>$years
    ])

@endsection
