<?php

namespace App\QueryFilters\Songs;

use Closure;

class Grades {
	public function handle($request, Closure $next) 
	{
		if($request->has('grade')){
			$builder = $next($request);
			
			foreach()
			$builder->where('grade', $grade);
		}
		return $next($request);
	}
}