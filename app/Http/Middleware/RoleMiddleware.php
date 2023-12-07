<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login')->with('warning', 'Anda harus login menggunakan akun Admin atau Petugas untuk mengakses halaman ini!');
        } elseif (Auth::check() && Auth::user()->role === 'Admin' || Auth::user()->role === 'Petugas') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->role === 'Masyarakat') {
            Alert::info('Anda tidak memiliki akses!', 'Silahkan login sesuai dengan role anda!')->persistent(true)->autoclose(5000);
            return redirect('/login');
        }

    }
}
