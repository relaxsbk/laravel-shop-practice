<?php

namespace App\Services;

use App\Models\Product;

class CompareService
{
    public function get()
    {
        try {
            if (session()->has('compare')) {
                return session()->get('compare');
            }
        } catch (\Throwable $throwable) {
            return [];
        }
    }

    public function set(array $compare): void
    {
        session(['compare' => $compare]);
    }

    public function add(Product $product): void
    {
        session()->push('compare', $product);
    }

    public function clear(): void
    {
        session()->pull('compare', []);
    }

    public function remove(Product $product): bool
    {
        $compare = $this->get();

        $index = array_search($product->id, array_column($compare, 'id'));

        if ($index !== false) {
            unset($compare[$index]);

            $this->set(array_values($compare));
            return true;
        }
        return false;
    }

    public function isEmpty(): bool
    {
        if (!session()->has('compare')) {
            return true;
        }

        if (count($this->get()) > 0) {
            return false;
        }

        return true;
    }
}
