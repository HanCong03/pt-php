<?php

namespace App\Http\Middleware;

use App\Http\API\API;
use Request;
use Closure;

class Login {
    public function handle($request, Closure $next, $guard = null) {
        if (!API::isLogin()) {
            if ((Request::is('api-data/*'))) {
                return response()->json(['error' => ['message' => 'need login']]);
            } else {
                return redirect()->route('login');
            }
        }

        return $next($request);
    }
}
