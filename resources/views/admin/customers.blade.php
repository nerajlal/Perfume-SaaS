@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-dark">Customers</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.customers.create') }}" class="btn btn-success shadow-sm">Add customer</a>
    </div>
</div>

<div class="card border shadow-sm container-fluid p-0" style="min-height: 400px;">
    <div class="card-header bg-light border-bottom p-3 d-flex gap-3">
        <div class="flex-grow-1">
             <div class="input-group input-group-sm">
                 <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                 <input type="text" placeholder="Search customers" class="form-control border-start-0 shadow-none">
             </div>
        </div>
        <button class="btn btn-white border btn-sm shadow-sm text-secondary">
            <i class="fas fa-filter me-2"></i> Filter
        </button>
        <button class="btn btn-white border btn-sm shadow-sm text-secondary">
            <i class="fas fa-sort me-2"></i> Sort
        </button>
    </div>

    <!-- Placeholder Content -->
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 text-secondary">
             <thead class="bg-light text-uppercase small fw-medium text-muted">
                 <tr>
                    <th class="px-3 py-3" style="width: 50px;"><div class="form-check"><input type="checkbox" class="form-check-input"></div></th>
                    <th class="px-3 py-3">Customer name</th>
                    <th class="px-3 py-3">Email subscription</th>
                    <th class="px-3 py-3">Location</th>
                    <th class="px-3 py-3">Orders</th>
                    <th class="px-3 py-3 text-end">Amount spent</th>
                 </tr>
            </thead>
             <tbody class="border-top-0">
                <tr class="cursor-pointer" onclick="window.location='{{ route('admin.customers.show', 1) }}'">
                    <td class="px-3 py-3" onclick="event.stopPropagation()"><div class="form-check"><input type="checkbox" class="form-check-input"></div></td>
                    <td class="px-3 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-purple-subtle text-purple fw-bold small" style="width: 32px; height: 32px;">SJ</div>
                            <div>
                                <p class="mb-0 fw-semibold text-dark text-decoration-hover-underline">Sarah Jenkins</p>
                                <p class="mb-0 small text-muted">sarah@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 fw-medium">Subscribed</span></td>
                    <td class="px-3 py-3">Mumbai, India</td>
                    <td class="px-3 py-3">5 orders</td>
                    <td class="px-3 py-3 text-end fw-medium text-dark">₹12,400.00</td>
                </tr>
                 <tr class="cursor-pointer" onclick="window.location='{{ route('admin.customers.show', 2) }}'">
                    <td class="px-3 py-3" onclick="event.stopPropagation()"><div class="form-check"><input type="checkbox" class="form-check-input"></div></td>
                    <td class="px-3 py-3">
                         <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary-subtle text-primary fw-bold small" style="width: 32px; height: 32px;">JD</div>
                            <div>
                                <p class="mb-0 fw-semibold text-dark text-decoration-hover-underline">John Doe</p>
                                <p class="mb-0 small text-muted">john@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-3 py-3"><span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2 py-1 fw-medium">Not subscribed</span></td>
                    <td class="px-3 py-3">Delhi, India</td>
                    <td class="px-3 py-3">1 order</td>
                    <td class="px-3 py-3 text-end fw-medium text-dark">₹3,500.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<style>
    .bg-purple-subtle { background-color: #e9d5ff !important; }
    .text-purple { color: #9333ea !important; }
    .text-decoration-hover-underline:hover { text-decoration: underline !important; }
</style>
@endsection
