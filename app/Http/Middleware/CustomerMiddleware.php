<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class CustomerMiddleware
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
        if ( Auth::check() && (Auth::user()->role == 0 || Auth::user()->role == 1))
        {
            return $next($request);
        }
        return redirect('/login.html');
    }
   
}
