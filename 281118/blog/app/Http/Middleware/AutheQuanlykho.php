<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AutheQuanlykho
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
       
        if (Auth::user()->Authen == 'Admin' || Auth::user()->Quanlykho == 1)
        return $next($request);
        else
            return "YOU HACKED !!!";
    }
}
