<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->role_id;

        switch($role) {
            case 'admin':
                if ($authUserRole == 1) {
                    return $next($request);
                }
                break;
            case 'customer':
                if ($authUserRole == 2) {
                    return $next($request);
                }
                break;
        }

        switch($authUserRole) {
            case 1:
                return redirect()->route('dashboard');
            case 2:
                return redirect()->route('welcome');
        }

        return redirect()->route('login');
    }
}
