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

    @include('block.reservation')

    <form action="" method="GET" class="reservation" id="filter-room">
        <span>Поиск свободных номеров</span>
        <div class="book-form" id="register">
            <div class="row-input">
                <div class="form-group">
                    <label for="date-input1">Дата заезда</label>
                    <input name="start_date" type="date" id="date-input1" class="date-input" required value="{{request()->start_date}}">
                </div>
                <div class="form-group">
                    <label for="date-input1">Дата выезда</label>
                    <input name="end_date" type="date" id="date-input1" class="date-input" required value="{{request()->end_date}}">
                </div>
                <div class="form-group">
                    <label for="adults-input1">Гости</label>
                    <input name="guests" type="number" id="adults-input1" class="adults-input" min="1" max="10" required value="{{request()->guests}}">
                </div>
                <div class="form-group">
                    <label for="submit" class="submit-label">&&</label>
                    <button type="submit" class="submit-btn" id="submit">Найти</button>
                </div>
            </div>
        </div>
    </form>

    @if (request()->has('start_date', 'end_date', 'guests'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                window.scrollTo({
                    top: document.getElementById('filter-room').offsetTop,
                    behavior: 'smooth',
                })
            })
        </script>

        @if (!empty($rooms))
            <div class="six" id="gallery"><p><span>Данные номера свободны в выбранные даты</span></p></div>
        @endif
    @endif
    @if (empty($rooms))
        <div class="six" id="gallery"><p><span>Простите, у нас нет мест в эти дни</span></p></div>
    @endif

    <div class="card-placement" >
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
