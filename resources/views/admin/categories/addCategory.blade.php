@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Создать категорию</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Создать Категорию</h2>
    @include('components.alerts.alert')

    <div class="card-body">
        <form style="width: 95%" action="{{route('Form_createCategory')}}" class="m-lg-3 col-md-5 " method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Заголовок</label>
                <input name="title" value="{{old('title')}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" >
                @error('title')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Код категории</label>
                <input name="code" value="{{old('code')}}" type="text" class="form-control @error('code') is-invalid @enderror" id="code" >
                @error('code')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Изображение</label>
                <input name="img" class="form-control @error('is_public') is-invalid @enderror" type="file" id="img">
                @error('img')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input name="is_public" class="form-check-input @error('is_public') is-invalid @enderror" type="checkbox"  id="is_public">
                <label class="form-check-label disabled" for="is_public">
                    Опубликовать
                </label>
            </div>
            @error('is_public')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

            <button type="submit" class="btn btn-outline-success">Создать</button>
        </form>
    </div>

@endsection
