<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class isMasyarakat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guest()) {
            Alert::info('Anda belum login!', 'Silahkan login terlebih dahulu.')->persistent(true)->autoclose(5000);
            return redirect()->route('login');
        } elseif (Auth::check() && Auth::user()->role == 'Masyarakat') {
            return $next($request);
        } elseif (Auth::user()->role == 'Admin' || Auth::user()->role == 'Petugas') {
            Alert::info('Mau ngapain?', 'Stay aja di bagian anda!')->persistent(true)->autoclose(5000);
            return redirect()->back();
        }
    }
}
