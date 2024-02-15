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

    }

    public function remove(Product $product): bool
    {
        if (!in_array($product, $this->get())) {
            return false;
        }
        $items = array_filter($this->get(), fn($element) => $element->id !== $product->id);

        $this->set($items);

        return true;
    }

    public function isEmpty(): bool
    {
        if (count($this->get()) > 0) return false;

        return true;
    }

}
