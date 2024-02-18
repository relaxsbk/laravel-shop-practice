@extends('templates.main')

@section('title', 'Профиль |')


@section('main')
    <div class="container mt-5">

        <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item active" aria-current="page">Профиль</li>
            </ol>
        </nav>

        @if(session()->has('invalid'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('invalid')}}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="card p-0" style="width: 40rem; background-color: #e4f1f1 ">
                <div class="card-header w-100">
                    <h2 class="m-lg-3">Профиль</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p class="fs-5">Добро пожаловать в свой профиль NAME SURNAME !</p>
                    </div>
                    <div class="mb-3">
                        <p>login</p>
                    </div>
                    <div class="mb-3">
                        <p>email</p>
                    </div>
                    <div class="mb-3">
                        <p class="fs-1 fw-bold" >Придумать отображение заказов</p>
                    </div>
                    <form action="*">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Выйти</button>
                    </form>
                </div>

            </div>


        </div>


@endsection
