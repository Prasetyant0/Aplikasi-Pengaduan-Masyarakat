<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class PetugasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'Petugas') {
            return $next($request);
        }
        Alert::info('Anda bukan admin!', 'Silahkan login terlebih dahulu jika ingin akses halaman
        admin.')->persistent(true)->autoclose(5000);
        return redirect('/login');
    }
}
