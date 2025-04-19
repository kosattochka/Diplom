@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/placement.css">
<link rel="stylesheet" href="/css/main.css">
@endsection
@section('title') Размещение @endsection
@section('main_content')
    @include('block.header', [
        'active' => 1,
        'phone' =>$contacts->phone,
        'telegram' =>$contacts->telegram,
        'vk' =>$contacts->vk,
    ])

    <div class="reservation">
        <span>Поиск свободных номеров</span>
        <div class="book-form" id="register">
            <div class="row-input">
                <div class="form-group">
                    <label for="date-input1">Дата заезда</label>
                    <input type="date" id="date-input1" class="date-input">
                </div>
                <div class="form-group">
                    <label for="date-input1">Дата выезда</label>
                    <input type="date" id="date-input1" class="date-input">
                </div>
                <div class="form-group">
                    <label for="adults-input1">Гости</label>
                    <input type="number" id="adults-input1" class="adults-input" min="1" max="10">
                </div>
                <div class="form-group">
                    <label for="submit" class="submit-label">&&</label>
                    <button type="submit" class="submit-btn" id="submit">Найти</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-placement">
        @foreach ($rooms as $item)
            {!! $item !!}
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
