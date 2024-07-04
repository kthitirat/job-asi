<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class Role
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // Redirect to login if user is not authenticated
        }
        foreach ($roles as $role) {
            if (Auth::user()->role && Auth::user()->role->name === $role) {
                return $next($request); // User has the required role, proceed
            }
        }
        return redirect()->route('index');
    }
}
