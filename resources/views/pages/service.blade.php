@extends('block.pattern')
@section('links')
<link rel="stylesheet" href="/css/service.css">
@endsection
@section('title') Услуги @endsection
@section('main_content')
    @include('block.header', [
        'active' => 2
    ])


@endsection
