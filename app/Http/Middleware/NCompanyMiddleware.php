<?php

namespace App\Http\Middleware;

use App\Traits\StatisticsTrait;
use Closure;

class NCompanyMiddleware
{
    use StatisticsTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (count(auth()->user()->company()->get())>0 || auth()->user()->type==1)
            return $this->permissionDenied();

        return $next($request);
    }
}
