<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->usertype == 'admin') {
            abort(401,'Unauthorized Access');
        }
         abort(401,'Unauthorized Access');
    }
}
