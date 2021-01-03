<?php

namespace App\Http\Middleware;

use App\Traits\StatisticsTrait;
use App\Volunteer;
use Closure;

class IsOwnerOfVolunteerMiddleware
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
        $volunteer=$request->route('volunteer');
        if ( $volunteer->user->id == auth()->user()->id){
            return $next($request);
        }

        return $this->permissionDenied();
    }
}
