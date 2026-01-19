@extends('super_admin.layouts.app')

@section('title', 'Yearly Revenue')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Yearly Revenue Overview</h1>
        <p class="text-muted small">Financial performance based on active subscriptions.</p>
    </div>
    <a href="{{ route('super_admin.dashboard') }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
    </a>
</div>

<!-- Revenue Summary -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100 bg-dark text-white">
            <div class="card-body">
                <h6 class="text-white-50 text-uppercase small fw-bold mb-2">Total Yearly Revenue</h6>
                <h2 class="display-6 fw-bold mb-0">₹{{ number_format($totalRevenue, 2) }}</h2>
                <small class="text-white-50">Projected Annual Income</small>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="text-muted text-uppercase small fw-bold mb-0">Basic (₹2,999)</h6>
                    <span class="badge bg-secondary">{{ $basicCount }} Stores</span>
                </div>
                <hr class="my-3 opacity-10">
                <h3 class="fw-bold text-dark mb-0">₹{{ number_format($basicRevenue) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="text-muted text-uppercase small fw-bold mb-0">Essential (₹6,500)</h6>
                    <span class="badge bg-primary">{{ $essentialCount }} Stores</span>
                </div>
                <hr class="my-3 opacity-10">
                <h3 class="fw-bold text-dark mb-0">₹{{ number_format($essentialRevenue) }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="text-muted text-uppercase small fw-bold mb-0">Pro (₹7,000)</h6>
                    <span class="badge bg-warning text-dark">{{ $proCount }} Stores</span>
                </div>
                <hr class="my-3 opacity-10">
                <h3 class="fw-bold text-dark mb-0">₹{{ number_format($proRevenue) }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Paying Tenants List -->
<div class="card border shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-dark fw-bold">Premium Subscribers</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted small text-uppercase">
                <tr>
                    <th class="px-3 py-2 border-0 fw-medium">Store</th>
                    <th class="px-3 py-2 border-0 fw-medium">Plan</th>
                    <th class="px-3 py-2 border-0 fw-medium">Value</th>
                    <th class="px-3 py-2 border-0 fw-medium">Expires On</th>
                    <th class="px-3 py-2 border-0 fw-medium">Contact</th>
                </tr>
            </thead>
            <tbody>
                @forelse($payingTenants as $tenant)
                <tr>
                    <td class="px-3 py-3">
                        <span class="d-block fw-bold text-dark">{{ $tenant->name }}</span>
                        <small class="text-muted">{{ $tenant->domain }}</small>
                    </td>
                    <td class="px-3 py-3">
                        @if($tenant->plan == 'pro')
                            <span class="badge bg-warning text-dark">Pro</span>
                        @else
                            <span class="badge bg-primary">Essential</span>
                        @endif
                    </td>
                    <td class="px-3 py-3 fw-bold text-dark">
                        {{ $tenant->plan == 'pro' ? '₹7,000' : '₹6,500' }}
                    </td>
                    <td class="px-3 py-3 text-muted small">
                        {{ $tenant->subscription_ends_at->format('M d, Y') }}
                    </td>
                    <td class="px-3 py-3 small text-muted">
                        {{ $tenant->admin->email ?? 'N/A' }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-coins fs-1 mb-3 text-warning opacity-25"></i>
                            <p class="mb-0">No premium subscribers yet.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
