<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdmins
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
        if(admin()->user()->type != 'admin')
        {
            return redirect()->route('home_doctor');
        }
        else {
            return $next($request);
        }
    }
}
