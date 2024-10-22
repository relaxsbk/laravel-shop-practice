@extends('templates.main')

@section('title', 'Корзина товаров | Интернет-магазин бытовой и цифровой техники в городе Красноярск | ГиперКвант')

@section('meta')
    <link rel="canonical" href="{{ route('cart') }}">
@endsection


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
            @if($itemsCount > 0)
                <span class="fs-3">({{$itemsCount}})</span>

            @endif
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
                @if(session()->has('message_errors'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('message_errors')}}
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
                                    <img src="{{$item->img}}" alt="Product Image" class="img-fluid" style="width: 100px; height: 100%;">
                                </div>
                                <div class="col">
                                    <h5 class="card-title mb-0 text-decoration-none"><a href="{{ route('Product', ['category' => $item->category->code, 'product' => $item->id]) }}">{{$item->title}}</a></h5>
                                </div>
                                <div class="col-auto mr-3">
                                        <p  class="card-title mb-0"> 1 Шт.</p>
                                </div>
                                <div class="col-auto mr-3">
                                    <p class="card-text mb-0">{{$item->money()}} ₽</p>
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
                                <span class="card-text fw-bold fs-5">{{$cart->getTotal()}} ₽</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="card-text text-secondary">Стоимость доставки:</span>
                                <span class="card-text fw-bold fs-5">Бесплатно</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="card-text fw-bold fs-5 mt-3">К Оплате</h6>
                                <h6 class="card-text fw-bold fs-4">{{$cart->getTotal()}} ₽</h6>
                            </div>

                            <div class="form-check mt-auto mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox">
                                <label class="form-check-label" for="agreeCheckbox">
                                    Я согласен с условиями использования пользовательского соглашения
                                </label>
                            </div>
                            <a href="{{route('createOrder')}}" class="btn btn-primary text-white btn-block disabled" id="orderButton" onclick="return validateCheckbox()">Оформить заказ</a>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>








    <script>
        function validateCheckbox() {
            var agreeCheckbox = document.getElementById('agreeCheckbox');
            if (!agreeCheckbox.checked) {
                alert("Пожалуйста, согласитесь с условиями использования пользовательского соглашения.");
                return false; // Предотвращаем переход по ссылке
            }
            // Если чекбокс отмечен, разрешаем переход по ссылке
            return true;
        }

        // Слушаем изменения чекбокса
        document.getElementById('agreeCheckbox').addEventListener('change', function() {
            // Если чекбокс отмечен, разблокируем кнопку оформления заказа, иначе блокируем
            var orderButton = document.getElementById('orderButton');
            if (this.checked) {
                orderButton.classList.remove('disabled'); // Убираем класс "disabled"
            } else {
                orderButton.classList.add('disabled'); // Добавляем класс "disabled"
            }
        });
    </script>

@endsection
