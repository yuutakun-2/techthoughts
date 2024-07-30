<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //first check if logged in or not
        if(!auth()->check()) {
            return redirect('/');
        }
        //if logged in, check if admin or not
        if(!auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
