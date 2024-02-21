<?php

namespace App\Services;

use App\Models\Product;

class CartService
{

    public function get()
    {
        try {
            if (session()->has('cart')) {
                return session()->get('cart');
            }
        } catch (\Throwable $throwable) {
            return [];
        }

    }

    public function set(array $items): void
    {
        session(['cart' => $items]);
    }
    public function getTotal(): string
    {
        $price = array_reduce($this->get(), fn($total, $item) => $total += $item->price, 0);
        return number_format($price, 0, '', ' ');
    }

    public function add(Product $product)
    {
        session()->push('cart', $product);
    }

    public function clear(): void
    {
        session()->pull('cart', []);
    }

    public function remove(Product $product): bool
    {
        $cart = $this->get();


        $index = array_search($product->id, array_column($cart, 'id'));

        if ($index !== false) {

            unset($cart[$index]);

            $this->set(array_values($cart));
            return true;
        }

        return false;

    }

    public function isEmpty(): bool
    {
        if (!session()->has('cart')) {
            return true;
        }

        if (count($this->get()) > 0) {
            return false;
        }

        return true;
    }

}
