<?php

namespace M4riachi\LaravelComment\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $guestUser = config('m4-comment.guest-user', true);

        if (!$guestUser && !auth()->check()) {
            abort(404);
        }

        return $next($request);
    }
}
