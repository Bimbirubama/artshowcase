<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login dengan guard admin
        if (!Auth::guard('admin')->check()) {
            // Kalau belum login admin, redirect ke halaman login admin
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
