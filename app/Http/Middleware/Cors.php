<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->header("Access-Control-Allow-Origin","*");
        $response->header("Access-Control-Allow-Credentials","false");
        $response->header("Access-Control-Max-Age","600");    // cache for 10 minutes

        $response->header("Access-Control-Allow-Methods","POST, GET, OPTIONS, DELETE, PUT"); //Make sure you remove those you do not want to support

        $response->header("Access-Control-Allow-Headers", "Content-Type, Accept, Authorization, X-Requested-With, Application");

        return $response;

        // return $next($request)
        // ->header('Access-Control-Allow-Origin', '*')
        // ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

    }
}
