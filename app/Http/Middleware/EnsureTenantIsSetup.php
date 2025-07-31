<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTenantIsSetup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = $request->user()->currentTenant;

        if (! $tenant->onboarded_at || ! $tenant->page->ready_at || $tenant->platforms->count() < 1) {
            return redirect(to: route('onboard.tenant'));
        }

        return $next($request);
    }
}
