@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Создать товар</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Создать товар</h2>
    <div class="card-body">
        <form style="width: 95%" action="{{route('create.Product')}}" class="m-lg-3 col-md-5 " method="post" >
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <input name="category" value="{{old('category')}}" type="text" class="form-control @error('category') is-invalid @enderror" id="category" >
                @error('category')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
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
                <label for="model" class="form-label">Модель</label>
                <input name="model" value="{{old('model')}}" type="text" class="form-control @error('model') is-invalid @enderror" id="model" >
                @error('model')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Бренд</label>
                <input name="brand" value="{{old('brand')}}" type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" >
                @error('brand')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <input name="description" value="{{old('name')}}" type="text" class="form-control @error('description') is-invalid @enderror" id="description" >
                @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
{{--                TODO: файл инпут--}}
                <label for="img" class="form-label">Изображение</label>
                <input name="img" value="{{old('img')}}" type="text" class="form-control @error('img') is-invalid @enderror" id="img" >
                @error('img')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input name="price" value="{{old('price')}}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" >
                @error('price')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-outline-success">Создать</button>
        </form>
    </div>

@endsection
