@extends('templates.main')

@section('main')

    <div class="container mt-4">
        <nav class="fs-6 mt-4 mb-" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item"><a href="{{route('CatalogPage')}}">Каталог товаров</a></li>
                <li class="breadcrumb-item active" aria-current="page">Смартфоны</li>
            </ol>
        </nav>
    </div>

    <div  class="container mt-5">
        <div  class="row">
{{--            фильтры--}}
            <div class="col-lg-3">
                <div class="card">
                    <div style="background-color: #CBF3F3" class="card-header">
                        <button style="text-decoration: none; "  class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#priceFilter" aria-expanded="true" aria-controls="priceFilter">
                            Цена
                        </button>
                    </div>
                    <div class="card-body collapse show" id="priceFilter">
                        <div class="input-group mb-3">
                            <span class="input-group-text">от</span>
                            <input type="text" class="form-control" placeholder="2000">
                            <span class="input-group-text">-</span>
                            <span class="input-group-text">до</span>
                            <input type="text" class="form-control" placeholder="999999">
                        </div>
                        <input type="range" class="form-range mb-3">
                        <button class="btn btn-primary text-white w-100">Применить</button>
                    </div>
                </div>

                <div class="card mt-3">
                    <div style="background-color: #CBF3F3" class="card-header">
                        <button style="text-decoration: none; " class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#brandFilter" aria-expanded="true" aria-controls="brandFilter">
                            Бренд
                        </button>
                    </div>
                    <div class="card-body collapse" id="brandFilter">
                        <label>
                            <select class="form-select mb-3">
                                <option selected>Выберите бренд</option>
                                <option value="1">Iphone</option>
                                <option value="2">Samsung</option>
                                <option value="3">Realmy</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="card mt-3">
                    <div style="background-color: #CBF3F3" class="card-header">
                        <button style="text-decoration: none; " class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#featuresFilter" aria-expanded="true" aria-controls="featuresFilter">
                            Объем встроенной памяти (ГБ)
                        </button>
                    </div>
                    <div class="card-body collapse" id="featuresFilter">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                16 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                32 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                64 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                128 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                256 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                512 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                1024 ГБ
                            </label>
                        </div>

                    </div>
                </div>
                <div class="card mt-3">
                    <div style="background-color: #CBF3F3" class="card-header">
                        <button style="text-decoration: none; " class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#RAM" aria-expanded="true" aria-controls="featuresFilter">
                            Объем оперативной памяти (ГБ)
                        </button>
                    </div>
                    <div class="card-body collapse" id="RAM">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                2 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                3 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                4 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                6 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                8 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                12 ГБ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                16 ГБ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div style="background-color: #CBF3F3" class="card-header">
                        <button style="text-decoration: none; " class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#NFC" aria-expanded="true" aria-controls="featuresFilter">
                            NFC
                        </button>
                    </div>
                    <div class="card-body collapse" id="NFC">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Есть
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Нет
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div style="background-color: #CBF3F3" class="card-header">
                        <button style="text-decoration: none; " class="btn btn-link text-black w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#Vsync" aria-expanded="true" aria-controls="featuresFilter">
                            Частота обновления экрана (Гц)
                        </button>
                    </div>
                    <div class="card-body collapse" id="Vsync">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                60 Гц
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                90 Гц
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                120 Гц
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                144 Гц
                            </label>
                        </div>
                    </div>
                </div>
            </div>
{{--            товары--}}
            <div class=" col-lg-9 mx-md-auto">
               <div class="row row-cols-1 row-cols-md-3 g-4">
                   <div class="col mb-4">
                       <div class="card card-hover" style="width: 18rem; background-color: white">
                           <div class="d-flex flex-column justify-content-center align-items-center">
                               <img style="width: 60%" src="{{asset('storage/static/homePage/card/iphone.webp')}}" class="card-img mt-3" alt="product">
                               <div class="card-body">
                                   <h5 class="fs-6 text-secondary card-title">Смартфон</h5>
                                   <p class="fs-5 card-text">Смартфон Apple iPhone 15 Pro Max 256Gb, A3108</p>
                                   <div class="d-flex align-items-center mb-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                           <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                       </svg>
                                       <p class="card-text mt-3 me-3">5</p>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                           <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                       </svg>
                                       <p class="card-text">21</p>
                                   </div>
                                   <div class="d-flex justify-content-between align-items-center mb-2">
                                       <p class="fs-5 card-text mt-3">55 550 Р</p>
                                       <div class="d-flex">


                                           <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="button">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                   <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                               </svg>
                                           </button>

                                       </div>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                       <a href="#" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
                                       <a href="#" class="btn btn-primary me-2 align-items-center" role="button" data-bs-toggle="button" >
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3 " viewBox="0 0 16 16">
                                               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                           </svg>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col mb-4">
                       <div class="card card-hover" style="width: 18rem; background-color: white">
                           <div class="d-flex flex-column justify-content-center align-items-center">
                               <img style="width: 60%" src="{{asset('storage/static/homePage/card/iphone.webp')}}" class="card-img mt-3" alt="product">
                               <div class="card-body">
                                   <h5 class="fs-6 text-secondary card-title">Смартфон</h5>
                                   <p class="fs-5 card-text">Смартфон Apple iPhone 15 Pro Max 256Gb, A3108</p>
                                   <div class="d-flex align-items-center mb-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                           <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                       </svg>
                                       <p class="card-text mt-3 me-3">5</p>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                           <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                       </svg>
                                       <p class="card-text">21</p>
                                   </div>
                                   <div class="d-flex justify-content-between align-items-center mb-2">
                                       <p class="fs-5 card-text mt-3">55 550 Р</p>
                                       <div class="d-flex">


                                           <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="button">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                   <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                               </svg>
                                           </button>

                                       </div>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                       <a href="#" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
                                       <a href="#" class="btn btn-primary me-2 align-items-center" role="button" data-bs-toggle="button" >
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3 " viewBox="0 0 16 16">
                                               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                           </svg>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col mb-4">
                       <div class="card card-hover" style="width: 18rem; background-color: white">
                           <div class="d-flex flex-column justify-content-center align-items-center">
                               <img style="width: 60%" src="{{asset('storage/static/homePage/card/iphone.webp')}}" class="card-img mt-3" alt="product">
                               <div class="card-body">
                                   <h5 class="fs-6 text-secondary card-title">Смартфон</h5>
                                   <p class="fs-5 card-text">Смартфон Apple iPhone 15 Pro Max 256Gb, A3108</p>
                                   <div class="d-flex align-items-center mb-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                           <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                       </svg>
                                       <p class="card-text mt-3 me-3">5</p>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                           <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                       </svg>
                                       <p class="card-text">21</p>
                                   </div>
                                   <div class="d-flex justify-content-between align-items-center mb-2">
                                       <p class="fs-5 card-text mt-3">55 550 Р</p>
                                       <div class="d-flex">


                                           <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="button">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                   <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                               </svg>
                                           </button>

                                       </div>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                       <a href="#" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
                                       <a href="#" class="btn btn-primary me-2 align-items-center" role="button" data-bs-toggle="button" >
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3 " viewBox="0 0 16 16">
                                               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                           </svg>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col mb-4">
                       <div class="card card-hover" style="width: 18rem; background-color: white">
                           <div class="d-flex flex-column justify-content-center align-items-center">
                               <img style="width: 60%" src="{{asset('storage/static/homePage/card/iphone.webp')}}" class="card-img mt-3" alt="product">
                               <div class="card-body">
                                   <h5 class="fs-6 text-secondary card-title">Смартфон</h5>
                                   <p class="fs-5 card-text">Смартфон Apple iPhone 15 Pro Max 256Gb, A3108</p>
                                   <div class="d-flex align-items-center mb-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                           <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                       </svg>
                                       <p class="card-text mt-3 me-3">5</p>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                           <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                       </svg>
                                       <p class="card-text">21</p>
                                   </div>
                                   <div class="d-flex justify-content-between align-items-center mb-2">
                                       <p class="fs-5 card-text mt-3">55 550 Р</p>
                                       <div class="d-flex">


                                           <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="button">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                   <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                               </svg>
                                           </button>

                                       </div>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                       <a href="#" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
                                       <a href="#" class="btn btn-primary me-2 align-items-center" role="button" data-bs-toggle="button" >
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3 " viewBox="0 0 16 16">
                                               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                           </svg>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col mb-4">
                       <div class="card card-hover" style="width: 18rem; background-color: white">
                           <div class="d-flex flex-column justify-content-center align-items-center">
                               <img style="width: 60%" src="{{asset('storage/static/homePage/card/iphone.webp')}}" class="card-img mt-3" alt="product">
                               <div class="card-body">
                                   <h5 class="fs-6 text-secondary card-title">Смартфон</h5>
                                   <p class="fs-5 card-text">Смартфон Apple iPhone 15 Pro Max 256Gb, A3108</p>
                                   <div class="d-flex align-items-center mb-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                           <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                       </svg>
                                       <p class="card-text mt-3 me-3">5</p>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                           <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                       </svg>
                                       <p class="card-text">21</p>
                                   </div>
                                   <div class="d-flex justify-content-between align-items-center mb-2">
                                       <p class="fs-5 card-text mt-3">55 550 Р</p>
                                       <div class="d-flex">


                                           <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="button">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                   <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                               </svg>
                                           </button>

                                       </div>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                       <a href="#" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
                                       <a href="#" class="btn btn-primary me-2 align-items-center" role="button" data-bs-toggle="button" >
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3 " viewBox="0 0 16 16">
                                               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                           </svg>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col mb-4">
                       <div class="card card-hover" style="width: 18rem; background-color: white">
                           <div class="d-flex flex-column justify-content-center align-items-center">
                               <img style="width: 60%" src="{{asset('storage/static/homePage/card/iphone.webp')}}" class="card-img mt-3" alt="product">
                               <div class="card-body">
                                   <h5 class="fs-6 text-secondary card-title">Смартфон</h5>
                                   <p class="fs-5 card-text">Смартфон Apple iPhone 15 Pro Max 256Gb, A3108</p>
                                   <div class="d-flex align-items-center mb-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" class="bi bi-star-fill me-1" viewBox="0 0 16 16">
                                           <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                       </svg>
                                       <p class="card-text mt-3 me-3">5</p>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-chat-fill me-1" viewBox="0 0 16 16">
                                           <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15"/>
                                       </svg>
                                       <p class="card-text">21</p>
                                   </div>
                                   <div class="d-flex justify-content-between align-items-center mb-2">
                                       <p class="fs-5 card-text mt-3">55 550 Р</p>
                                       <div class="d-flex">


                                           <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="button">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                   <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                               </svg>
                                           </button>

                                       </div>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                       <a href="#" class="btn btn-outline-primary flex-grow-1 me-2">Купить</a>
                                       <a href="#" class="btn btn-primary me-2 align-items-center" role="button" data-bs-toggle="button" >
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3 " viewBox="0 0 16 16">
                                               <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                           </svg>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
                <div class="d-flex justify-content-center mt-3">
                    <!-- Кнопка "Показать ещё" -->
                    <button class="btn btn-primary text-white w-25">Показать ещё</button>
                </div>

            </div>
        </div>
    </div>

@endsection