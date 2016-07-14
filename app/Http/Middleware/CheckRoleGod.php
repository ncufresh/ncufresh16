<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleGod
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
        if ($request->user() === null) {
            return response("沒登入別亂踹", 401);
        }
        if ( !($request->user()->is('god')) ) {
            return response("只有神進得去", 401);
        }
        return $next($request);
    }
}
