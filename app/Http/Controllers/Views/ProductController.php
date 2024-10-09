<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;
use App\Services\FavoritesService;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected CartService $cartService;
    protected FavoritesService $favoritesService;

    public function __construct()
    {
        $this->cartService = new CartService();
        $this->favoritesService = new FavoritesService();

    }

    public function addToCart($id)
    {
        // Находим продукт по ID
        $product = Product::query()->find($id);

        // Проверяем, существует ли продукт
        if (is_null($product)) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        // Получаем текущие товары в корзине
        $cartItems = $this->cartService->get();

        // Проверяем, есть ли товар уже в корзине
        if (collect($cartItems)->contains('id', $product->id)) {
            return response()->json(['success' => false, 'message' => 'Product already in cart'], 400);
        }

        // Добавляем товар в корзину
        $this->cartService->add($product);

        // Получаем обновленное количество товаров в корзине
        $cartItemCount = count($this->cartService->get());

        // Возвращаем успешный ответ с количеством товаров в корзине
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cartItemCount' => $cartItemCount,
        ]);
    }



//    public function addToCart(Request $request, $id)
//    {
//        $product = Product::query()->find($id);
//
//        if (is_null($product)) {
//            return response()->json(['success' => false, 'message' => 'Товар не найден'], 404);
//        }
//
//        // Получаем текущие товары в корзине
//        $cartItems = $this->cartService->get();
//
//        // Проверяем, есть ли товар уже в корзине
//        if (is_array($cartItems) || is_object($cartItems)) {
//            foreach ($cartItems as $item) {
//                if ($item->id === $product->id) {
//                    return response()->json(['success' => false, 'message' => 'Товар уже в корзине'], 400);
//                }
//            }
//        }
//
//        // Добавляем товар в корзину
//        $this->cartService->add($product);
//
//        // Возвращаем JSON-ответ
//        return response()->json([
//            'success' => true,
//            'message' => 'Товар добавлен в корзину',
//            'cartItemCount' => count($cartItems) + 1, // Обновляем количество товаров
//        ]);
//    }


    public function addToFavorites($id)
    {
        $product = Product::query()->find($id);

        if (is_null($product)){
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        // Получаем текущие избранные товары
        $favoriteItems = $this->favoritesService->get();

        // Проверяем, есть ли товар уже в избранном
        if (is_array($favoriteItems) || is_object($favoriteItems)) {
            foreach ($favoriteItems as $item) {
                if ($item->id === $product->id) {
                    return response()->json(['success' => false, 'message' => 'Product already in favorites'], 400);
                }
            }
        }

        // Добавляем товар в избранное
        $this->favoritesService->add($product);

        // Получаем новое количество товаров в избранном
        $favoriteItemCount = count($this->favoritesService->get());

        return response()->json([
            'success' => true,
            'message' => 'Product added to favorites',
            'favoriteItemCount' => $favoriteItemCount
        ]);
    }



//    админка
    public function index()
    {
        $products = Product::query()->paginate(15);

        return view('admin.products.products', compact('products'));
    }
    public function noPublish()
    {
        $products = Product::where('is_public', false)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.products.products_noPublish', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('admin.products.addProduct', compact('categories', 'brands'));
    }

    public function show($id)
    {
        $categories = Category::all();
        $brands = Brand::all();

        $product = Product::findOrFail($id);

        return view('admin.products.product', compact('product', 'categories', 'brands'));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $isPublic = $request->has('is_public') ? 1 : 0;
        $validated['is_public'] = $isPublic;


        if ($request->hasFile('img')) {
            $validated['img'] = "/storage/{$request->file('img')->store('product/images', 'public')}";
        }




        $product = Product::query()->create($validated);
        return redirect()->route('admin.products')->with(['message' => "Продукт \"$product->title \" успешно добавлен "]);
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validated();
        $isPublic = $request->has('is_public') ? 1 : 0;
        $validated['is_public'] = $isPublic;

        if ($request->hasFile('img')) {
            $validated['img'] = "/storage/{$request->file('img')->store('prodicts/images', 'public')}";
        }

        $product->update($validated);

        return redirect()->back()->with('success', 'Товар успешно изменён');


    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->back()->with('success', 'Товар успешно удалён');
    }
}
