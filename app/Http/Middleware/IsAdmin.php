<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah dia sudah login DAN pangkatnya adalah 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request); // Silakan lewat
        }

        // Kalau bukan admin tapi nekat buka URL admin, tendang ke halaman depan!
        return redirect('/');
    }
}
