<?php

namespace SmallRuralDog\AdminDog\Middleware;

use AdminDog;
use Closure;

use Illuminate\Http\Request;

class Bootstrap
{
    public function handle(Request $request, Closure $next)
    {
        AdminDog::bootstrap();

        return $next($request);
    }
}
