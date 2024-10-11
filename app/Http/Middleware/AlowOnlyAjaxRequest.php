<?php

namespace App\Http\Middleware;

use Closure;

class AlowOnlyAjaxRequest
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
        if(!$request->ajax()) {
            // Handle the non-ajax request
            return abort(404);
        }
        return $next($request);
    }
}
