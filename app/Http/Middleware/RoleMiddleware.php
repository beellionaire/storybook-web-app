<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Cek apakah role user saat ini ada di dalam array $roles yang diizinkan
        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        // Jika role tidak sesuai, tampilkan error 403 (Forbidden)
        abort(403, 'Maaf, Anda tidak memiliki akses ke halaman ini.');
    }
}
