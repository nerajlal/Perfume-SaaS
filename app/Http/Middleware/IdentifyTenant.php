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
        $host = $request->getHost();
        $tenant = \App\Models\Tenant::where('domain', $host)->first();

        // If not found by domain, try route parameter (Local Dev / Path-based)
        if (!$tenant) {
            $tenantId = $request->route('tenant_id');
            if ($tenantId) {
                $tenant = \App\Models\Tenant::find($tenantId);
            }
        }

        if ($tenant) {
            app()->instance('currentTenant', $tenant);
            \Illuminate\Support\Facades\View::share('currentTenant', $tenant);
            
            // Allow generating URLs for this tenant easily if needed
            \Illuminate\Support\Facades\URL::defaults(['tenant_id' => $tenant->id]);

            // Dynamically set App URL to match the current request host (for subdomains)
            \Illuminate\Support\Facades\URL::forceRootUrl($request->getSchemeAndHttpHost());
            config(['app.url' => $request->getSchemeAndHttpHost()]);
        } else {
             // If we are on a tenant route but found no tenant, that's a 404.
             // However, for the root '/' or non-tenant routes, we should just let it pass (handled by web.php structure).
             // BUT, this middleware is assigned to the 'tenant' group.
             // If we are here, we MUST have a tenant.
             // Wait, for 'domain' based, we might NOT be in the {tenant_id} group yet if we restructure.
             // But for now, with Hybrid, we are. 
             // If accessed via Subdomain, the {tenant_id} param might be missing from route, 
             // but we still want to apply this scope.
             
             if ($request->route('tenant_id')) {
                 abort(404, 'Tenant site not found.');
             }
             // Implies we accessed via subdomain but it wasn't invalid?
             // Actually, if we access via subdomain, we likely won't hit the {tenant_id} route group 
             // unless we define a domain group.
             // For now, let's keep the abort only if ID was provided and failed, 
             // or if we are SURE this request was meant for a tenant.
             
             // In the current setup: Route::prefix('{tenant_id}') -> if subdomain is used, we might not match this group?
             // Correct. Subdomain routing usually requires `Route::domain(...)`.
             // But the user asked for "Hybrid".
             // We will handle the Middleware logic here. Routing structure needs update next.
             abort(404, 'Tenant site not found.');
        }

        return $next($request);
    }
}
