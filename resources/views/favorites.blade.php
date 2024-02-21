@extends('templates.main')

@section('title', 'Избранное')


@section('main')



    <div class="container mt-5">

        <nav class="fs-6 mt-4 mb-" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item active" aria-current="page">Избранное</li>
            </ol>
        </nav>

        <h2 class="h2 fw-bold mt-4 mb-4">
            Избранное
            @if($favoriteItem > 0)
                <span class="fs-3">({{$favoriteItem}})</span>

            @endif
            @if(!$favorite->isEmpty())
                <a class="fs-6 text-decoration-none" href="{{route('favorites.clear')}}">очистить</a>
            @endif
        </h2>


        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>
            @endif
                @if(session()->has('message_errors'))
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('message_errors')}}
                    </div>
                @endif
            @if($favorite->isEmpty())
                <h1>В избранном пусто!</h1>
            @else
                <div class="col">
                    <!-- Карточки товаров -->
                    @foreach($favorite->get() as $item)
                        <div class="card bg-white border mb-3" style="max-width: 100%;">
                            <div class="card-body row align-items-center">
                                <div class="col-auto">
                                    <img src="{{$item->img}}" alt="Product Image" class="img-fluid" style="width: 100px; height: 100%;">
                                </div>
                                <div class="col">
                                    <h5 class="card-title mb-0 text-decoration-none"><a href="{{ route('Product', ['category' => $item->category->code, 'product' => $item->id]) }}">{{$item->title}}</a></h5>
                                </div>
                                <div class="col-auto mr-3">
                                        <p  class="card-title mb-0"> 1 Шт.</p>
                                </div>
                                <div class="col-auto mr-3">
                                    <p class="card-text mb-0">{{$item->money()}} ₽</p>
                                </div>
                                <div class="col-auto">
                                    <a href="{{route('favorites.remove', $item->id)}}" class="btn btn-danger">Удалить</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            @endif

        </div>
    </div>









@endsection
