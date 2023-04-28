<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Auth\LogoutController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store as SessionStore;
use Symfony\Component\HttpFoundation\Response;

class SessionExpire
{

    protected $session;
    protected $timeout;
    protected $logout;

    public function __construct(SessionStore $session)
    {
        $this->session = $session;
        $this->timeout = env('SESSION_TIMEOUT');

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isLoggedIn = $request->path() != '/logout';

        if (!session('lastActivityTime'))

            $this->session->put('lastActivityTime', time());

        elseif (time() - $this->session->get('lastActivityTime') > $this->timeout) {

            $this->session->forget('lastActivityTime');
            $cookie = cookie('intend', $isLoggedIn ? url()->current() : 'dashboard');
            /*  auth()->logout(); */

            auth()->logout();
        }

        $isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
        return $next($request);
    }
}
