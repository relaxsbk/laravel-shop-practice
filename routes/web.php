<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Views\AboutController;
use App\Http\Controllers\Views\BrandController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\Views\CartController;
use App\Http\Controllers\Views\CategoryController;
use App\Http\Controllers\Views\HomeController;
use App\Http\Controllers\Views\ProductController;
use App\Http\Controllers\Views\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Views\FavoritesController;
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

require_once __DIR__ . '/../routes/test_api/placeholder.php';

Route::controller(HomeController::class)->middleware('cart.items.count')->group(function () {
    Route::get('/', 'index')->name('HomePage');
});

Route::controller(AboutController::class)->middleware('cart.items.count')->group(function () {
    Route::get('/about', 'index')->name('about');
});


Route::controller(CategoryController::class)->middleware('cart.items.count')->group(function () {
    Route::get('/search', 'search')->name('search'); // лишнее
    Route::get('/catalog', 'index')->name('CatalogPage');
    Route::get('/catalog/{category}', 'products')->name('ProductsPage');
    Route::get('/catalog/{category}/{product}', 'product')->name('Product'); //Лишнее перенести в продукт
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id}/addToCart', 'addToCart')->name('addToCart');
    Route::get('/product/{id}/addToFavorites', 'addToFavorites')->name('addToFavorites');
});


Route::controller(CartController::class)->middleware('cart.items.count')->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/cart/create', 'createOrder')->middleware('auth')->name('createOrder');
    Route::get('/cart/clear', 'clear')->name('clearCart');

    Route::get('/cart/{product:id}', 'remove')->name('removeCart');
});

Route::controller(FavoritesController::class)->middleware('cart.items.count')->group(function (){
    Route::get('/favorites', 'index')->name('favorites');
    Route::get('/favorites/clear', 'clear')->name('favorites.clear');
    Route::get('/favorites/{product:id}', 'remove')->name('favorites.remove');
});

/*
 * Возможно желательно объединить в user контроллер
 */
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

Route::controller(ReviewController::class)->middleware(['auth'])->group(function (){
    Route::post('/review/create','store')->name('review.create');
    Route::delete('/review/{id}/delete','destroy')->name('review.delete');
});


Route::controller(AdminController::class)->middleware(['cart.items.count', 'auth.admin'])->prefix('admin')->group(function () {
    Route::get('/', 'index')->name('admin_home');

        Route::controller(OrderController::class)->middleware(['auth.admin'])->group(function (){
            Route::get('/orders', 'orders')->name('admin_orders');
            Route::get('/orders/canceled', 'canceled')->name('admin_orders.canceled');
            Route::get('/orders/{id}', 'order')->name('admin_order');
            Route::put('/orders/{id}/update', 'updateStatus')->name('admin_orders.updateStatus');
            Route::delete('/orders/{id}/delete', 'destroy')->name('admin_orders.destroy');
        });

        Route::controller(AdminCategoryController::class)->middleware(['auth.admin'])->group(function (){
            Route::get('/category', 'index')->name('admin.category');
            Route::get('/category/NoPublish', 'noPublish')->name('admin.category.NoPublish');
            Route::get('/category/create', 'createCategory')->name('admin.createCategory');// форма
            Route::post('/category/create', 'store')->name('Form_createCategory');// выполнение

            Route::get('/category/{id}', 'show')->name('admin.CategoryId');
            Route::post('/category/{id}/update', 'update')->name('admin.CategoryUpdate');
            Route::post('/category/{id}/delete', 'destroy')->name('admin.CategoryDelete');
        });

        Route::controller(BrandController::class)->middleware(['auth.admin'])->group(function (){
            Route::get('/brands', 'index')->name('admin.brands');
            Route::get('/brands/NoPublish', 'noPublish')->name('admin.brands.NoPublish');
            Route::get('/brands/create', 'createBrand')->name('admin.createBrand');// форма
            Route::post('/brands/create', 'store')->name('Form_createBrand');// выполнение

            Route::get('/brands/{id}', 'show')->name('admin.brandId');
            Route::post('/brands/{id}/update', 'update')->name('admin.brandUpdate');
            Route::post('/brands/{id}/delete', 'destroy')->name('admin.brandDelete');
        });

        Route::controller(ProductController::class)->middleware(['auth.admin'])->group(function (){
            Route::get('/products', 'index')->name('admin.products');
            Route::get('/products/NoPublish', 'noPublish')->name('admin.products.NoPublish');
            Route::get('/products/create', 'createProduct')->name('admin.createProduct');// форма
            Route::post('/products/create', 'store')->name('Form_createProduct');// выполнение

            Route::get('/products/{id}', 'show')->name('admin.productId');
            Route::post('/products/{id}/update', 'update')->name('admin.productUpdate');
            Route::post('/products/{id}/delete', 'destroy')->name('admin.productDelete');
        });

        Route::controller(AdminUserController::class)->middleware(['auth.admin'])->group(function (){
            Route::get('/users', 'index')->name('admin.users');
            Route::get('/users/admin', 'admin')->name('admin.users.admin');
            Route::post('/users/{id}/delete', 'destroy')->name('admin.users.delete');
        });


});

