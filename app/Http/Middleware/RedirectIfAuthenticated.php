<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admins')->except('logout');
        $this->middleware('guest:clients')->except('logout');
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        // if ($guard === 'admins' AND Auth::guard($guard)->check()) {
        //     return redirect(RouteServiceProvider::HOME);
        // }

        // if (route('client.login') === url($request->route()->uri) && $guard === 'clients' && Auth::guard($guard)->check()) {
        //     return redirect()->route('client.orders');
        // }

        return $next($request);
    }
}
