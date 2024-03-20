<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckStatus
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->status != User::STATUS_ACTIVE) {
            Auth::guard('web')->logout();
            Session::invalidate();
            Session::regenerateToken();
            return redirect()->route('login');
        }

        return $next($request);
    }
}
