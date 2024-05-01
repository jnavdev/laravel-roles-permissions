<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentRoute = Route::currentRouteName();
        $permissions = $request->user()->role->permissions;
        if ($permissions->contains('route' ,$currentRoute))
        {
            return $next($request);
        }

        return to_route('home');
    }
}
