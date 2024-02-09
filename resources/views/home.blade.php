@extends('templates.main')

@section('main')
    <div id="carouselExampleCaptions" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="10000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('storage/static/homePage/banner.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start position-absolute ms-3" style="top: 25%;">
                    <h5 class="h1 text-black fw-bolder">Realme 10 Pro+ 5G </h5>
                    <p class="h3 text-black fw-bolder">Изогнутый экран, Новый опыт</p>
                    <p class="p-1 text-black h-25">120Hz Curved Vision display | 108MP Pro light Camera</p>
                    <p class="fs-3 fw-bold p-1 text-black">74 999 ₽</p>
                    <a href="#" class="btn btn-dark me-3" >Узнать подробнее</a>
                    <a href="#" class="btn btn-warning">Купить</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/static/homePage/banner.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start position-absolute ms-3" style="top: 25%;">
                    <h5 class="h1 text-black fw-bolder">Realme 10 Pro+ 5G </h5>
                    <p class="h3 text-black fw-bolder">Изогнутый экран, Новый опыт</p>
                    <p class="p-1 text-black h-25">120Hz Curved Vision display | 108MP Pro light Camera</p>
                    <p class="fs-3 fw-bold p-1 text-black">74 999 ₽</p>
                    <a href="#" class="btn btn-dark me-3" >Узнать подробнее</a>
                    <a href="#" class="btn btn-warning">Купить</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/static/homePage/banner.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block text-start position-absolute ms-3" style="top: 25%;">
                    <h5 class="h1 text-black fw-bolder">Realme 10 Pro+ 5G </h5>
                    <p class="h3 text-black fw-bolder">Изогнутый экран, Новый опыт</p>
                    <p class="p-1 text-black h-25">120Hz Curved Vision display | 108MP Pro light Camera</p>
                    <p class="fs-3 fw-bold p-1 text-black">74 999 ₽</p>
                    <a href="#" class="btn btn-dark me-3" >Узнать подробнее</a>
                    <a href="#" class="btn btn-warning">Купить</a>
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

    <div class="container">
        <h2 class="h2 fw-bold"> Популярные категории</h2>
    </div>

@endsection
