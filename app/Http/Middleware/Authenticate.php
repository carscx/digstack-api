<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }


    public function handle($request, Closure $next, ...$guards)
    {
        // if ($request->header('Accept') != 'application/json')
        //     return response()->json([
        //         'message' => 'Accept Headers Required.'
        //     ], 400);

        /** ONLY Auth Login not check Middleware Sanctum */
        if ($request->bearerToken() == null)
            return response()->json([
                'message' => 'Unauthenticated.'
            ], 401);

        if (!auth('sanctum')->check())
            return response()->json([
                'message' => 'Token Expired.'
            ], 403);

        return $next($request);
    }
}
