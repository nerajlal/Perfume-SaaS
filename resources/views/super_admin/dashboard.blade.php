@extends('super_admin.layouts.app')

@section('title', 'Overview')

@section('content')
<div class="mb-4">
    <h1 class="h3 fw-bold text-dark mb-1">Dashboard Overview</h1>
    <p class="text-muted small">Welcome back, Super Admin. Here's what's happening today.</p>
</div>

<!-- Stats Row -->
<div class="row g-3 mb-4">
    <!-- Total Stores -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted text-uppercase small fw-bold mb-0">Total Stores</h6>
                    <div class="icon-shape bg-light text-primary rounded-circle p-2">
                        <i class="fas fa-store"></i>
                    </div>
                </div>
                <h2 class="display-6 fw-bold text-dark mb-0">{{ $totalStores }}</h2>
            </div>
        </div>
    </div>

    <!-- Active Stores -->
    <div class="col-md-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted text-uppercase small fw-bold mb-0">Active Stores</h6>
                    <div class="icon-shape bg-light text-success rounded-circle p-2">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <h2 class="display-6 fw-bold text-dark mb-0">{{ $activeStores }}</h2>
            </div>
        </div>
    </div>

    <!-- Yearly Revenue (Mock) -->
    <div class="col-md-3">
        <a href="{{ route('super_admin.revenue') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="text-muted text-uppercase small fw-bold mb-0">Yearly Revenue</h6>
                        <div class="icon-shape bg-light text-info rounded-circle p-2">
                            <i class="fas fa-rupee-sign"></i>
                        </div>
                    </div>
                    <h2 class="display-6 fw-bold text-dark mb-0">₹{{ number_format($yearlyRevenue, 2) }}</h2>
                    <small class="text-muted" style="font-size: 10px;">stimated based on plans &bull; Click to View</small>
                </div>
            </div>
        </a>
    </div>

    <!-- Expiring Soon -->
    <div class="col-md-3">
        <a href="{{ route('super_admin.tenants.expiring') }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm h-100 hover-shadow transition-all">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="text-muted text-uppercase small fw-bold mb-0">Expiring Soon</h6>
                        <div class="icon-shape bg-light text-warning rounded-circle p-2">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <h2 class="display-6 fw-bold text-dark mb-0">{{ $expiringSoon }}</h2>
                    <small class="text-muted" style="font-size: 10px;">Next 30 Days &bull; Click to View</small>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Recent Activity -->
<div class="row">
    <div class="col-12">
        <div class="card border shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-dark fw-bold">Recent Signups</h5>
                <a href="{{ route('super_admin.tenants') }}" class="btn btn-sm btn-link text-decoration-none">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="px-3 py-2 border-0 fw-medium">Store</th>
                            <th class="px-3 py-2 border-0 fw-medium">Plan</th>
                            <th class="px-3 py-2 border-0 fw-medium">Admin</th>
                            <th class="px-3 py-2 border-0 fw-medium">Created</th>
                            <th class="px-3 py-2 border-0 fw-medium text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTenants as $tenant)
                        <tr>
                            <td class="px-3 py-3">
                                <span class="d-block fw-bold text-dark">{{ $tenant->name }}</span>
                                <small class="text-muted">{{ $tenant->domain }}</small>
                            </td>
                            <td class="px-3 py-3">
                                <span class="badge bg-light text-dark border">{{ ucfirst($tenant->plan) }}</span>
                            </td>
                            <td class="px-3 py-3 small text-muted">
                                {{ $tenant->admin->email ?? 'N/A' }}
                            </td>
                            <td class="px-3 py-3 small text-muted">
                                {{ $tenant->created_at->diffForHumans() }}
                            </td>
                            <td class="px-3 py-3 text-end">
                                @if($tenant->status)
                                    <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                @else
                                    <span class="badge bg-danger bg-opacity-10 text-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No recent signups.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
