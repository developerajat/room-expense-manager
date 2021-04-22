<?php

namespace App\Http\Middleware;

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
        if ($request->is('api/*')) {
            echo json_encode(['statusCode' => 411, 'message' => "Your token has been expired."]); die;
        }

        if (! $request->expectsJson()) {
            return route('loginForm', ['next' => url()->current()]);
        }
    }
}
