<nav style="background-color: #f9f7f7 " class="navbar navbar-expand-lg  border-bottom border-body mb-4 fixed-top">
    <div class="container">
        <a class="navbar-brand h-5 " href="{{route('HomePage')}}">
            <img class="primary-logo" src="{{asset('storage/static/header/logo-name.svg')}}" alt="Основной логотип">
            <img class="secondary-logo" src="{{asset('storage/static/header/alternative-logo.svg')}}" alt="Альтернативный логотип">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @style(['color: white', 'white-space: nowrap'])  class="btn btn-primary me-3 d-flex align-items-center" aria-current="page" href="{{route('CatalogPage')}}"  >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list me-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                        Каталог товаров
                    </a>
                </li>
            </ul>
            <form action="{{ route('search') }}" class="d-flex w-100 align-items-center" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Поиск" name="search" @if(isset($_GET['search'])) value="{{$_GET['search']}}" @endif required>
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
            <ul class="navbar-nav ms-3 me-auto mb-2 mb-lg-0 mt-md-3 mt-sm-3  d-flex align-items-center">
                <li class="nav-item me-lg-3">
                    <a href="{{route('favorites')}}"  class="position-relative text-decoration-none ">
                        <div class="d-flex flex-column align-items-center">
                            <img style="width: 20px;" src="{{asset('storage/static/header/heart.svg')}}" alt="heart">
                            <span class="ms-1 text-dark">Избранное</span>
                        </div>
                        @if(isset($favoritesCount) && $favoritesCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{$favoritesCount}}
                            <span class="visually-hidden">товары в корзине</span>
                          </span>
                        @endif

                    </a>
                </li>
                <li class="nav-item m-auto m-lg-auto m-sm-auto">
                    <a href="{{route('cart')}}"  class="position-relative text-decoration-none ">
                        <div class="d-flex flex-column align-items-center">
                            <img style="width: 20px;" src="{{asset('storage/static/header/basket.svg')}}" alt="heart">
                            <span class="ms-1 text-dark">Корзина</span>
                        </div>
                        @if(isset($itemsCount) && $itemsCount > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{$itemsCount}}
                            <span class="visually-hidden">товары в корзине</span>
                          </span>
                        @endif

                    </a>
                </li>
                <li class="nav-item ms-lg-3">
                    @if(auth()->guest())
                        <a class="nav-link active d-flex align-items-center" aria-current="page" href="{{route('login')}}">
                            <div class="d-flex flex-column align-items-center">
                                <img style="width: 20px;" src="{{asset('storage/static/header/profile.svg')}}" alt="heart">
                                <span class="ms-1">Аккаунт</span>
                            </div>
                        </a>
                    @else

                        <a class="nav-link active d-flex align-items-center" aria-current="page" href="{{route('profile')}}">
                            <div class="d-flex flex-column align-items-center">
                                <img style="width: 20px;" src="{{asset('storage/static/header/profile.svg')}}" alt="heart">
                                <span class="ms-1 fw-bold">{{auth()->user()->login}}</span>
                            </div>
                        </a>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>
