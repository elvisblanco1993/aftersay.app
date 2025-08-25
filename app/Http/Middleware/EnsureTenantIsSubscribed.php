<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTenantIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->currentTenant && ! $request->user()->currentTenant->onTrial() && ! $request->user()->currentTenant->subscribed('default')) {
            return redirect(route('billing.plans'));
        }

        return $next($request);
    }
}
