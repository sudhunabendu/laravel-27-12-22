<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CheckApiHeader
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
        $headerInfo = getallheaders();
        if (!isset($headerInfo['apikey'])) {
            return Response::json(array('message' => 'Unauthenticated'), 401);
        }
        if ($headerInfo['apikey'] != config('app.api_key')) {
            return Response::json(array('message' => 'Unauthenticated'), 401);
        }
        return $next($request);
    }
}
