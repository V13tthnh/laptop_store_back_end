<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRolePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null, $permission = null)
    {
        $user = Auth::user();

        if ($role && !$user->hasRole($role)) {
            return response()->json(['message' => 'You do not have the required role.'], 403);
        }

        if ($permission && !$user->can($permission)) {
            return response()->json(['message' => 'You do not have the required permission.'], 403);
        }

        return $next($request);
    }
}
