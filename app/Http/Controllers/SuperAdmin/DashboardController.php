<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Tenant;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStores = Tenant::count();
        $activeStores = Tenant::where('status', true)->count();
        $expiringSoon = Tenant::where('subscription_ends_at', '<', now()->addDays(30))
                              ->where('subscription_ends_at', '>', now())
                              ->count();
        
        // Mock Revenue Calculation based on Plans (Basic: 2999, Essential: 6500, Pro: 7000)
        // In a real app, this would come from an Orders/Invoices table
        $basicCount = Tenant::where('plan', 'basic')->count();
        $essentialCount = Tenant::where('plan', 'essential')->count();
        $proCount = Tenant::where('plan', 'pro')->count();
        
        $yearlyRevenue = ($basicCount * 2999) + ($essentialCount * 6500) + ($proCount * 7000);

        // Recent Signups (Last 5)
        $recentTenants = Tenant::latest()->take(5)->get();

        return view('super_admin.dashboard', compact('totalStores', 'activeStores', 'expiringSoon', 'yearlyRevenue', 'recentTenants'));
    }

    public function tenants(Request $request)
    {
        $query = Tenant::with('admin');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('domain', 'like', "%{$search}%");
            });
        }

        // Status Filter
        if ($request->filled('status')) {
            if ($request->status == 'active') {
                $query->where('status', true);
            } elseif ($request->status == 'inactive') {
                $query->where('status', false);
            }
        }

        // Sorting
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $tenants = $query->get();

        if ($request->ajax()) {
            return view('super_admin.partials.tenants_table_body', compact('tenants'));
        }

        return view('super_admin.tenants.index', compact('tenants'));
    }

    public function toggleStatus($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->status = !$tenant->status;
        $tenant->save();

        return back()->with('success', 'Tenant status updated successfully.');
    }

    public function createTenant()
    {
        return view('super_admin.create_tenant');
    }

    public function storeTenant(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'site_name' => 'required|string|max:255',
            'subdomain' => 'required|string|alpha_dash|unique:tenants,domain',
            'plan' => 'required|in:basic,essential,pro',
        ]);

        // Construct Full Domain
        // In reality, 'unique:tenants,domain' checks the full string, but here we only input the subdomain.
        // For strict validation, we'd need a custom rule, but for MVP we assume unique input.
        $fullDomain = $validated['subdomain'] . '.metora.in';

        // Create Tenant
        $tenant = \App\Models\Tenant::create([
            'name' => $validated['site_name'],
            'domain' => $fullDomain,
            'plan' => $validated['plan'],
            'subscription_ends_at' => now()->addDays(365),
        ]);

        // Create Tenant Admin User
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'type' => 'admin',
            'site_name' => $validated['site_name'],
            'tenant_id' => $tenant->id,
        ]);

        return redirect()->route('super_admin.dashboard')->with('success', 'Tenant Admin created successfully.');
    }
    public function expiring()
    {
        $tenants = Tenant::where('subscription_ends_at', '<', now()->addDays(30))
                         ->where('subscription_ends_at', '>', now())
                         ->with('admin')
                         ->orderBy('subscription_ends_at', 'asc')
                         ->get();

        return view('super_admin.tenants.expiring', compact('tenants'));
    }

    public function renewSubscription($id)
    {
        $tenant = Tenant::findOrFail($id);
        
        // Ensure we have a date to work with
        $currentExpiry = $tenant->subscription_ends_at ?? now();
        
        // Logic: Add 365 days to the current expiry date
        // If the subscription is already expired, this adds 365 days to that past date.
        // For "Expiring Soon" (future dates), this correctly extends the term.
        $tenant->subscription_ends_at = $currentExpiry->copy()->addDays(365);
        $tenant->save();

        return back()->with('success', 'Subscription renewed for 1 year.');
    }
    public function revenue()
    {
        // Counts
        $basicCount = Tenant::where('plan', 'basic')->count();
        $essentialCount = Tenant::where('plan', 'essential')->count();
        $proCount = Tenant::where('plan', 'pro')->count();

        // Revenue Breakdown
        $basicRevenue = $basicCount * 2999;
        $essentialRevenue = $essentialCount * 6500;
        $proRevenue = $proCount * 7000;
        $totalRevenue = $basicRevenue + $essentialRevenue + $proRevenue;

        // Paying Tenants for List
        $payingTenants = Tenant::whereIn('plan', ['essential', 'pro'])
                               ->with('admin')
                               ->orderBy('plan', 'desc') // Pro first
                               ->get();

        return view('super_admin.revenue.index', compact(
            'basicCount', 'essentialCount', 'proCount',
            'basicRevenue', 'essentialRevenue', 'proRevenue',
            'totalRevenue', 'payingTenants'
        ));
    }
}
