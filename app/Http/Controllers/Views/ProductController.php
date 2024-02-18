<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

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
        /** @var Product $product */
        $this->cartService->add($product);
        return back();
    }

    public function index()
    {
        return view('admin.products.products');
    }

    public function createProduct()
    {
        return view('admin.products.addProduct');
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            $validated['img'] = $request->file('img')->store('product/images');
        }

        $product = Product::query()->create($validated);
        return redirect()->route('admin.products')->with(['message' => "Продукт \"$product->title \" успешно добавлен "]);
    }
}
