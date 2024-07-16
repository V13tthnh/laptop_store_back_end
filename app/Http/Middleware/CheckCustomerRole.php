<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && ($user->hasRole('admin') || $user->hasRole('employee'))) {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login')->withErrors([
            'role' => 'You do not have access to this area.',
        ]);
    }
}
