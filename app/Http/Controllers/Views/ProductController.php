<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
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
}
