<?php

namespace App\Http\Middleware;

use App\Volunteer;
use Closure;

class IsOwnerOfVolunteerMiddleware
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
        $volunteer=Volunteer::find($request->route('volunteer'));
        if ( $volunteer->user->id == auth()->user()->id){
            return $next($request);
        }


        abort(403);

    }
}
