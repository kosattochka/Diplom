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
        'review' =>$review,
    ])'

    @include('element.paginate', [
        'id'=>"year1",
        'field'=>"year",
        'list'=>[
            '2025'=>2025,
            '2024'=>2024,
            '2023'=>2023,
            '2022'=>2022,
            '2021'=>2021
        ]
    ])

    <div class="review-container">
        <div class="review-card">
            <figure></figure>
            <div>
                <h1>Leonix Leon</h1>
                @include('element.stars', [
                    'rating'=>5
                ])
            </div>
            <div>
                <span class="text-yellow">27.07.2024</span>
                <span>на Yandex</span>
            </div>
            <span>Хорошее место, чтобы отдохнуть</span>
        </div>
        <hr>
    </div>

    @include('element.paginate', [
        'id'=>"year2",
        'field'=>"year",
        'list'=>[
            '2025'=>2025,
            '2024'=>2024,
            '2023'=>2023,
            '2022'=>2022,
            '2021'=>2021,
        ]
    ])

@endsection
