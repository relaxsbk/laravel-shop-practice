@extends('templates.main')

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
                    <form style="width: 95%" action="*" class="m-lg-3 col-md-5 " method="post" >
                        @csrf
                        @error('auth_error')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Имя</label>
                            <input name="firstname" value="{{old('firstname')}}" type="text" class="form-control @error('email') is-invalid @enderror" id="firstname" >
                            @error('firstname')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Фамилия</label>
                            <input name="lastname" value="{{old('email')}}" type="text" class="form-control @error('email') is-invalid @enderror" id="lastname" >
                            @error('lastname')
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
                        <div class="form-check mb-3">
                            <input name="check" class="form-check-input" type="checkbox" value="" id="check">
                            <label class="form-check-label" for="check">
                                Запомнить меня
                            </label>
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
