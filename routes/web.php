<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ProfileController;
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

Route::controller(HomeController::class)->middleware('cart.items.count')->group(function () {
    Route::get('/', 'index')->name('HomePage');
});
Route::controller(CategoryController::class)->middleware('cart.items.count')->group(function () {
    Route::get('/search', 'search')->name('search');
    Route::get('/catalog', 'index')->name('CatalogPage');
    Route::get('/catalog/{category}', 'products')->name('ProductsPage');
    Route::get('/catalog/{category}/{product}', 'product')->name('Product');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}/addToCart', 'addToCart')->name('addToCart');
});


Route::controller(CartController::class)->middleware('cart.items.count')->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/cart/create', 'createOrder')->middleware('auth')->name('createOrder');
    Route::get('/cart/clear', 'clear')->name('clearCart');


    Route::get('/cart/{product:id}', 'remove')->name('removeCart');
});

Route::controller(LoginController::class)->middleware(['guest', 'cart.items.count'])->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::post('/logout', 'logout')->withoutMiddleware('guest')->name('logout');
});
Route::controller(RegisterController::class)->middleware(['guest', 'cart.items.count'])->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'createUser')->name('createUser');
});

Route::controller(ProfileController::class)->middleware(['cart.items.count'])->group(function () {
    Route::get('/profile', 'index')->name('profile');
});


Route::controller(AdminController::class)->middleware(['cart.items.count', 'auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin_home');
//    TODO: сделать разные группы для заказов и категорий
    Route::get('/orders', 'orders')->name('admin_orders');
        Route::controller(ProductController::class)->middleware(['auth.admin'])->group(function (){
            Route::get('/products', 'index')->name('admin.products');// форма
            Route::get('/products/create', 'createProduct')->name('createProduct');// форма
            Route::post('/products/create', 'store')->name('Form_createProduct');// выполнение
        });
//    Route::get('/', 'index')->name('admin_home');
//    Route::get('/', 'index')->name('admin_home');
//    Route::get('/', 'index')->name('admin_home');

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

