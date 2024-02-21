<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\FavoritesService;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    protected FavoritesService $favoritesService;

    public function __construct()
    {
        $this->favoritesService = new FavoritesService();
    }

    public function index()
    {
        $favorite = $this->favoritesService;

        if (session()->has('favorite')) {
            $favoriteItem = count($favorite->get());
            return view('favorites', compact('favorite', 'favoriteItem'));
        }
        $favoriteItem  = 0;
        return view('favorites', compact('favorite', 'favoriteItem'));
    }

    public function remove(Product $product)
    {
        if ($this->favoritesService->remove($product)) {

            return back()->with('message', 'Товар успешно удалён!');
        }
        session()->flash('message_errors', 'Товар не удалён!');
        return back();
    }

    public function clear()
    {
        if (session()->has('favorite')) {
            $this->favoritesService->clear();
            return back()->with('message', 'Избранное очищено');
        }
        return back()->with('message_errors', 'Избранное пусто');

    }

}
