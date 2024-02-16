<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use App\Services\CartService;

class CartItemsCountMiddleware
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function handle($request, Closure $next)
    {
        if (session()->has('cart')) {
            $itemsCount = count($this->cartService->get());
            View::share('itemsCount', $itemsCount);
            return $next($request);
        }
        $itemsCount = 0;
        View::share('itemsCount', $itemsCount);
        return $next($request);
    }
}
