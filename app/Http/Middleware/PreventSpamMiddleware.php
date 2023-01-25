<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventSpamMiddleware
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
        $key = 'no_spam';

        if (! session($key) || ! session()->has($key)) {
            session([$key => true]);

            return $next($request);
        } else {
            session()->flash('message', 'Stop spamming please.');

            return redirect('home');
        }
    }
}
