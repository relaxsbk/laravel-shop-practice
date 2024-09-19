<?php

use App\Http\Controllers\Test_API\PostController;

Route::controller(PostController::class)->group(function (){
    Route::get('/posts', 'index');
});

// pdf

Route::get('/generate-pdf', [\App\Http\Controllers\pdfcontrolller::class, 'generate_pdf']);
