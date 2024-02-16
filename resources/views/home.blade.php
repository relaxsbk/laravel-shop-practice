@extends('templates.main')

@section('title', 'Главная странциа')

@section('main')
    {{--  Карусель  --}}
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
    @endif
    <div id="carouselExampleCaptions" class="carousel slide mb-4 d-none d-lg-block" data-bs-ride="carousel" data-bs-interval="10000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('storage/static/homePage/banner.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start position-absolute ms-3" style="top: 50%; transform: translateY(-50%);">
                    <h5 class="h1 text-black fw-bolder">Realme 10 Pro+ 5G </h5>
                    <p class="h3 text-black fw-bolder">Изогнутый экран, Новый опыт</p>
                    <p class="p-1 text-black h-25">120Hz Curved Vision display | 108MP Pro light Camera</p>
                    <p class="fs-3 fw-bold p-1 text-black">74 999 ₽</p>
                    <a href="#" class="btn btn-dark me-3 btn-sm" >Узнать подробнее</a>
                    <a href="#" class="btn btn-warning btn-sm">Купить</a>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{asset('storage/static/homePage/banner.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start position-absolute ms-3" style="top: 50%; transform: translateY(-50%);">
                    <h5 class="h1 text-black fw-bolder">Realme 10 Pro+ 5G </h5>
                    <p class="h3 text-black fw-bolder">Изогнутый экран, Новый опыт</p>
                    <p class="p-1 text-black h-25">120Hz Curved Vision display | 108MP Pro light Camera</p>
                    <p class="fs-3 fw-bold p-1 text-black">74 999 ₽</p>
                    <a href="#" class="btn btn-dark me-3 btn-sm" >Узнать подробнее</a>
                    <a href="#" class="btn btn-warning btn-sm">Купить</a>
                </div>
            </div>
            <div class="carousel-item active">
                <img src="{{asset('storage/static/homePage/banner.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start position-absolute ms-3" style="top: 50%; transform: translateY(-50%);">
                    <h5 class="h1 text-black fw-bolder">Realme 10 Pro+ 5G </h5>
                    <p class="h3 text-black fw-bolder">Изогнутый экран, Новый опыт</p>
                    <p class="p-1 text-black h-25">120Hz Curved Vision display | 108MP Pro light Camera</p>
                    <p class="fs-3 fw-bold p-1 text-black">74 999 ₽</p>
                    <a href="#" class="btn btn-dark me-3 btn-sm" >Узнать подробнее</a>
                    <a href="#" class="btn btn-warning btn-sm">Купить</a>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>

    {{--Остальной контент--}}
    <div class="container mt-4">

        <h2 class="h2 fw-bold mt-4 mb-4">Популярные категории</h2>
    {{--Карточки категорий--}}

        <div class="d-flex justify-content-between flex-wrap">
            @foreach( $category as $item)
                <a href="{{route('ProductsPage', ['category' => $item->code])}}" class="card me-3 mb-4 text-bg-li card-hover text-decoration-none" style="background-color: white; width: 16rem; height: 16rem;">
                    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                        <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                        <div class="card-body text-center">
                            <p class="card-text fs-5 fw-bold">{{$item->title}}</p>
                        </div>
                    </div>
                </a>
            @endforeach


        </div>

        <h2 class="h2 fw-bold  mb-4">Хиты Продаж</h2>

        <div class="d-flex justify-content-between flex-wrap">
            @foreach($products as $product)
                <div class="card card-hover" style="width: 18rem; background-color: white">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img style="width: 60%" src="{{asset('storage/static/homePage/card/iphone.webp')}}" class="card-img mt-3" alt="product">
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
                                <p class="card-text mt-3 me-3">{{$product->rating}}</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                    <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                </svg>
                                <p class="card-text">21</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <p class="fs-5 card-text mt-3">{{$product->money()}} ₽</p>
                                <div class="d-flex">

                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{route('addToCart', $product->id)}}" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
                                <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>




@endsection
