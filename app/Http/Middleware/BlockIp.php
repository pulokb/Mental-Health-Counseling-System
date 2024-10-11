<?php

namespace App\Http\Middleware;

use App\Models\VisitorInfo;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class BlockIp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $visitorInfo = VisitorInfo::where('ip_address',FacadesRequest::ip())->where('status',0)->first();
        if($visitorInfo){
            abort(503);
        }
        return $next($request);
    }
}
