<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\LogoutController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store as SessionStore;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionExpire
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && time() > Auth::user()->session_expires_at) {

            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();

            return redirect()->route('auth.login')->with('expired', 'Your session has expired. Please log in again.');
        }

        return $next($request);
    }
}
