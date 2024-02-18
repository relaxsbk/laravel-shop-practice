<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Detail_order;
use App\Models\Order;
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
        if (session()->has('cart')) {
            $itemsCount = count($cart->get());
            return view('cart', ['cart' => $cart, 'itemsCount' => $itemsCount]);

        }
        $itemsCount = 0;
        return view('cart', ['cart' => $cart, 'itemsCount' => $itemsCount]);
    }

    public function remove(Product $product)
    {
        if ($this->cartService->remove($product)) {

            return back()->with('message', 'Товар успешно удалён!');
        }
        session()->flash('message_error', 'Товар не удалён!');
        return back();
    }

    public function createOrder()
    {
        // Получаем общую сумму заказа из сервиса корзины
        $total = $this->cartService->getTotal();
        // Убираем пробелы из строки с общей суммой заказа
        $total = str_replace(' ', '', $total);

        $order = Order::query()->create([
            'user_id' => auth()->user()->getAuthIdentifier(),
            'total' => $total,
        ]);

        foreach ($this->cartService->get() as $item) {
            Detail_order::query()->create([
                'order_id' => $order->id,
                'product_id' => $item->id
            ]);
        }

        $this->cartService->clear();

        return redirect()->route('HomePage')->with('success', 'Заказ зарегистрирован');


    }


    public function clear()
    {
        if (session()->has('cart')) {
            $this->cartService->clear();
            return back()->with('message', 'Корзина очищена');
        }
        return back()->with('message_error', 'Корзина пуста');

    }



}
