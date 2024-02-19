@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование бренда {{$brand->name}}</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Редактирование бренда <span class="fw-bold">{{$brand->name}}</span></h2>
    @include('components.alerts.alert')

    <div class="card-body">
        <form style="width: 95%" action="{{route('admin.brandUpdate', $brand->id)}}" class="m-lg-3 col-md-5 " method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Заголовок</label>
                <input name="name" value="{{$brand->name}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" >
                @error('name')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Изображение</label>
                <input name="img" class="form-control @error('img') is-invalid @enderror " type="file" id="img">
                @error('img')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input name="is_public" class="form-check-input @error('is_public') is-invalid @enderror" type="checkbox" @if($brand->is_public) checked @endif  id="is_public">
                <label class="form-check-label disabled" for="is_public">
                    Опубликовать
                </label>
            </div>
            @error('is_public')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

            <button type="submit" class="btn btn-outline-success">Обновить</button>
        </form>
    </div>

@endsection
