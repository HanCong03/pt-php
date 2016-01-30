<?php

namespace App\Http\Middleware;

use App\Http\API\API;
use Request;
use Closure;

class Unlogin {
    public function handle($request, Closure $next, $guard = null) {
        if (API::isLogin()) {
            if ((Request::is('api-data/*'))) {
                return response()->json(['error' => ['message' => 'Illegal request']]);
            } else {
                return abort(403);
            }
        }

        return $next($request);
    }
}
