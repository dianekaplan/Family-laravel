<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotSuperUser
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
        if ( ! $request->user()->isASuperUser())
//            (shouldn't this be user()->super_admin?')
        {
            return redirect('home');
        }

        return $next($request);
    }
}
