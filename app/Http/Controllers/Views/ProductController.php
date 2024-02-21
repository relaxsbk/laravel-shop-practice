<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\CartService;


class ProductController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();

    }

    public function addToCart($id)
    {
        $product = Product::query()->find($id);

        if (is_null($product)){
            return back();
        }

        // Получаем текущие товары в корзине
        $cartItems = $this->cartService->get();

        // Проверяем, есть ли товар уже в корзине
        if (is_array($cartItems) || is_object($cartItems)) {
            foreach ($cartItems as $item) {
                if ($item->id === $product->id) {
                    // Если товар уже в корзине, просто вернемся обратно
                    return back();
                }
            }
        }

        /** @var Product $product */
        $this->cartService->add($product);
        return back();
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
