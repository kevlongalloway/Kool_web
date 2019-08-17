<?php

namespace App\Http\Middleware;

use Closure;

class StatusMiddleware
{
    /**
     * Handle an incoming request.
     * Check if user is active.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       if($request->user()) {
        $user = $request->user();
        //if user belongs to an organization
            if(!empty($user->organization_id)){
               if(!$user->organization->is_active){
                return redirect(route('inactive'));
               }
               return $next($request);
            }
        //if user doesn't belong to an organization
            else{
                if(!$user->is_active) {
                    return redirect(route('payment'));
                }
                return $next($request);
            }
       }

        return $next($request);

    }
}

