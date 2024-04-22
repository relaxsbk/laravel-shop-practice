<?php

use App\Http\Controllers\Test_API\PostController;

Route::controller(PostController::class)->group(function (){
    Route::get('/posts', 'index');
});
