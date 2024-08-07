<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Petugas
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        {
            if (isset(auth()->user()->role)) {
                if (auth()->user()->role == 'petugas') {
                    return $next($request);
                }
            }

            return redirect()->route('user.dashboard')->with('error', "You don't have petugas access.");
        }
    }
}
