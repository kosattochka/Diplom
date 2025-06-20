<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('links')
    <link rel="icon" type="image/png" href="/img/ico.ico">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <script defer type="module" src="/js/modal.js"></script>
    {{-- <script defer type="module" src="/js/width-body.js"></script> --}}
    <script defer type="module" src="/js/form/login.js"></script>
    <script defer type="module" src="/js/form/register.js"></script>
    <script defer type="module" src="/js/form/forgot.js"></script>
    <script defer type="module" src="/js/scrolle.js"></script>
</head>
    @if(request()->cookie('error'))
        <body class="modal-open">
        <div id="errorModal" class="modal error" style="display: block">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <div class="subtitle">
                    <div>
                        <img src="/img/logo.svg" alt=""/>
                    </div>
                </div>
                <h2>ОШИБКА</h2>
                <h3>{{request()->cookie('error')}}</h3>
            </div>
        </div>
        @php
            Cookie::expire('error');
        @endphp
    @elseif(request()->cookie('msg'))
        <body class="modal-open">
        <div id="errorModal" class="modal error" style="display: block">
            <div class="modal-content">
                <span class="modal-close">&times;</span>
                <div class="subtitle">
                    <div>
                        <img src="/img/logo.svg" alt=""/>
                    </div>
                </div>
                <h2>ВНИМАНИЕ</h2>
                <h3>{{request()->cookie('msg')}}</h3>
            </div>
        </div>
        @php
            Cookie::expire('msg');
        @endphp
    @else
        <body>
    @endif

    @yield('main_content')
</body>
</html>
