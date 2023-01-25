<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventSpamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('is_spamming') || now()->diffInSeconds(session('is_spamming')) > 30) {
            session(['is_spamming' => now()]);
            return $next($request);
        } else {
            session()->flash('message', 'Stop spamming please.');

            return redirect('home');
        }
    }
}
