@extends('templates.main')

@section('title', 'Страница не найдена')

@section('main')

    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
            <h1 class="display-1">404</h1>
            <p class="lead">Страница не найден</p>
            <a href="{{route('HomePage')}}" class="btn btn-primary">Вернуться на главную</a>
        </div>
    </div>
@endsection
