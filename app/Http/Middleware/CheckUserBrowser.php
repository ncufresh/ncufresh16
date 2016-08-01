<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserBrowser
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
        $browser = \Agent::browser();
        $version = \Agent::version($browser);
        if ($browser == "IE" && $version <= 9) {
            return response()->view('errors.support');
        }
        return $next($request);
    }
}
