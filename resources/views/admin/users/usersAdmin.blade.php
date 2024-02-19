@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Пользователи</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Список всех администраторов </h2>
    @if($users->isEmpty())
        <div class="alert alert-danger" role="alert">
            <div class="container fs-2">
                Список администраторов пуст...
            </div>
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Имя</th>
                <th scope="col">Логин</th>
                <th scope="col">Почта</th>
                <th scope="col">Роль</th>
                <th scope="col">Дата создания</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->surname}} {{$user->name}}</td>
                    <td>{{$user->login}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->created_at}}</td>

                    <td><a class="btn btn-outline-warning">Изменить</a></td>
                    <td><a class="btn btn-outline-danger">Удалить</a></td>
                </tr>
            @endforeach
            {{ $users->links('pagination::bootstrap-5') }}

            </tbody>
        </table>
     @endif

@endsection
