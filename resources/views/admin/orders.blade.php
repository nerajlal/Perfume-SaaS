@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 fw-bold text-dark mb-0">Orders</h1>
    <!-- <button class="btn btn-success shadow-sm">Content placeholder</button> -->
</div>

<div class="card border shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted small text-uppercase">
                <tr>
                    <th class="px-3 py-3 border-0 fw-medium">Order</th>
                    <th class="px-3 py-3 border-0 fw-medium">Date</th>
                    <th class="px-3 py-3 border-0 fw-medium">Customer</th>
                    <th class="px-3 py-3 border-0 fw-medium">Total</th>
                    <th class="px-3 py-3 border-0 fw-medium">Payment</th>
                    <th class="px-3 py-3 border-0 fw-medium">Fulfillment</th>
                    <th class="px-3 py-3 border-0 fw-medium text-end">Items</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Row 1 -->
                <tr class="cursor-pointer" onclick="window.location='{{ route('admin.orders.show', 1025) }}'">
                    <td class="px-3 py-3 fw-semibold text-dark"><a href="{{ route('admin.orders.show', 1025) }}" class="text-decoration-none text-dark hover-primary">#1025</a></td>
                    <td class="px-3 py-3 text-secondary">Just now</td>
                    <td class="px-3 py-3">John Doe</td>
                    <td class="px-3 py-3 text-dark">₹3,500.00</td>
                    <td class="px-3 py-3"><span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1 rounded-pill fw-medium">Pending</span></td>
                    <td class="px-3 py-3"><span class="badge bg-warning bg-opacity-10 text-warning px-2 py-1 rounded-pill fw-medium">Unfulfilled</span></td>
                    <td class="px-3 py-3 text-end">1</td>
                </tr>
                <!-- Dummy Row 2 -->
                <tr class="cursor-pointer" onclick="window.location='{{ route('admin.orders.show', 1024) }}'">
                    <td class="px-3 py-3 fw-semibold text-dark"><a href="{{ route('admin.orders.show', 1024) }}" class="text-decoration-none text-dark hover-primary">#1024</a></td>
                    <td class="px-3 py-3 text-secondary">Today, 9:21 AM</td>
                    <td class="px-3 py-3">Sarah Jenkins</td>
                    <td class="px-3 py-3 text-dark">₹8,400.00</td>
                    <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill fw-medium">Paid</span></td>
                    <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill fw-medium">Delivered</span></td>
                    <td class="px-3 py-3 text-end">3</td>
                </tr>
                 <!-- Dummy Row 3 -->
                 <tr class="cursor-pointer" onclick="window.location='{{ route('admin.orders.show', 1023) }}'">
                    <td class="px-3 py-3 fw-semibold text-dark"><a href="{{ route('admin.orders.show', 1023) }}" class="text-decoration-none text-dark hover-primary">#1023</a></td>
                    <td class="px-3 py-3 text-secondary">Yesterday</td>
                    <td class="px-3 py-3">Michael Ross</td>
                    <td class="px-3 py-3 text-dark">₹2,100.00</td>
                    <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill fw-medium">Paid</span></td>
                    <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success px-2 py-1 rounded-pill fw-medium">Delivered</span></td>
                    <td class="px-3 py-3 text-end">1</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Pagination Dummy -->
    <div class="card-footer bg-white border-top p-3 d-flex justify-content-end gap-2 text-muted small">
        <button class="btn btn-white border btn-sm text-secondary" disabled>Previous</button>
        <button class="btn btn-white border btn-sm text-secondary">Next</button>
    </div>
</div>
@endsection
