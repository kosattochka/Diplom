<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('links')
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <script defer src="/js/burger.js"></script>
    <script defer src="/js/modal.js"></script>
    <script defer src="/js/form/login.js"></script>
    <script defer src="/js/form/register.js"></script>
</head>
<body>
    @yield('main_content')
</body>
</html>
