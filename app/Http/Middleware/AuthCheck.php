<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->isAdmin() || $user->isPetugas()) {
                return redirect()->route('admin-dashboard')->with('info', 'Anda sudah login!');
            } else {
                return redirect()->route('Pengaduanku')->with('info', 'Anda sudah login sebagai masyarakat!');
            }
        }
        return $next($request);
    }
}
