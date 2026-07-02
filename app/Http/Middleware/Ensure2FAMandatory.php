<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Ensure2FAMandatory
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && !$user->hasRole('Customer')) {
            if (!$user->two_factor_confirmed_at) {
                // If they are on the 2FA setup page or logout, let them through
                if ($request->is('user/two-factor-*') || $request->is('logout') || $request->is('2fa-setup*')) {
                    return $next($request);
                }

                return redirect()->route('2fa.setup');
            }
        }

        return $next($request);
    }
}
