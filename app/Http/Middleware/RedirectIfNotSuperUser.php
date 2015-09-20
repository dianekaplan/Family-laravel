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
        {
            return redirect('home');
        }

        return $next($request);
    }
}
