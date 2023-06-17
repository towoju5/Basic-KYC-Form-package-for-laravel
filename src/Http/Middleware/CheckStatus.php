<?php

namespace Towoju5\KycForm\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Towoju5\KycForm\Models\KycVerification;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return false;
        }
        $user = auth()->user();
        $check = KycVerification::whereEmail($user->email)->first();
        if (!empty($check) && !empty($check->approved_at)) {
            return $next($request);
        }
        abort(403);
    }
}
