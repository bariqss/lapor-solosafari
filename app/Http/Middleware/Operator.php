<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset(auth()->user()->role)) {
            if (auth()->user()->role == 'operator') {
                return $next($request);
            }
        }

        return redirect()->route('petugas.dashboard')->with('error', "You don't have operator access.");
    }
}
