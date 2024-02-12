<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="{{route('admin_home')}}" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <img  class="bi me-2" src="{{asset('storage/static/header/alternative-logo.svg')}}" alt="Альтернативный логотип">

        <span class="fs-5 fw-semibold">Панель навигации</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle fs-4 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                Каталог
            </button>
            <div class="collapse" id="home-collapse" >
                <ul class="btn-toggle-nav fs-6 list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="nav-link link-dark rounded">Обзор</a></li>
                    <li><a href="#" class="nav-link link-dark rounded">Неопубликованные</a></li>
                    <li><a href="#" class="nav-link link-dark rounded">Создать...</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button class="btn btn-toggle fs-4 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Товар
            </button>
            <div class="collapse" id="dashboard-collapse">
                <ul class="btn-toggle-nav fs-6 list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="nav-link link-dark rounded">Обзор</a></li>
                    <li><a href="#" class="nav-link link-dark rounded">Неопубликованные</a></li>
                    <li><a href="#" class="nav-link link-dark rounded">Создать...</a></li>
                </ul>
            </div>
        </li>

        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button class="btn btn-toggle fs-4 align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Пользователь
            </button>
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav fs-6 list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="nav-link link-dark rounded">Новый...</a></li>
                    <li><a href="#" class="nav-link link-dark rounded">Профиль</a></li>
                    <li><a href="#" class="nav-link link-dark rounded">Настройка</a></li>
                    <li><a href="#" class="nav-link text-danger link-dark rounded">Выйти</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
