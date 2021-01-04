<?php

namespace App\Http\Middleware;

use App\Traits\StatisticsTrait;
use Closure;

class storeVolunteerMiddleware
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
        if (auth()->user()->type == 1 && auth()->user()->volunteer !=null)
            return $this->permissionDenied();
        return $next($request);
    }
}
