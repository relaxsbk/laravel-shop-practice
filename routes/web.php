<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('HomePage');
});
Route::controller(CategoryController::class)->group(function () {
   Route::get('/catalog', 'index')->name('CatalogPage');
   Route::get('/catalog/products', 'products')->name('ProductsPage');
   Route::get('/catalog/product', 'product')->name('Product');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
});


//Route::get('/', function () {
//    return view('home');
//});




/*
  Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 * */

