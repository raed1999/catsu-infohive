<?php

namespace App\Http\Middleware\Auth;

use App\Constants\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventIfLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (session()->has('user')) {

            $user = session('user');

            if ($user->usertype_id == Role::ADMIN) {
                return redirect()->route('admin.manage-dean.index');
            }

            if ($user->usertype_id == Role::DEAN) {
                return redirect()->route('dean.manage-clerk.index');
            }
        }

        return $next($request);
    }
}
