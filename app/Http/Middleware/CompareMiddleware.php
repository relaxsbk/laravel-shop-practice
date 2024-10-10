<?php

namespace App\Http\Middleware;

use App\Services\CompareService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class CompareMiddleware
{

    protected CompareService $compareService;

    public function __construct(CompareService $compareService)
    {
        $this->compareService = $compareService;
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('compare')) {
            $comparesCount = count($this->compareService->get());
            View::share('comparesCount', $comparesCount);
            return $next($request);
        }
        $comparesCount = 0;
        View::share('comparesCount', $comparesCount);
        return $next($request);
    }
}
