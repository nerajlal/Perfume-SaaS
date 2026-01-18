<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tenantId = $request->route('tenant_id');

        if ($tenantId) {
            $tenant = \App\Models\Tenant::find($tenantId);

            if ($tenant) {
                app()->instance('currentTenant', $tenant);
                \Illuminate\Support\Facades\View::share('currentTenant', $tenant);
                
                // Allow generating URLs for this tenant easily if needed
                \Illuminate\Support\Facades\URL::defaults(['tenant_id' => $tenant->id]);
            } else {
                abort(404, 'Tenant site not found.');
            }
        }

        return $next($request);
    }
}
