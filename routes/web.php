<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\CartController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;

//admin
use App\Http\Controllers\Admin\AdminController;
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
   Route::get('/catalog/{category}', 'products')->name('ProductsPage');
   Route::get('/catalog/{category}/{product}', 'product')->name('Product');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
});
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
});

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin', 'index')->name('admin_home');
});

//Route::get('/', function () {
//    return view('home');
//});

//Route::get('/', function () {
//    return view('test.test');
//});


/*
  Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 * */

