@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Неопубликованные бренды</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Список всех неопубликованных брендов</h2>
{{--    TODO: оформить в виде таблицы--}}
{{--    @if($orders->isEmpty())--}}
{{--        <h2 class="fs-2">Заказов нет</h2>--}}
{{--    @else--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col">№ продукта</th>--}}
{{--                <th scope="col">Status</th>--}}
{{--                <th scope="col">login</th>--}}
{{--                <th scope="col">Total</th>--}}
{{--                <th scope="col"></th>--}}
{{--                <th scope="col"></th>--}}
{{--                <th scope="col"></th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($orders as $order)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$order->id}}</th>--}}
{{--                    <td>{{$order->status}}</td>--}}
{{--                    <td>{{$order->user->login}}</td>--}}
{{--                    <td>{{$order->moneyTotal()}} ₽</td>--}}
{{--                    <td><a class="btn btn-outline-primary">Доставка</a></td>--}}
{{--                    <td><a class="btn btn-outline-success">Выполнить</a></td>--}}
{{--                    <td><a class="btn btn-outline-danger">Отклонить</a></td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}

{{--            --}}{{--        <tr>--}}
{{--            --}}{{--            <th scope="row">2</th>--}}
{{--            --}}{{--            <td>Jacob</td>--}}
{{--            --}}{{--            <td>Thornton</td>--}}
{{--            --}}{{--            <td>@fat</td>--}}
{{--            --}}{{--        </tr>--}}
{{--            --}}{{--        <tr>--}}
{{--            --}}{{--            <th scope="row">3</th>--}}
{{--            --}}{{--            <td colspan="2">Larry the Bird</td>--}}
{{--            --}}{{--            <td>@twitter</td>--}}
{{--            --}}{{--        </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    @endif--}}

@endsection
