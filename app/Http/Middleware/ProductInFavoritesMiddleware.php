<?php

namespace App\Http\Middleware;

use App\Services\FavoritesService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductInFavoritesMiddleware
{
   protected $favoritesService;

   public function __construct(FavoritesService $favoritesService)
   {
       $this->favoritesService = $favoritesService;
   }


    public function handle(Request $request, Closure $next): Response
    {
        view()->share('favorite', $this->favoritesService);

        return $next($request);
    }
}
