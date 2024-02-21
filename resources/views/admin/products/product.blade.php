@extends('templates.admin')

@section('nav_bread')
    <nav class="fs-6 mt-4 mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('HomePage')}}">ГиперКвант</a></li>
            <li class="breadcrumb-item active" aria-current="page">,<a href="{{route('admin_home')}}">Панель Администрирования</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование товара {{$product->title}}</li>
        </ol>
    </nav>
@endsection

@section('admin_content')
    <h2>Редактирование товара <span class="fw-bold">{{$product->title}}</span></h2>
    @include('components.alerts.alert')

    <div class="card-body">
        <form style="width: 95%" action="{{route('admin.productUpdate', $product->id)}}" class="m-lg-3 col-md-5 " method="post"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Категория</label>
                <select name="category_id" class="form-select form-select-lg mb-3 @error('category') is-invalid @enderror" aria-label="Пример большого выбора" id="category">
                    <option selected value="{{$product->category->id}}">{{$product->category->title}}</option>
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
                <input name="title" value="{{$product->title}}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" >
                @error('title')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Модель</label>
                <input name="model" value="{{$product->model}}" type="text" class="form-control @error('model') is-invalid @enderror" id="model" >
                @error('model')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Бренд</label>
                <select name="brand_id" class="form-select form-select-lg mb-3 @error('category') is-invalid @enderror" aria-label="Пример большого выбора" id="brand">
                    <option value="{{$product->brand->id}}" selected>{{$product->brand->name}}</option>
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
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{$product->description}}</textarea>
                @error('description')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="img" class="form-label">Изображение</label>
                <input name="img" class="form-control  @error('img') is-invalid @enderror" type="file" id="img">
                @error('img')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input name="price" value="{{$product->price}}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" >
                @error('price')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input name="is_public" class="form-check-input @error('is_public') is-invalid @enderror" type="checkbox"  id="is_public" @if($product->is_public) checked @endif>
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
        <div class="accordion w-100" id="accordionExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingReviews">
                    <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReviews" aria-expanded="false" aria-controls="collapseReviews">
                        Отзывы
                    </button>
                </h2>
                <div id="collapseReviews" class="accordion-collapse collapse" aria-labelledby="headingReviews" data-bs-parent="#accordionExample">
                    <div class="accordion-body fs-5">
                        {{--modal--}}
                        @if(auth()->user())
                            <button type="button" class="btn btn-outline-success fs-6 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Оставить отзыв</button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Форма заполнения отзыва</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('review.create')}}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="user_id" class="col-form-label fw-bold">{{auth()->user()->email}}</label>
                                                    <input name="user_id" value="{{auth()->user()->id}}" type="hidden" class="form-control" id="user_id">
                                                </div>
                                                <div class="mb-3">
                                                    <input name="product_id" value="{{$product->id}}" type="hidden" class="form-control" id="product_id">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rating" class="col-form-label">Оценка:</label>
                                                    <select name="rating" class="form-select" id="rating" required>
                                                        <option selected value="5">5 - отлично</option>
                                                        <option value="4">4 - хорошо</option>
                                                        <option value="3">3 - удовлетворительно</option>
                                                        <option value="2">2 - плохо</option>
                                                        <option value="1">1 - ужасно</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="message-text" class="col-form-label">Отзыв:</label>
                                                    <textarea name="review" class="form-control" id="message-text" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                    <button type="submit" class="btn btn-primary text-white">Отправить отзыв</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                        {{--reviews--}}
                        @if($product->reviews->count() === 0)
                            <p class="fs-4">Отзывов пока нет </p>
                        @else
                            @foreach($product->reviews as $review)
                                <div class="border-bottom border-body">
                                    <div class="user-rating">
                                        <p><span class="fw-bold">{{$review->user->login}}</span> - Оценка: {{$review->rating}}</p>
                                    </div>
                                    <p>
                                        {{$review->review}}
                                    </p>
                                    <form action="{{route('review.delete', $review->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger mb-3">Удалить</button>
                                    </form>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>
    </div>

@endsection
