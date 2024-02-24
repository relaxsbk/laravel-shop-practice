@extends('templates.main')

@section('title', $category->title . " " . "Купить в интернет-магазине ГиперКвант." . " ". "| " . "Страница" . " " . $products->currentPage() . " " . "из". " ". $products->lastPage())

@section('meta')
    <link rel="canonical" href="{{ $products->currentPage() === 1 ? route('ProductsPage', $category->code) : route('ProductsPage', ['category' => $category->code, 'page' => $products->currentPage()]) }}">
@endsection

@section('main')

    <div class="container mt-4">
        <nav class="fs-6 mt-4 mb-" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('HomePage') }}">ГиперКвант</a></li>
                <li class="breadcrumb-item"><a href="{{ route('CatalogPage') }}">Каталог товаров</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
            </ol>
        </nav>
    </div>

    <div class="container mt-5">
        @if(session()->has('message_errors'))
            <div class="alert alert-danger" role="alert">
                <div class="container">
                    {{ session()->get('message_errors') }}
                </div>
            </div>
        @endif
        <h2 class="h2 fw-bold mt-4 mb-4">{{ $category->title }}</h2>
        <div class="row">
            {{-- Фильтры --}}
            <div class="col-lg-3">
                <div class="card">
                    <div style="background-color: #CBF3F3" class="card-header">
                        <button style="text-decoration: none; "  class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#filtersCollapse" aria-expanded="true" aria-controls="filtersCollapse">
                            Настройки фильтров
                        </button>
                    </div>
                    <div class="card-body collapse show" id="filtersCollapse">
                        <form action="{{ route('ProductsPage', $category->code) }}" method="GET">
                            {{-- Фильтр по цене --}}
                            <div class="input-group mb-3">
                                <span class="input-group-text">от</span>
                                <input type="number" class="form-control" name="min_price" placeholder="0" value="{{ request()->input('min_price') }}">
                                <span class="input-group-text">-</span>
                                <input type="number" class="form-control" name="max_price" placeholder="999999" value="{{ request()->input('max_price') }}">
                            </div>

                            {{-- Фильтр по брендам --}}
                            <div class="card mt-3">
                                <div style="background-color: #CBF3F3" class="card-header">
                                    <button style="text-decoration: none; " class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#brandFilter" aria-expanded="true" aria-controls="brandFilter">
                                        Бренд
                                    </button>
                                </div>
                                <div class="card-body collapse" id="brandFilter">
                                    @foreach($brands as $brand)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="brands[]" value="{{ $brand->id }}" id="brand{{ $brand->id }}" {{ request()->has('brands') && in_array($brand->id, request()->input('brands')) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="brand{{ $brand->id }}">
                                                {{ $brand->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Фильтр по названию --}}
                            <div class="card mt-3">
                                <div style="background-color: #CBF3F3" class="card-header">
                                    <button style="text-decoration: none; " class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#featuresFilter" aria-expanded="true" aria-controls="featuresFilter">
                                        Название
                                    </button>
                                </div>
                                <div class="card-body collapse" id="featuresFilter">
                                    <label>
                                        <select class="form-select mb-3" name="name_order">
                                            <option selected></option>
                                            <option value="1" {{ request()->input('name_order') == '1' ? 'selected' : '' }}>В алфавитном порядке</option>
                                            <option value="2" {{ request()->input('name_order') == '2' ? 'selected' : '' }}>В обратном алфавитном порядке</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary text-white w-100 mt-3">Применить</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Товары --}}
            <div class="col-lg-9">
                <div class="row row-cols-1 row-cols-md-3 g-4 align-items-stretch">
                    @foreach($products as $product)
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="card card-hover align-items-start" style="background-color: white; min-height: 100%">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img style="width: 60%" src="{{ $product->img }}" class="card-img mt-3" alt="product">
                                    <div class="card-body d-flex flex-column  w-100">
                                        <h5 class="fs-6 text-secondary card-title">
                                            {{ $product->category->title }}
                                        </h5>
                                        <h5 class="fs-6 text-secondary card-title">
                                            {{ $product->brand->name }}
                                        </h5>
                                        <p class="fs-5 card-text">
                                            <a href="{{ route('Product', ['category' => $product->category->code, 'product' => $product->id]) }}" class="custom-link">{{ $product->title }}</a>
                                        </p>
                                        <div class="d-flex align-items-center mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <p class="card-text mt-3 me-3">{{ number_format($product->rating, 1) }}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                                <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                            </svg>
                                            <p class="card-text">{{ $product->reviews->count() }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <p class="fs-5 card-text mt-3">{{ $product->money() }} ₽</p>
                                            <div class="d-flex">
                                                <!-- Добавьте дополнительные элементы управления, если необходимо -->
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
                                                <a href="{{ route('cart', $product->id) }}" class=" btn btn-outline-success flex-grow-1 me-2">В корзине</a>
                                            @else
                                                <a href="{{ route('addToCart', $product->id) }}" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
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

                                            @if($inFavorite)
                                                <a href="{{route('favorites', $product->id)}}" class="btn btn-danger me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                                    </svg>
                                                </a>
                                            @else
                                                <a href="{{route('addToFavorites', $product->id)}}" class="btn btn-outline-danger me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links('pagination::bootstrap-5') }}
                @if($products->currentPage() === 1)
                    <div class="container">
                        <p class="fs-5">{{$category->description}}</p>
                    </div>
                @endif
            </div>

        </div>

    </div>

@endsection
