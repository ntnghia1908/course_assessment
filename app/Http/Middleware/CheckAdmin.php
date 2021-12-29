<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckAdmin
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
        if (! Auth::check()) {
            return redirect(route('login'));
        }
//        if (\Auth::user()->role_id == \App\Role::ADMIN) {
//            return $next($request);
//        }
        else {
            return redirect(route('error-404'));
        }
    }
}
