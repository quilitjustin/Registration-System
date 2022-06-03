<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if($role == 'admin' && auth()->user()->role != 'admin'){
            abort(code: 403);
        }
        if($role == 'staff' && auth()->user()->role != 'staff'){
            abort(code: 403);
        }

        return $next($request);
    }
}
