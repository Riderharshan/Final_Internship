<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Must be logged in
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Only this email can access admin
        if (Auth::user()->email !== 'harshan.tn46@gmail.com') {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}
