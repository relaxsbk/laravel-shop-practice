<?php

namespace App\Services;

use App\Models\Product;

class FavoritesService
{

    public function get()
    {
        try {
            if (session()->has('favorite')) {
                return session()->get('favorite');
            }
        } catch (\Throwable $throwable) {
            return [];
        }

    }

    public function set(array $items): void
    {
        session(['favorite' => $items]);
    }


    public function add(Product $product): void
    {
        session()->push('favorite', $product);
    }

    public function clear(): void
    {
        session()->pull('favorite', []);
    }

    public function remove(Product $product): bool
    {
        $favorite = $this->get();


        $index = array_search($product->id, array_column($favorite, 'id'));

        if ($index !== false) {

            unset($favorite[$index]);

            $this->set(array_values($favorite));
            return true;
        }

        return false;

    }

    public function isEmpty(): bool
    {
        if (!session()->has('favorite')) {
            return true;
        }

        if (count($this->get()) > 0) {
            return false;
        }

        return true;
    }

}
