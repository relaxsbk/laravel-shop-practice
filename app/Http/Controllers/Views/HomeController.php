<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $category = Category::where('is_public', true)
            ->inRandomOrder()
            ->take(4)
            ->get();


        $products = Product::where('rating', 5)
            ->where('is_public', true)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('home', ['category' => $category, 'products' => $products]);
    }



}
