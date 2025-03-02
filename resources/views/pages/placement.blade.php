@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/placement.css">
@endsection
@section('title') Размещение @endsection
@section('main_content')
    @include('block.header', [
        'active' => 1
    ])
    <div class="reservation">
        <span>Поиск свободных номеров</span>
    </div>

@endsection
