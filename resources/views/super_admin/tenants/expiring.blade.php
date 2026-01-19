@extends('super_admin.layouts.app')

@section('title', 'Expiring Subscriptions')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Expiring Subscriptions</h1>
        <p class="text-muted small">Subscription plans expiring in the next 30 days.</p>
    </div>
    <a href="{{ route('super_admin.tenants') }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa-arrow-left me-2"></i> Back to All Stores
    </a>
</div>

<div class="card border shadow-sm">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 text-dark fw-bold text-danger">Expiring Soon</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted small text-uppercase">
                <tr>
                    <th class="px-3 py-2 border-0 fw-medium">Store</th>
                    <th class="px-3 py-2 border-0 fw-medium">Plan</th>
                    <th class="px-3 py-2 border-0 fw-medium">Expires On</th>
                    <th class="px-3 py-2 border-0 fw-medium">Admin</th>
                    <th class="px-3 py-2 border-0 fw-medium text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tenants as $tenant)
                <tr>
                    <td class="px-3 py-3">
                        <span class="d-block fw-bold text-dark">{{ $tenant->name }}</span>
                        <a href="http://{{ $tenant->domain }}" target="_blank" class="text-decoration-none small text-muted">
                            {{ $tenant->domain }} <i class="fas fa-external-link-alt" style="font-size: 10px;"></i>
                        </a>
                    </td>
                    <td class="px-3 py-3">
                        <span class="badge border text-dark">{{ ucfirst($tenant->plan) }}</span>
                    </td>
                    <td class="px-3 py-3">
                        <span class="d-block fw-bold text-danger">
                            {{ $tenant->subscription_ends_at->format('M d, Y') }}
                        </span>
                        <small class="text-muted">{{ $tenant->subscription_ends_at->diffForHumans() }}</small>
                    </td>
                    <td class="px-3 py-3 small">
                        <div class="fw-medium text-dark">{{ $tenant->admin->name ?? 'N/A' }}</div>
                        <div class="text-muted">{{ $tenant->admin->email ?? '-' }}</div>
                    </td>
                    <td class="px-3 py-3 text-end">
                        <form action="{{ route('super_admin.tenants.renew', $tenant->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-dark shadow-sm" title="Renew for 1 Year">
                                <i class="fas fa-sync-alt me-1"></i> Renew
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-check-circle fs-1 mb-3 text-success opacity-25"></i>
                            <p class="mb-0">No subscriptions expiring soon.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
