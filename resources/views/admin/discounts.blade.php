@extends('layouts.admin')

@section('title', 'Discounts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-dark">Discounts</h1>
    <a href="{{ route('admin.discounts.create') }}" class="btn btn-success shadow-sm">Create discount</a>
</div>

<!-- Stats -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border shadow-sm p-3 text-center">
            <div class="h3 fw-bold text-dark mb-0">2</div>
            <div class="small text-muted text-uppercase tracking-wide mt-1">Total</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border shadow-sm p-3 text-center">
            <div class="h3 fw-bold text-success mb-0">2</div>
            <div class="small text-muted text-uppercase tracking-wide mt-1">Active</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border shadow-sm p-3 text-center">
            <div class="h3 fw-bold text-secondary opacity-50 mb-0">0</div>
            <div class="small text-muted text-uppercase tracking-wide mt-1">Expired</div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border shadow-sm p-3 text-center">
            <div class="h3 fw-bold text-secondary opacity-50 mb-0">0</div>
            <div class="small text-muted text-uppercase tracking-wide mt-1">Inactive</div>
        </div>
    </div>
</div>

<div class="card border shadow-sm mb-4">
    <!-- Toolbar -->
    <div class="card-header bg-light border-bottom p-3 d-flex gap-3">
        <div class="flex-grow-1">
             <div class="input-group input-group-sm">
                 <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                 <input type="text" placeholder="Search discounts" class="form-control border-start-0 shadow-none">
             </div>
        </div>
        <button class="btn btn-white border btn-sm shadow-sm text-secondary">
            <i class="fas fa-filter me-2"></i> Filter
        </button>
        <button class="btn btn-white border btn-sm shadow-sm text-secondary">
            <i class="fas fa-sort me-2"></i> Sort
        </button>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 text-secondary">
            <thead class="bg-light text-uppercase small fw-medium text-muted">
                <tr>
                    <th class="px-3 py-3" style="width: 50px;"><div class="form-check"><input type="checkbox" class="form-check-input"></div></th>
                    <th class="px-3 py-3">Discount code</th>
                    <th class="px-3 py-3">Status</th>
                    <th class="px-3 py-3">Discount</th>
                    <th class="px-3 py-3">Valid Period</th>
                    <th class="px-3 py-3 text-end">Used</th>
                    <th class="px-3 py-3 text-end">Actions</th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <tr>
                     <td class="px-3 py-3"><div class="form-check"><input type="checkbox" class="form-check-input"></div></td>
                    <td class="px-3 py-3">
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-dark">SY2QA0ZM</span>
                            <span class="small text-muted">Midnight Oud 50ml</span>
                        </div>
                    </td>
                    <td class="px-3 py-3">
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 fw-medium">Active</span>
                    </td>
                    <td class="px-3 py-3 text-dark">
                        5% off
                    </td>
                    <td class="px-3 py-3 text-muted small">
                        Dec 20, 2025 - Dec 31, 2025
                    </td>
                    <td class="px-3 py-3 text-end">
                        0
                    </td>
                    <td class="px-3 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2">
                             <a href="{{ route('admin.discounts.edit', 1) }}" class="btn btn-white btn-sm border-0 text-secondary hover-text-primary p-1"><i class="fas fa-edit"></i></a>
                             <button class="btn btn-white btn-sm border-0 text-secondary hover-text-danger p-1"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                 <tr>
                     <td class="px-3 py-3"><div class="form-check"><input type="checkbox" class="form-check-input"></div></td>
                    <td class="px-3 py-3">
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-dark">HT00XAL8</span>
                            <span class="small text-muted">Rose & Amber Set</span>
                        </div>
                    </td>
                    <td class="px-3 py-3">
                        <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 fw-medium">Active</span>
                    </td>
                    <td class="px-3 py-3 text-dark">
                        10% off
                    </td>
                    <td class="px-3 py-3 text-muted small">
                         Dec 11, 2025 - Jan 02, 2026
                    </td>
                    <td class="px-3 py-3 text-end">
                        12
                    </td>
                    <td class="px-3 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2">
                             <a href="{{ route('admin.discounts.edit', 2) }}" class="btn btn-white btn-sm border-0 text-secondary hover-text-primary p-1"><i class="fas fa-edit"></i></a>
                             <button class="btn btn-white btn-sm border-0 text-secondary hover-text-danger p-1"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<style>
    .hover-text-primary:hover { color: var(--bs-primary) !important; }
    .hover-text-danger:hover { color: var(--bs-danger) !important; }
</style>


@endsection
