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
            return redirect('/login');
        }
        if ( !($request->user()->is('admin') || $request->user()->is('god')) ) {
            return response()->view('errors.permission');
        }
        return $next($request);
    }
}
