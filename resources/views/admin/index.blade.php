@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">Панель администрирования</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h1>Добро пожаловать в панель администрирования</h1>
    <p>Здесь вы можете управлять данными и настройками магазина.</p>
    @include('components.alerts.alert')

    <!-- Дополнительный контент здесь -->
@endsection
