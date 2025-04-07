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
        <form class="book-form" id="register">
            <div>
                <div class="form-group">
                    <input type="date" name="date" placeholder="" required>
                </div>
                <div class="form-group">
                    <input type="date" name="date" placeholder="" required>
                </div>
            </div>
                <button type="submit" class="submit-btn">Найти</button>
        </form>
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
