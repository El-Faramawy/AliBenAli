<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
//        abort(403);
        if (Auth::check()){
            return $next($request);
        }
        return redirect('login')->with(notification('يجب تسجيل الدخول اولا','info'));
    }
}
