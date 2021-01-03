<?php

namespace App\Http\Middleware;

use Closure;

class NCompanyMiddleware
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
        if (count(auth()->user()->company()->get())>0)
            return redirect(route('editCompany'));

        return $next($request);
    }
}
