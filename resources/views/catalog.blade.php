@extends('templates.main')

@section('main')
    <div class="container mt-4">

        <nav class="fs-6 mt-4 mb-" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item active" aria-current="page">Каталог товаров</li>
            </ol>
        </nav>

        <h2 class="h2 fw-bold mt-4 mb-4">Каталог товаров</h2>
        {{--Карточки категорий--}}

        <div class="d-flex justify-content-between flex-wrap">
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>
            <a href="{{route('ProductsPage')}}" class="card me-3 mb-4 text-bg-li card-hover" style="background-color: white; width: 16rem; height: 16rem; text-decoration: none">
                <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
                    <img style="width: 50%" src="{{asset('storage/static/homePage/category-smartphone.png')}}" class="card-img-top mt-3" alt="category">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 fw-bold">Смартфоны</p>
                    </div>
                </div>
            </a>

        </div>

    </div>


@endsection
