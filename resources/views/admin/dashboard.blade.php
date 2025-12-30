@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Welcome Section -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 fw-bold text-dark mb-1">Dashboard</h1>
        <p class="text-muted small">Overview of your store's performance.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <span class="small text-muted bg-white border border-light px-3 py-2 rounded shadow-sm">
            <i class="far fa-calendar-alt me-2 text-secondary"></i> Today, {{ date('M d, Y') }}
        </span>
    </div>
</div>

<!-- Metrics Grid -->
<div class="row g-3 mb-4">
    <!-- Total Sales -->
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card p-3 h-100 border shadow-sm position-relative">
            <a href="{{ route('admin.analytics') }}" class="stretched-link"></a>
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="p-2 bg-success bg-opacity-10 rounded">
                    <i class="fas fa-coins text-success"></i>
                </div>
                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 small d-flex align-items-center">
                    <i class="fas fa-arrow-up me-1"></i> 12%
                </span>
            </div>
            <h3 class="small fw-medium text-muted mb-1">Total Sales</h3>
            <span class="fs-4 fw-bold text-dark">₹45,231.00</span>
            <p class="small text-muted mt-2 mb-0">vs. ₹40,100 last period</p>
        </div>
    </div>

    <!-- Total Orders -->
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card p-3 h-100 border shadow-sm position-relative">
            <a href="{{ route('admin.orders') }}" class="stretched-link"></a>
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="p-2 bg-primary bg-opacity-10 rounded">
                    <i class="fas fa-shopping-bag text-primary"></i>
                </div>
                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-2 py-1 small d-flex align-items-center">
                    <i class="fas fa-arrow-up me-1"></i> 8%
                </span>
            </div>
            <h3 class="small fw-medium text-muted mb-1">Total Orders</h3>
            <span class="fs-4 fw-bold text-dark">124</span>
            <p class="small text-muted mt-2 mb-0">vs. 112 last period</p>
        </div>
    </div>

    <!-- Customers -->
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card p-3 h-100 border shadow-sm position-relative">
            <a href="{{ route('admin.customers') }}" class="stretched-link"></a>
            <div class="d-flex justify-content-between align-items-start mb-3">
                 <div class="p-2 bg-info bg-opacity-10 rounded">
                    <i class="fas fa-users text-info"></i>
                </div>
                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 small d-flex align-items-center">
                    <i class="fas fa-arrow-up me-1"></i> 4%
                </span>
            </div>
            <h3 class="small fw-medium text-muted mb-1">New Customers</h3>
            <span class="fs-4 fw-bold text-dark">45</span>
            <p class="small text-muted mt-2 mb-0">vs. 41 last period</p>
        </div>
    </div>

    <!-- Low Stock Items (Replaces AOV) -->
     <div class="col-12 col-md-6 col-lg-3">
        <div class="card p-3 h-100 border shadow-sm position-relative">
            <a href="{{ route('admin.products') }}" class="stretched-link"></a>
            <div class="d-flex justify-content-between align-items-start mb-3">
                 <div class="p-2 bg-danger bg-opacity-10 rounded">
                    <i class="fas fa-exclamation-triangle text-danger"></i>
                </div>
                 <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 py-1 small d-flex align-items-center">
                    Action Needed
                </span>
            </div>
            <h3 class="small fw-medium text-muted mb-1">Low Stock Items</h3>
            <span class="fs-4 fw-bold text-dark">3</span>
            <p class="small text-muted mt-2 mb-0">Restock required</p>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Orders -->
    <div class="col-12 col-lg-8">
        <div class="card border shadow-sm h-100">
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <h2 class="h6 fw-bold text-dark mb-0">Recent Orders</h2>
                <a href="{{ route('admin.orders') }}" class="small text-success text-decoration-none fw-medium">View all</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase">
                        <tr>
                            <th class="px-3 py-2 border-0 fw-medium">Order</th>
                            <th class="px-3 py-2 border-0 fw-medium">Customer</th>
                            <th class="px-3 py-2 border-0 fw-medium">Total</th>
                            <th class="px-3 py-2 border-0 fw-medium">Status</th>
                            <th class="px-3 py-2 border-0 fw-medium text-end">Items</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-3 py-3 fw-semibold text-dark">#1024</td>
                            <td class="px-3 py-3">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium text-dark">Sarah Jenkins</span>
                                    <span class="small text-muted">sarah@example.com</span>
                                </div>
                            </td>
                            <td class="px-3 py-3 text-dark">₹8,400</td>
                            <td class="px-3 py-3"><span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1 rounded-pill fw-medium">Pending</span></td>
                            <td class="px-3 py-3 text-end">3</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3 fw-semibold text-dark">#1023</td>
                            <td class="px-3 py-3">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium text-dark">Mike Ross</span>
                                    <span class="small text-muted">mike.r@example.com</span>
                                </div>
                            </td>
                            <td class="px-3 py-3 text-dark">₹2,100</td>
                            <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill fw-medium">Paid</span></td>
                            <td class="px-3 py-3 text-end">1</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-3 fw-semibold text-dark">#1022</td>
                            <td class="px-3 py-3">
                                <div class="d-flex flex-column">
                                    <span class="fw-medium text-dark">Emma Watson</span>
                                    <span class="small text-muted">emma.w@example.com</span>
                                </div>
                            </td>
                            <td class="px-3 py-3 text-dark">₹12,500</td>
                            <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill fw-medium">Paid</span></td>
                            <td class="px-3 py-3 text-end">4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Low Stock Alerts -->
    <div class="col-12 col-lg-4">
        <div class="card border shadow-sm h-100">
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <h2 class="h6 fw-bold text-dark mb-0">Low Stock Alerts</h2>
                <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill">3</span>
            </div>
            <div class="p-3 d-flex flex-column gap-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded bg-danger bg-opacity-10 text-danger" style="width: 40px; height: 40px;">
                            <i class="fas fa-exclamation-triangle small"></i>
                        </div>
                        <div>
                            <h4 class="small fw-medium text-dark mb-0">Black Musk (50ml)</h4>
                            <p class="small text-danger fw-medium mb-0">Only 2 left</p>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary py-1 px-2" style="font-size: 0.75rem;">Restock</button>
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded bg-warning bg-opacity-10 text-warning" style="width: 40px; height: 40px;">
                            <i class="fas fa-box-open small"></i>
                        </div>
                        <div>
                            <h4 class="small fw-medium text-dark mb-0">Amber Wood (100ml)</h4>
                            <p class="small text-warning fw-medium mb-0">5 left</p>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary py-1 px-2" style="font-size: 0.75rem;">Restock</button>
                </div>

                 <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded bg-warning bg-opacity-10 text-warning" style="width: 40px; height: 40px;">
                            <i class="fas fa-box-open small"></i>
                        </div>
                        <div>
                            <h4 class="small fw-medium text-dark mb-0">Vanilla Essence (Tester)</h4>
                            <p class="small text-warning fw-medium mb-0">8 left</p>
                        </div>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary py-1 px-2" style="font-size: 0.75rem;">Restock</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
