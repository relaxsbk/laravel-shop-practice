<?php

namespace App\Http\Middleware;

use App\Services\CompareService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductInCompareMiddleware
{
    protected CompareService $compareService;

    public function __construct(CompareService $compareService)
    {
        $this->compareService = $compareService;
    }


    public function handle(Request $request, Closure $next): Response
    {
        view()->share('compare', $this->compareService);

        return $next($request);
    }
}
