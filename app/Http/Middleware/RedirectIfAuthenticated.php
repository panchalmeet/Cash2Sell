<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Enum\UserRoleEnum;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $redirect = match (Auth::user()?->role_id) {
                    UserRoleEnum::ADMIN->value => config('global.admin_url'),
                    UserRoleEnum::DEALER->value => RouteServiceProvider::HOME,
                    default => '/',
                };
                return redirect($redirect);
            }
        }

        return $next($request);
    }
}
