@extends('templates.main')

@section('title', 'Регистрация')

@section('main')
    <div class="container mt-5">

        <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
                <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="card p-0" style="width: 40rem; background-color: #e4f1f1 ">
                <div class="card-header w-100">
                    <h2 class="m-lg-3">Регистрация</h2>
                </div>
                <div class="card-body">
                    <form style="width: 95%" action="{{route('createUser')}}" class="m-lg-3 col-md-5 " method="post" >
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Имя</label>
                            <input name="name" value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" >
                            @error('name')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Фамилия</label>
                            <input name="surname" value="{{old('surname')}}" type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" >
                            @error('surname')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="login" class="form-label">Логин</label>
                            <input name="login" value="{{old('login')}}" type="text" class="form-control @error('login') is-invalid @enderror" id="login" >
                            @error('login')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Адрес электронной почты</label>
                            <input name="email" value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" >
                            @error('email')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input name="password"  type="password" class="form-control @error('password') is-invalid @enderror" id="password" >
                            @error('password')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="repeat_password" class="form-label">Подтверждение пароля</label>
                            <input name="repeat_password"  type="password" class="form-control @error('repeat_password') is-invalid @enderror" id="repeat_password" >
                            @error('repeat_password')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-outline-success">Зарегистрироваться</button>
                    </form>
                </div>

            </div>
            <div class="d-flex justify-content-center">
                <p>У меня уже есть  <a style="text-decoration: none" href="{{route('login')}}">аккаунт</a> </p>
            </div>

        </div>


@endsection
