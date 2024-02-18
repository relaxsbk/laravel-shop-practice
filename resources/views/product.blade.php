@extends('templates.main')

@section('title', $product->title)

@section('main')
    <div class="container mt-4">
        <nav class="fs-6 mt-4 mb-" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item"><a href="{{route('CatalogPage')}}">Каталог товаров</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
            </ol>
        </nav>
    </div>


    <div class="container mt-5">
        @if(session()->has('message_errors'))
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    {{session()->get('message_errors')}}
                </div>
            </div>
        @endif
        <div class="d-flex flex-column flex-md-row">
            <div class="flex-shrink-0 pe-lg-4 mb-3 mb-md-0" style="max-width: 100%;">
                <img src="{{$product->img}}" class="img-fluid w-100" style="max-width: 366px; height: auto;" alt="Product Image">
            </div>
            <div class="flex-grow-1 ps-lg-4">
                <div class="d-flex flex-column">
                    <div class="card card-hover mb-3" style="background-color: white;">
                        <div class="card-body">
                            <h1 class="h2 ">{{$product->title}} {{$product->brand->name}} {{$product->model}} 512Gb, A3108, синий титан</h1>
                            <p class="fs-5 text-secondary">8 ГБ, 2 SIM, OLED, 2796x1290, камера 48+12+12 Мп, NFC, 5G, GPS, 4441 мА*ч</p>
                            <div class="mb-3">
                                <div class="d-flex">
                                    <div class="btn btn-secondary me-2 color-option mr-2"></div>
                                    <div class="btn btn-primary me-2 color-option mr-2"></div>
                                    <div class="btn btn-warning me-2 color-option"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                                <p class="card-text mt-3 me-3">{{$product->rating}}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                </svg>
                                <p class="card-text ">{{ $product->reviews->count()}}</p>

                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="fs-5 card-text mt-3 me-5">{{$product->money()}} ₽</p>
{{--                                Отправка в корзину--}}
                                <a href="{{route('addToCart', $product->id)}}" class="btn btn-primary text-white flex-grow-1 me-5">Купить</a>
                                <button type="button" class="btn btn-outline-danger ms-auto disabled" data-bs-toggle="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                    </svg>
                                    В избранное
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="text-block mb-3">
                                <h3 class="fs-5 fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                    </svg>
                                    Доставка
                                </h3>
                                <p>
                                    Доставим по всей России в течение<br>
                                    нескольких дней. Стоимость доставки<br>
                                    в свой город уточняйте у менеджера.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="text-block mb-3">
                                <h3 class="fs-5 fw-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                    </svg>
                                    Оплата
                                </h3>
                                <p>
                                    Принимаем к оплате как наличный,<br>
                                    так и безналичный расчёт. Возможна <br>
                                    оплата электронными кошельками.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <div class="accordion w-100" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingCharacteristics">
                        <button class="accordion-button fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCharacteristics" aria-expanded="true" aria-controls="collapseCharacteristics">
                            Характеристики
                        </button>
                    </h2>
                    <div id="collapseCharacteristics" class="accordion-collapse collapse show" aria-labelledby="headingCharacteristics" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <!-- Здесь разместите контент с характеристиками -->
                            <p>Характеристика 1: Значение 1</p>
                            <p>Характеристика 2: Значение 2</p>
                            <p>Характеристика 3: Значение 3</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingReviews">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReviews" aria-expanded="false" aria-controls="collapseReviews">
                            Отзывы
                        </button>
                    </h2>
                    <div id="collapseReviews" class="accordion-collapse collapse" aria-labelledby="headingReviews" data-bs-parent="#accordionExample">
                        <div class="accordion-body fs-5">
                            @if($reviews->count() === 0)
                                <p>Отзывов пока нет </p>
                            @else
                                @foreach($reviews as $review)
                                    <div class="border-bottom border-body">
                                        <div class="user-rating">
                                            <p><span class="fw-bold">{{$review->user->name}}</span> - Оценка: {{$review->rating}}</p>
                                        </div>
                                        <p>
                                            {{$review->review}}
                                        </p>
                                    </div>
                                @endforeach
                            @endif


{{--                            <div class="border-bottom border-body">--}}
{{--                                <div class="user-rating">--}}
{{--                                    <p><span class="fw-bold">Пользователь 2</span> - Оценка: 4</p>--}}
{{--                                </div>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet,--}}
{{--                                    consectetur adipisicing elit. Adipisci aliquid autem dolorum eligendi magnam nesciunt--}}
{{--                                    nostrum obcaecati quis, reprehenderit sunt!--}}
{{--                                    Ad dolore doloremque id laboriosam necessitatibus nemo rem sint ullam.--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                            <div class="border-bottom border-body">--}}
{{--                                <div class="user-rating">--}}
{{--                                    <p><span class="fw-bold">Пользователь 10</span> - Оценка: 2</p>--}}
{{--                                </div>--}}
{{--                                <p>--}}
{{--                                    Lorem ipsum dolor sit amet,--}}
{{--                                    consectetur adipisicing elit. Adipisci aliquid autem dolorum eligendi magnam nesciunt--}}
{{--                                    nostrum obcaecati quis, reprehenderit sunt!--}}
{{--                                    Ad dolore doloremque id laboriosam necessitatibus nemo rem sint ullam.--}}
{{--                                </p>--}}
{{--                            </div>--}}
                </div>
        </div>
    </div>
@endsection
