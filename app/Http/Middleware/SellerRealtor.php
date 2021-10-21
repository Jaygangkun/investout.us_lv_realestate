<?php

namespace App\Http\Middleware;

use Closure;

class SellerRealtor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // if user is not logged in then redirect to login page
        if( is_null( auth()->user() ) ) {
            return redirect('/login');
        }

        $userrole = auth()->user()->roles()->first()->slug;
        if (in_array($userrole, $roles)) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
