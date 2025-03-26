<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Enum\UserRoleEnum;

class AdminAuthorize
{
    /**
     * Handle an incoming request for the admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()?->role_id === UserRoleEnum::ADMIN->value) {
            return $next($request);
        }
        return redirect('/');
    }
}
