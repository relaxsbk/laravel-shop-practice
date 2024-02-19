@extends('templates.main')

@section('title', 'Профиль |')


@section('main')
    <div class="container mt-5">

        <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item active" aria-current="page">Профиль</li>
            </ol>
        </nav>

        @if(session()->has('message_errors'))
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    {{session()->get('message_errors')}}
                </div>
            </div>
        @endif

        @if(session()->has('invalid'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('invalid')}}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="card p-0" style="width: 40rem; background-color: #e4f1f1 ">
                <div class="card-header w-100">
                    <h2 class="m-lg-3">Профиль</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p class="fs-5">Добро пожаловать в свой профиль <span class="fw-bold">{{auth()->user()->surname}} {{auth()->user()->name}} !</span></p>
                    </div>
                    <div class="mb-3">
                        <p>{{auth()->user()->login}}</p>
                    </div>
                    <div class="mb-3">
                        <p>{{auth()->user()->email}}</p>
                    </div>
                    <div class="mb-3">
                        @if(auth()->user()->role === 'admin')
                            <a href="{{route('admin_home')}}" class="btn btn-outline-success">Перейти в панель администрирования</a>
                        @endif

                    </div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Выйти</button>
                    </form>
                </div>

            </div>
            @if(auth()->user()->orders->isEmpty())



            @else
                <h2>Заказы</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">№ </th>
                        <th scope="col">Status</th>
                        <th scope="col">login</th>
                        <th scope="col">Total</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>
                                @switch($order->status)
                                    @case('new')
                                        <span class="text-info-emphasis">Ожидается</span>
                                        @break
                                    @case('delivered')
                                        <span class="text-success-emphasis">Доставляется</span>
                                        @break
                                    @case('completed')
                                        <span class="text-success">Выполнен</span>
                                        @break
                                    @case('canceled')
                                        <span class="text-danger">Отменён</span>
                                        @break
                                    @default
                                        Неизвестный статус
                                @endswitch
                            </td>
                            <td>{{$order->user->login}}</td>
                            <td>{{$order->moneyTotal()}} ₽</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>


@endsection
