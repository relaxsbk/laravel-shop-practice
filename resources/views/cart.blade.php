@extends('templates.main')

@section('main')



    <div class="container mt-5">

        <nav class="fs-6 mt-4 mb-" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item active" aria-current="page">Корзина</li>
            </ol>
        </nav>

        <h2 class="h2 fw-bold mt-4 mb-4">Корзина</h2>


        <div class="d-flex justify-content-between">
            <div class="w-100 me-5">
                <!-- Карточки товаров -->
                <div class="card bg-white border mb-3" style="max-width: 100%;">
                    <div class="card-body row align-items-center">
                        <div class="col-auto">
                            <img src="https://via.placeholder.com/100" alt="Product Image" class="img-fluid">
                        </div>
                        <div class="col">
                            <h5 class="card-title mb-0">Название продукта с очень длинным названием, которое может занимать несколько строк</h5>
                        </div>

                        <div class="col-auto mr-3">
                            <label>
                                <input type="number" value="1" class="form-control ">
                            </label>
                        </div>
                        <div class="col-auto mr-3">
                            <p class="card-text mb-0">$50</p>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-danger">Удалить</button>
                        </div>
                    </div>
                </div>

                <!-- Добавьте здесь другие карточки товаров при необходимости -->
            </div>
            <div class="ml-auto">
                <!-- Блок с итогом -->
                <div class="card mb-3" style="width: 24rem; background-color: #DEF9F9">
                    <div class="card-body">
                        <h5 class="card-title fw-bold fs-3">Итого</h5>
                        <span class="card-text text-secondary">Товаров на сумму:</span>
                        <span   class="card-text fw-bold fs-5">185 000 Р</span>
                        <br>
                        <span   class="card-text text-secondary">Стоимость доставки: </span>
                        <span   class="card-text fw-bold fs-5">500 Р</span>
                        <hr>
                        <h6 class="card-text fw-bold fs-5 mt-3" >К Оплате</h6>
                        <h6 class="card-text fw-bold fs-4">185 500 Р</h6>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="agreeCheckbox">
                            <label class="form-check-label" for="agreeCheckbox">
                                Я согласен с условиями использования пользовательского соглашения
                            </label>
                        </div>
                        <button class="btn btn-primary text-white btn-block" id="orderButton" disabled>Оформить заказ</button>
                    </div>
                </div>
            </div>
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
