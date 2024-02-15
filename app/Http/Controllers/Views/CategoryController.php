<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::where('is_public', true);
        return view('catalog', ['category' => $category->get()]);
    }
    public function products($category)
    {

        $category = Category::where('code', $category)->first();

        if (is_null($category)) {
            abort(404);
        }

        return view('catalog_products', ['category' => $category]);
    }
    public function product($categoryCode ,$productID)
    {
       $category = Category::where('code', $categoryCode)->firstOrFail();
        $product = Product::findOrFail($productID);

        // проверка на принадлежность к категории
        if ($product->category_id !== $category->id) {
            abort(404);
        }

        return view('product', ['category' => $category,'product' => $product]);
    }


}
