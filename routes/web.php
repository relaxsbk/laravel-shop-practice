<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Views\CartController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\ProductController;
use Illuminate\Support\Facades\Route;

//admin

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

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}/addToCart', 'addToCart')->name('addToCart');
});


Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/cart/create', 'createOrder')->middleware('auth')->name('createOrder');
    Route::get('/cart/clear', 'clear')->name('clearCart');


    Route::get('/cart/{product:id}', 'remove')->name('removeCart');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::post('/logout', 'logout')->name('logout');
});
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'createUser')->name('createUser');
});

Route::controller(AdminController::class)->group(function () {
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

