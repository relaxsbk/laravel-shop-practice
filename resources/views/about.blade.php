@extends('templates.main')

@section('title', 'О нас | ГиперКвант')

@section('meta')
    <meta name="keywords" content="интернет магазин, бытовая техника, цифровая техника, смартфоны, электроника, Красноярск, доставка по красноярску">
    <link rel="canonical" href="{{ route('about') }}">
@endsection

@section('main')

    <div class="container">
        <iframe title=""  src="https://yandex.ru/map-widget/v1/?um=constructor%3A74c3c7f73f3acd020993c133315967fa733ec60d7c2ca5e91f67a1b7482983d1&amp;source=constructor" width="1200" height="1080" ></iframe>
    </div>
@endsection
