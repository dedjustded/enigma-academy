<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class isStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && ($request->user()->role->code == Role::ROLE_TEACHER ||
            $request->user()->role->code == Role::ROLE_STUDENT || $request->user()->role->code == Role::ROLE_ADMIN)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
