<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $allowedRoles = explode('|', $role);

        // Check if the user has any of the specified roles
        if ($request->user() && !in_array($request->user()->role, $allowedRoles)) {
            return redirect('dashboard')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
