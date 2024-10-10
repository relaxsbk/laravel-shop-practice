<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CompareService;

class CompareController extends Controller
{
    protected CompareService $compareService;
    public function __construct()
    {
       $this->compareService = new CompareService();
    }

    public function index()
    {
        $compare = $this->compareService;

        if (session()->has('compare')) {
            $compareItem = count($compare->get());
            return view('compare', compact('compare', 'compareItem'));
        }
            $compareItem = 0;
            return view('compare', compact('compare', 'compareItem'));

//        $compareItems = $this->compareService->get();
//        return view('compare', ['compareItems' => $compareItems]);

//        return view('compare');
    }

    public function add($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $compareItems = $this->compareService->get();

        // Проверяем, если товар уже в сравнении
        if (collect($compareItems)->contains('id', $product->id)) {
            return response()->json(['success' => false, 'message' => 'Product already in compare'], 400);
        }

        $this->compareService->add($product);

        return response()->json(['success' => true, 'message' => 'Product added to compare']);
    }

}
