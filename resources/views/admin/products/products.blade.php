@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Товары</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Список всех продуктов</h2>
    @if($products->isEmpty())
        <div class="alert alert-danger" role="alert">
            <div class="container fs-2">
                Список товаров пуст...
            </div>
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№ товара</th>
                <th scope="col">Картинка</th>
                <th scope="col">категория</th>
                <th scope="col">бренд</th>
                <th scope="col">Заголовок</th>
                <th scope="col">модель</th>
                <th scope="col">цена</th>
                <th scope="col">рейтинг</th>
                <th scope="col">Публикация</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td><img style="max-width: 100%; height: 35px" src="{{$product->img}}" alt="brand"></td>
                    <td>{{$product->category->title}}</td>
                    <td>{{$product->brand->name}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->model}}</td>
                    <td>{{$product->money()}} P</td>
                    <td>{{$product->rating}}</td>

                    <td>потом</td>
                    <td><a class="btn btn-outline-warning">Изменить</a></td>
                    <td><a class="btn btn-outline-danger">Удалить</a></td>
                </tr>
            @endforeach
            {{ $products->links('pagination::bootstrap-5') }}

            </tbody>
        </table>
    @endif

@endsection