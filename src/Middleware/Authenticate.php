<?php

namespace SmallRuralDog\AdminDog\Middleware;

use Closure;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $redirectTo = '/auth/login';

        if (\AdminDog::guard()->guest()) {
            return \AdminDog::vueRouterTo($redirectTo);
        }

        return $next($request);
    }

}
