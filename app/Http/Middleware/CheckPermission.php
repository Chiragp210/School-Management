<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$permission = null): Response
    {
        $admin = auth()->guard('admin')->user();
        $currentRouteName = Route::currentRouteName();
        // dd($currentRouteName);
        $permission = ($permission) ? $permission : $currentRouteName;
        // dd($admin, $currentRouteName, $permission);
        if (!$admin->role->hasPermission($permission)) {
            return redirect()->route('admin.dashboard')->with('error', 'You do not have access to this route.');
        }
        return $next($request);
    }
}
