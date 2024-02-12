<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--    use bootstrap--}}
    @vite(['resources/sass/app.scss' , 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <title>Пока шаблон</title>
</head>
<body class="d-flex flex-column min-vh-100">

<header class="mb-5">
    @include('components.navbar')
</header>

<main class="flex-grow-1 mt-5 mb-5">
       <div class="container  mt-5">
           <div class="row">
               <!-- Sidebar -->
               <div class="col-md-3">
                   @include('components.admin.sidebar')
               </div>
               <!-- Content -->
               <div class="col-md-9">
                   <!-- Контент здесь -->
                   <div class="content">
                       @yield('admin_content')
                   </div>
               </div>
           </div>
       </div>
</main>


    @include('components.footer')

</body>
</html>
