<?php

namespace App\Http\Middleware;

use Closure;

class IsNotLogin
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
        if(session()->get('user_is_login', false))
            return redirect('user');

        return $next($request);
    }
}
