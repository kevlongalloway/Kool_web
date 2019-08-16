<?php

namespace App\Http\Middleware;

use Closure;

class StatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
/**
     * The URIs that should be reachable.
     *
     * @var array
     */
    protected $except = [
        'inactive',
    ];

    public function handle($request, Closure $next)
    {
        
        if($request->user())
        {
            $user = $request->user();
            if($user->is_active) 
            {
                return $next($request);
            }
            if(!empty($user->organization_id)) {
                return redirect(route('inactive'));
            }
            return redirect(route('payment'));
        }
        return $next($request);

    }
}
