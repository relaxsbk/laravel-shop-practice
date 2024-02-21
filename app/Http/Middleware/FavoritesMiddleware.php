<?php

namespace App\Http\Middleware;

use App\Services\FavoritesService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class FavoritesMiddleware
{
    protected FavoritesService $favoritesService;

    public function __construct(FavoritesService $favoritesService)
    {
        $this->favoritesService = $favoritesService;
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('favorite')) {
            $favoritesCount = count($this->favoritesService->get());
            View::share('favoritesCount', $favoritesCount);
            return $next($request);
        }
        $favoritesCount = 0;
        View::share('favoritesCount', $favoritesCount);
        return $next($request);
    }
}
