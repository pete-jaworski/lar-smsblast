<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPasswordChangedMiddleware
{
    /**
     * Checks if User Password is changed
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if (Auth::user()->f5 == '0') {
                return redirect('change-password');
            }             
        }

        return $next($request);
    }
}
