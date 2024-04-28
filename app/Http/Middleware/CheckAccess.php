<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$permissions)
    {
        $user = Auth::user();

        // Check if the user is logged in
        if (!$user) {
            return redirect()->route('login');
        }

        // Check if the user has access to any of the required permissions
        foreach ($permissions as $permission) {
            if ($user->access[$permission]) {
                return $next($request);
            }
        }

        // If the user doesn't have access, redirect them or return a response accordingly
        return abort(403); // You can change this to a different route or return a 403 response
    }
}
