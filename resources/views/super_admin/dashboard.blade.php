@extends('super_admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Super Admin Dashboard</h1>
        <p class="text-muted small">Manage your tenants and site configurations.</p>
    </div>
    <a href="{{ route('super_admin.create_tenant') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus me-2"></i> Create New Tenant
    </a>
</div>

<div class="card border shadow-sm">
    <div class="card-header bg-white py-3">
        <div class="row g-3 align-items-center justify-content-between">
            <div class="col-md-auto">
                <h5 class="mb-0 text-dark fw-bold">Active Tenants</h5>
            </div>
            <div class="col-md-auto">
                <form action="{{ route('super_admin.dashboard') }}" method="GET" class="d-flex gap-2">
                    <!-- Status Filter -->
                    <div class="btn-group" role="group">
                        <a href="{{ route('super_admin.dashboard', array_merge(request()->query(), ['status' => null])) }}" class="btn btn-outline-secondary btn-sm {{ !request('status') ? 'active' : '' }}">All</a>
                        <a href="{{ route('super_admin.dashboard', array_merge(request()->query(), ['status' => 'active'])) }}" class="btn btn-outline-success btn-sm {{ request('status') == 'active' ? 'active' : '' }}">Active</a>
                        <a href="{{ route('super_admin.dashboard', array_merge(request()->query(), ['status' => 'inactive'])) }}" class="btn btn-outline-danger btn-sm {{ request('status') == 'inactive' ? 'active' : '' }}">Inactive</a>
                    </div>
                    
                    <!-- Search Input -->
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="search" class="form-control" placeholder="Search store name..." value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>

                    <!-- Sort Dropdown -->
                    <select name="sort" class="form-select form-select-sm" style="width: 150px;" onchange="this.form.submit()">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted small text-uppercase">
                <tr>
                    <th class="px-3 py-2 border-0 fw-medium">ID</th>
                    <th class="px-3 py-2 border-0 fw-medium">Store Name</th>
                    <th class="px-3 py-2 border-0 fw-medium">Domain</th>
                    <th class="px-3 py-2 border-0 fw-medium">Plan</th>
                    <th class="px-3 py-2 border-0 fw-medium">Expires On</th>
                    <th class="px-3 py-2 border-0 fw-medium">Admin</th>
                    <th class="px-3 py-2 border-0 fw-medium">Status</th>
                    <th class="px-3 py-2 border-0 fw-medium text-end">Actions</th>
                </tr>
            </thead>
            <tbody id="tenants-table-body">
                @include('super_admin.partials.tenants_table_body')
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.querySelector('input[name="search"]');
        const tableBody = document.getElementById('tenants-table-body');
        let timeout = null;

        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            const query = this.value;
            const url = new URL(window.location.href);
            url.searchParams.set('search', query);

            timeout = setTimeout(() => {
                fetch(url.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    tableBody.innerHTML = html;
                    // Update URL without reloading
                    window.history.pushState({}, '', url);
                });
            }, 300); // Debounce 300ms
        });
    });
</script>
@endsection
