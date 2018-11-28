<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenNhapLieu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
              
        if (Auth::user()->Authen == 'Admin' || Auth::user()->Nhaplieu == 1)
        return $next($request);
        else
            return "YOU HACKED !!!";
    }
}
