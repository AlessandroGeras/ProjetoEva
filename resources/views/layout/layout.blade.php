<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@include('components.navbar')
@yield('content')
@include('components.footer')
</body>
</html>