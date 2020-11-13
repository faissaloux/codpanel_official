<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsClient
{
    public function handle(Request $request, Closure $next)
    {
        if ( Auth::guard('clients')->user() ) {
            return $next($request);
        }

        return redirect()->route('client.login');
    }
}
