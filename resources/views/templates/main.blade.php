<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss' , 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <title>@yield('title')</title>
    @include('components.meta')
</head>
<body class="d-flex flex-column min-vh-100">

<header class="mb-5">
    @include('components.navbar')
</header>

<main class="flex-grow-1 mt-5 mb-5">
       @yield('main')
</main>


    @include('components.footer')

</body>
</html>
