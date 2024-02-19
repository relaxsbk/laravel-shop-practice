@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Бренды</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Список всех брендов</h2>
    @include('components.alerts.alert')

    @if($brands->isEmpty())
        <div class="alert alert-danger" role="alert">
            <div class="container fs-2">
                Список брендов пуст...
            </div>
    @else
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Картинка</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Публикация</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <th scope="row"><a href="{{route('admin.brandId', $brand->id)}}">{{$brand->id}}</a></th>
                <td><img style="max-width: 100%; height: 35px" src="{{$brand->img}}" alt="brand"></td>
                <td>{{$brand->name}}</td>
                <td>@if($brand->is_public === 0) Нет @else Да @endif</td>
                <td><a href="{{route('admin.brandId', $brand->id)}}" class="btn btn-outline-warning">Изменить</a></td>
                <td>
                    <form action="{{route('admin.brandDelete', $brand->id)}}" method="post">
                        @csrf
                        <button class="btn btn-outline-danger">Удалить</button>
                    </form>

                </td>
            </tr>
        @endforeach
        {{ $brands->links('pagination::bootstrap-5') }}

        </tbody>
    </table>
    @endif

@endsection
