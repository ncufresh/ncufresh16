<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleAdmin
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
        if ( !($request->user()->is('admin') || $request->user()->is('god')) ) {
            return response("管理員專區,走開!", 401);
        }
        return $next($request);
    }
}
