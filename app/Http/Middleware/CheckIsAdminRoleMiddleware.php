<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user bukan admin
        if (!Auth::user()->isadmin) {
            // Cek apakah URL mengandung /admin
            if ($request->is('admin') || $request->is('admin/*')) {
                // Tetap larang akses langsung ke halaman admin
                abort(403, 'Forbidden');
             
            }

            // Kalau bukan akses /admin, arahkan ke halaman utama
               return redirect('/');
        }

        return $next($request);
    }
}
