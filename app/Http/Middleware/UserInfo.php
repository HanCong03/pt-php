<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class UserInfo {
    public function handle($request, Closure $next, $guard = null) {
        view()->share('user', session()->get('user', null));

        Log::info(session()->get('user', null));

        return $next($request);
    }
}