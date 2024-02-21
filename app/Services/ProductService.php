<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function avgRating(Product $product)
    {
        return $product->reviews()->avg('rating');
    }

}
