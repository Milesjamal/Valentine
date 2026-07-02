<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class BranchContextMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($user = $request->user()) {
            if (!Session::has('current_branch_id')) {
                Session::put('current_branch_id', $user->branch_id);
            }

            // If user is Super Admin, they might have changed branch in session
            if ($user->hasRole('Super Admin') && $request->has('switch_branch')) {
                Session::put('current_branch_id', $request->get('switch_branch'));
            }
        }

        return $next($request);
    }
}
