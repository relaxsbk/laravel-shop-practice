<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\ProductService;

class CategoryController extends Controller
{
    protected ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        $category = Category::where('is_public', true);
        return view('catalog', ['category' => $category->get()]);
    }

    public function products(Request $request, $category)
    {
        $category = Category::where('code', $category)->firstOrFail();
        $brands = Brand::all();

        $products = $category->product();

        $products->where('is_public', 1);

        // Фильтрация по цене, если хотя бы одно поле заполнено
        if ($request->filled('min_price') || $request->filled('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');

            if ($request->filled('min_price') && $request->filled('max_price')) {
                $products->whereBetween('price', [$minPrice, $maxPrice]);
            } elseif ($request->filled('min_price')) {
                $products->where('price', '>=', $minPrice);
            } elseif ($request->filled('max_price')) {
                $products->where('price', '<=', $maxPrice);
            }
        }

        // Фильтрация по бренду
        if ($request->filled('brands')) {
            $selectedBrands = $request->input('brands');
            $products->whereIn('brand_id', $selectedBrands); // Используем правильное имя столбца для бренда
        }

        // Фильтрация по названию
        if ($request->has('name_order')) {
            $nameOrder = $request->input('name_order');
            if ($nameOrder == 1) {
                $products->orderBy('title', 'asc');
            } elseif ($nameOrder == 2) {
                $products->orderBy('title', 'desc');
            }
        }

        $products = $products->paginate(9);

        return view('catalog_products', ['category' => $category, 'products' => $products, 'brands' => $brands, 'request' => $request]);
    }



//    public function products($category)
//    {
//
//        $category = Category::where('code', $category)->first();
//
//        if (is_null($category)) {
//            abort(404);
//        }
//        $products = $category->product()->paginate(9);
//
//        return view('catalog_products', ['category' => $category, 'products' => $products]);
//    }
    public function product($categoryCode ,$productID)
    {
       $category = Category::where('code', $categoryCode)->firstOrFail();
        $product = Product::findOrFail($productID);

        $reviews = $product->reviews()->get();


        // проверка на принадлежность к категории
        if ($product->category_id !== $category->id) {
            abort(404);
        }

        if ($product->is_public === 0) {
            abort(404);
        }

        return view('product', ['category' => $category, 'product' => $product, 'reviews' => $reviews]);
    }
    public function search(Request $request)
    {
        $query = $request->input('search');

        $products = Product::where('is_public', 1)
            ->where('title', 'like', '%'.$query.'%')
            ->paginate(9);

        return view('search_results', ['products' => $products, 'query' => $query]);
    }

}
