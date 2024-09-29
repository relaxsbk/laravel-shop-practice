@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Заказ № {{$order->id}}</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <div class="container">
        <div class="card border">
            <div class="card-header">
                Заказ № {{$order->id}}
            </div>
            @include('components.alerts.alert')

            <div class="card-body fs-3">
                <h5 class="card-title fw-bold fs-3">{{$order->user->login}}</h5>
                <h5 class="card-title">
                    @switch($order->status)
                        @case('new')
                            <span class="text-info-emphasis">Новый</span>
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
                </h5>
                <ul class="list-group list-group-flush">
                    Список товаров в заказе:

                    @foreach($order->detail as $detail)
                    <li class="list-group-item">
                            <p>
                                <span class="fw-bold fs-4">Название:</span>
                                <span class="fs-5"> {{$detail->product->title}}</span>
                                <span class="fw-bold fs-4">Стоимость:</span>
                                <span class="fs-5">{{$detail->product->money()}} Р</span>
                            </p>
                    </li>
                    @endforeach
                </ul>
                <p class="card-text">{{$order->moneyTotal()}} P</p>
                <form action="{{ route('admin_orders.updateStatus', $order->id) }}" method="POST" class="btn-group" role="group" aria-label="Basic example">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="delivered">
                    <button type="submit" class="btn btn-outline-primary" {{ $order->status == 'delivered' ? 'disabled' : '' }}>Доставка</button>
                </form>

                <form action="{{ route('admin_orders.updateStatus', $order->id) }}" method="POST" class="btn-group" role="group" aria-label="Basic example">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="completed">
                    <button type="submit" class="btn btn-outline-success" {{ $order->status == 'completed' ? 'disabled' : '' }}>Выполнить</button>
                </form>

                <form action="{{ route('admin_orders.updateStatus', $order->id) }}" method="POST" class="btn-group" role="group" aria-label="Basic example">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="canceled">
                    <button type="submit" class="btn btn-outline-danger" {{ $order->status == 'canceled' ? 'disabled' : '' }}>Отклонить</button>
                </form>

                <form action="{{route('admin_orders.destroy', $order->id)}}" method="post" class="btn-group" role="group" aria-label="Basic example">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Удалить заказ</button>
                </form>



            </div>
        </div>
        <p>

        </p>
        <p></p>
        <p></p>


    </div>


@endsection
