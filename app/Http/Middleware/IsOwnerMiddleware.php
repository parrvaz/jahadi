<?php

namespace App\Http\Middleware;

use App\Traits\StatisticsTrait;
use App\Volunteer;
use Closure;

class IsOwnerMiddleware
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
        $item=$request->route('volunteer') ?? $request->route('activity') ?? $request->route('group');
        if ( $item->user->id == auth()->user()->id){
            return $next($request);
        }

        return $this->permissionDenied();
    }
}
