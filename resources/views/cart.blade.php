@extends('templates.main')

@section('main')



    <div class="container mt-5">

        <nav class="fs-6 mt-4 mb-" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item active" aria-current="page">Корзина</li>
            </ol>
        </nav>

        <h2 class="h2 fw-bold mt-4 mb-4">
            Корзина
            @if(!$cart->isEmpty())
                <a class="fs-6 text-decoration-none" href="{{route('clearCart')}}">очистить</a>
            @endif
        </h2>


        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>
            @endif
                @if(session()->has('message_error'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('message')}}
                    </div>
                @endif
            @if($cart->isEmpty())
                <h1>Корзина пустая!</h1>
            @else
                <div class="col-lg-8">
                    <!-- Карточки товаров -->
                    @foreach($cart->get() as $item)
                        <div class="card bg-white border mb-3" style="max-width: 100%;">
                            <div class="card-body row align-items-center">
                                <div class="col-auto">
                                    <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid">
                                </div>
                                <div class="col">
                                    <h5 class="card-title mb-0">{{$item->title}}</h5>
                                </div>
                                <div class="col-auto mr-3">
                                    <label>
                                        <input type="number" value="1" class="form-control ">
                                    </label>
                                </div>
                                <div class="col-auto mr-3">
                                    <p class="card-text mb-0">{{$item->money()}} P</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{route('removeCart', $item)}}" class="btn btn-danger">Удалить</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="col-lg-4">
                    <!-- Блок с итогом -->
                    <div class="card mb-3" style="background-color: #DEF9F9;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold fs-3">Итого</h5>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="card-text text-secondary">Товаров на сумму:</span>
                                <span class="card-text fw-bold fs-5">{{$cart->getTotal()}} Р</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="card-text text-secondary">Стоимость доставки:</span>
                                <span class="card-text fw-bold fs-5">500 Р</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-text fw-bold fs-5 mt-3">К Оплате</h6>
                                <h6 class="card-text fw-bold fs-4">{{$cart->getTotal()}} Р</h6>
                            </div>

                            <div class="form-check mt-auto mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox">
                                <label class="form-check-label" for="agreeCheckbox">
                                    Я согласен с условиями использования пользовательского соглашения
                                </label>
                            </div>
                            <button class="btn btn-primary text-white btn-block" id="orderButton" disabled>Оформить заказ</button>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>








    <script>
        // Слушаем изменения чекбокса
        document.getElementById('agreeCheckbox').addEventListener('change', function() {
            // Если чекбокс отмечен, разблокируем кнопку оформления заказа, иначе блокируем
            var orderButton = document.getElementById('orderButton');
            orderButton.disabled = !this.checked;
        });
    </script>

@endsection
