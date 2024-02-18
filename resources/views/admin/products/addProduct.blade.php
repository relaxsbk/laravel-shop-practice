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
        <form style="width: 95%" action="{{route('Form_createProduct')}}" class="m-lg-3 col-md-5 " method="post" >
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <select name="category_id" class="form-select form-select-lg mb-3 @error('category') is-invalid @enderror" aria-label="Пример большого выбора" id="category">
                    <option selected>Выбор категории</option>
                    @foreach($categories as $category)
                        <option  value="{{$category->id}}">{{$category->title}}</option>

                    @endforeach
                </select>
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
                <select name="brand_id" class="form-select form-select-lg mb-3 @error('category') is-invalid @enderror" aria-label="Пример большого выбора" id="brand">
                    <option selected>Выбор бренда</option>
                    @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>

                    @endforeach
                </select>
                @error('brand')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <input name="description" value="{{old('description')}}" type="text" class="form-control @error('description') is-invalid @enderror" id="description" >
                @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Изображение</label>
                <input class="form-control" type="file" id="img">
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
