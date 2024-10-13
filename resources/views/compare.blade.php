@extends('templates.main')

@section('title', 'Сравнение товаров | ГиперКвант')

@section('main')

    <div class="container mt-5 mb-3">
        <h2 class="h1">Сравнение товаров

            @if(!$compare->isEmpty())
                <a class="fs-6 text-decoration-none" href="{{route('clearCompare')}}">очистить</a>
            @endif

        </h2>
    </div>

    <div class="container">


        @if($compare->isEmpty())
            <h2>Товаров в сравнении нет!</h2>
        @else


            <hr>


            <div class="d-flex justify-content-between flex-wrap">
                @foreach($compare->get() as $product)
                    <form id="add-to-cart-form" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <form id="add-to-favorite-btn" method="POST" style="display: none;">
                        @csrf
                    </form>


                    <div id="card-product" class="card card-hover mb-2" style="width: 18rem; background-color: white">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img style="width: 60%; height: 200px;" src="{{$product->img}}" class="card-img mt-3" alt="product">
                            <div class="card-body w-100">
                                <h5 class="fs-6 text-secondary card-title">
                                    {{$product->category->title}}

                                </h5>
                                <p class="fs-5 card-text">
                                    <a href="{{route('Product', ['category' => $product->category->code, 'product' => $product->id])}}"  class="custom-link">{{$product->title}} {{$product->model}}</a>
                                </p>
                                <div class="d-flex align-items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <p class="card-text mt-3 me-3">{{ number_format($product->rating, 1) }}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                    </svg>
                                    <p class="card-text">{{ $product->reviews->count()}}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="fs-5 card-text mt-3">{{$product->money()}} ₽</p>
                                    <div class="d-flex">

                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    @php
                                        $inCart = false;
                                        if(session()->has('cart')) {
                                            foreach ($cart->get() as $cartItem) {
                                                if ($cartItem->id === $product->id) {
                                                    $inCart = true;
                                                    break;
                                                }
                                            }
                                        }
                                    @endphp

                                    @if($inCart)
                                        <a href="{{ route('cart') }}" class="btn btn-outline-success flex-grow-1 me-2">В корзине</a>
                                    @else
                                        <button class="btn btn-outline-primary flex-grow-1 me-2 add-to-cart-btn" data-id="{{ $product->id }}">Купить</button>
                                        {{--                                    <button class="btn btn-outline-primary flex-grow-1 me-2 add-to-cart-btn">Купить</button>--}}
                                    @endif


                                    @php
                                        $inFavorite = false;
                                        if(session()->has('favorite')) {
                                            foreach ($favorite->get() as $favoriteItem) {
                                                if ($favoriteItem->id === $product->id) {
                                                    $inFavorite = true;
                                                    break;
                                                }
                                            }
                                        }
                                    @endphp

                                    @php
                                        $inCompare = false;

                                        if(session()->has('compare')) {
                                            foreach ($compare->get() as $compareItem) {
                                                if ($compareItem->id === $product->id) {
                                                    $inCompare = true;
                                                    break;
                                                }
                                            }
                                        }
                                    @endphp


                                    @if($inCompare)
                                        <a href="{{route('removeCompare', $product->id)}}" class="btn btn-primary me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                                <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                                            </svg>
                                        </a>
                                    @else
                                        <button class="btn btn-outline-primary me-2 add-to-compare-btn" data-id="{{ $product->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                                                <path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
                                            </svg>
                                        </button>

                                    @endif


                                @if($inFavorite)
                                        <a href="{{route('favorites', $product->id)}}" class="btn btn-danger me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path d="M8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg>
                                        </a>
                                    @else
                                        <button class="btn btn-outline-danger me-2 add-to-favorite-btn" data-id="{{ $product->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                            </svg>
                                        </button>

                                    @endif


                                </div>
                                <hr>
                                <div class="product-characteristics">
                                    <h6 class="text-secondary">Характеристики:</h6>
                                    <ul class="list-group">
                                        @if(empty($product->characteristics->characteristics))
                                            Характеристики пока что нет
                                        @else

                                        @foreach($product->characteristics->characteristics as $key => $value)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>{{ $key }}</span>
                                                <span>{{ $value }}</span>
                                            </li>
                                        @endforeach

                                        @endif
                                        {{--                                    <li class="list-group-item d-flex justify-content-between align-items-center">--}}
                                        {{--                                        <span>Блюпуп</span>--}}
                                        {{--                                        <span>да</span>--}}
                                        {{--                                    </li>--}}
                                        {{--                                    <li class="list-group-item d-flex justify-content-between align-items-center">--}}
                                        {{--                                        <span>Блюпуп</span>--}}
                                        {{--                                        <span>да</span>--}}
                                        {{--                                    </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        @endif


    </div>

@endsection
