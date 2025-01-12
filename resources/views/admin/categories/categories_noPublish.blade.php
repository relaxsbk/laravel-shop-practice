@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Неопубликованные категории</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Список всех неопубликованных категорий</h2>
    @include('components.alerts.alert')

    @if($categories->isEmpty())
        <div class="alert alert-danger" role="alert">
            <div class="container fs-2">
                Список неопубликованных категорий пуст...
            </div>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">code</th>
                        <th scope="col">Картинка</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Публикация</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row"><a href="{{route('admin.CategoryId', $category->id)}}">{{$category->id}}</a></th>
                            <td>{{$category->code}}</td>
                            <td><img style="max-width: 100%; height: 35px" src="{{$category->img}}" alt="category"></td>
                            <td>{{$category->title}}</td>
                            <td>@if($category->is_public === 0) Нет@endif</td>
                            <td><a href="{{route('admin.CategoryId', $category->id)}}" class="btn btn-outline-warning">Изменить</a></td>
                            <td>
                                <form action="{{route('admin.CategoryDelete', $category->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-danger">Удалить</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    {{ $categories->links('pagination::bootstrap-5') }}


                    </tbody>
                </table>
    @endif

@endsection
