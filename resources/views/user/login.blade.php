@extends('templates.main')

@section('title', 'Авторизация')

@section('main')
   <div class="container mt-5">

       <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
           <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
               <li class="breadcrumb-item active" aria-current="page">Авторизация</li>
           </ol>
       </nav>

       @if(session()->has('message_errors'))
           <div class="alert alert-danger" role="alert">
               <div class="container">
                   {{session()->get('message_errors')}}
               </div>
           </div>
       @endif

       @if(session()->has('invalid'))
           <div class="alert alert-danger" role="alert">
               {{session()->get('invalid')}}
           </div>
       @endif

       <div class="row justify-content-center">
           <div class="card p-0" style="width: 40rem; background-color: #e4f1f1 ">
               <div class="card-header w-100">
                   <h2 class="m-lg-3">Вход</h2>
               </div>
               <div class="card-body">
                   <form style="width: 95%" action="{{route('loginUser')}}" class="m-lg-3 col-md-5 " method="post" >
                       @csrf

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
                       <button type="submit" class="btn btn-outline-success">Войти</button>
                   </form>
               </div>

           </div>
           <div class="d-flex justify-content-center">
               <p>У меня нет аккаунта - <a style="text-decoration: none" href="{{route('register')}}">Зарегистрироваться</a> </p>
           </div>

       </div>


@endsection
