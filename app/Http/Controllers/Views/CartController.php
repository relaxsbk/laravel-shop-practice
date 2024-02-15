<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected CartService $cartService;

    public function __construct()
    {
        $this->cartService = new CartService();
    }



    public function index()
    {
        $cart = $this->cartService;
        return view('cart', ['cart' => $cart]);
    }

    public function remove(Product $product)
    {
        if ($this->cartService->remove($product)) {

            return back()->with('message', 'Товар успешно удалён!');
        }
        session()->flash('message_error', 'Товар не удалён!');
        return back();
    }



}
