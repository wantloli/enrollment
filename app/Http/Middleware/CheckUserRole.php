<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode(',', $roles);
        if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
            return redirect()->route('error.403');
        }

        return $next($request);
    }
}
