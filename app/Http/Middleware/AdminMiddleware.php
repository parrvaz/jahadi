<?php

namespace App\Http\Middleware;

use App\Traits\StatisticsTrait;
use Closure;

class AdminMiddleware
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
        if(auth()->user()->id <3)
            return $next($request);

        return $this->permissionDenied();
    }
}
