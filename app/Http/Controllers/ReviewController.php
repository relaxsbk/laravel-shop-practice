<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reviews\ReviewRequest;
use App\Models\Product;
use App\Models\Review;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function store(ReviewRequest $request)
    {
        $validated = $request->validated();

        Review::query()->create($validated);

        $product = Product::findOrFail($request->product_id);
        $averageRating = $product->reviews()->avg('rating');
        $product->rating = $averageRating;
        $product->save();

        return redirect()->back()->with(['message' => 'Отзыв создан']);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();


        $product = Product::findOrFail($review->product_id);
        $averageRating = $product->reviews()->avg('rating');
        $product->rating = $averageRating;
        $product->save();

        return redirect()->back()->with(['message' => 'Отзыв удалён']);
    }
}
