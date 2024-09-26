<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login'); // Jika belum login, arahkan ke halaman login
        }

        // Cek apakah user memiliki role yang sesuai
        if (Auth::user()->role != $role) {
            return redirect('/dashboard'); // Jika bukan admin, redirect ke dashboard
        }

        return $next($request); // Jika role cocok, izinkan akses
    }
}
