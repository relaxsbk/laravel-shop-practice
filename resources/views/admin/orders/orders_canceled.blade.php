@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Отменённые заказы</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Отменённые заказы</h2>
    @if($orders->isEmpty())

        <div class="alert alert-danger" role="alert">
            <div class="container fs-2">
               Отменённых заказов нет...
            </div>

        </div>
    @else
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№ </th>
                <th scope="col">Status</th>
                <th scope="col">login</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>
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
                    </td>
                    <td>{{$order->user->login}}</td>
                    <td>{{$order->moneyTotal()}} ₽</td>
                    <td>
                        <form action="{{ route('admin_orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="delivered">
                            <button type="submit" class="btn btn-outline-primary" {{ $order->status == 'delivered' ? 'disabled' : '' }}>Доставка</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin_orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="btn btn-outline-success" {{ $order->status == 'completed' ? 'disabled' : '' }}>Выполнить</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin_orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="canceled">
                            <button type="submit" class="btn btn-outline-danger" {{ $order->status == 'canceled' ? 'disabled' : '' }}>Отклонить</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('admin_orders.destroy', $order->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Удалить заказ</button>
                        </form>
                    </td>


                </tr>
            @endforeach

            {{--        <tr>--}}
            {{--            <th scope="row">2</th>--}}
            {{--            <td>Jacob</td>--}}
            {{--            <td>Thornton</td>--}}
            {{--            <td>@fat</td>--}}
            {{--        </tr>--}}
            {{--        <tr>--}}
            {{--            <th scope="row">3</th>--}}
            {{--            <td colspan="2">Larry the Bird</td>--}}
            {{--            <td>@twitter</td>--}}
            {{--        </tr>--}}
            </tbody>
        </table>
    @endif

@endsection