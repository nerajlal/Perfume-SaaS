@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <h1 class="h3 fw-bold text-dark mb-0">Products</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-success shadow-sm">Add product</a>
</div>

<div class="card border shadow-sm">
    <div class="card-header bg-light border-bottom p-3">
        <div class="d-flex gap-3">
            <div class="flex-grow-1">
                 <div class="input-group shadow-sm">
                     <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                     <input type="text" class="form-control border-start-0 ps-0 shadow-none" placeholder="Filter products">
                 </div>
            </div>
            <button class="btn btn-white border shadow-sm text-secondary bg-white">
                <i class="fas fa-sort me-2"></i> Sort
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted small text-uppercase">
                 <tr>
                    <th class="px-3 py-3 w-auto"><input type="checkbox" class="form-check-input"></th>
                    <th class="px-3 py-3 border-0 fw-medium">Product</th>
                    <th class="px-3 py-3 border-0 fw-medium">Status</th>
                    <th class="px-3 py-3 border-0 fw-medium">Inventory</th>
                    <th class="px-3 py-3 border-0 fw-medium">Type</th>
                    <th class="px-3 py-3 border-0 fw-medium">Vendor</th>
                    <th class="px-3 py-3 text-end" style="width: 100px;"></th>
                 </tr>
            </thead>
            <tbody>
                <tr class="cursor-pointer" onclick="window.location='{{ route('admin.products.edit', 1) }}'">
                    <td class="px-3 py-3" onclick="event.stopPropagation()"><input type="checkbox" class="form-check-input"></td>
                    <td class="px-3 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded border d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                <i class="fas fa-image text-secondary opacity-50"></i>
                            </div>
                            <span class="fw-medium text-dark hover-primary mb-0">Midnight Oud 50ml</span>
                        </div>
                    </td>
                    <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success rounded-pill fw-medium">Active</span></td>
                    <td class="px-3 py-3 text-secondary">25 in stock</td>
                    <td class="px-3 py-3">Perfume</td>
                    <td class="px-3 py-3">Nurah</td>
                    <td class="px-3 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2" onclick="event.stopPropagation()">
                            <a href="{{ route('admin.products.edit', 1) }}" class="btn btn-sm btn-link text-secondary hover-primary p-0"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm btn-link text-secondary hover-danger p-0 ms-2"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                 <tr class="cursor-pointer" onclick="window.location='{{ route('admin.products.edit', 2) }}'">
                    <td class="px-3 py-3" onclick="event.stopPropagation()"><input type="checkbox" class="form-check-input"></td>
                    <td class="px-3 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="bg-light rounded border d-flex align-items-center justify-content-center flex-shrink-0" style="width: 48px; height: 48px;">
                                <i class="fas fa-image text-secondary opacity-50"></i>
                            </div>
                            <span class="fw-medium text-dark hover-primary mb-0">Rose & Amber Gift Set</span>
                        </div>
                    </td>
                    <td class="px-3 py-3"><span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill fw-medium">Draft</span></td>
                    <td class="px-3 py-3 text-secondary">0 in stock</td>
                    <td class="px-3 py-3">Gift Set</td>
                    <td class="px-3 py-3">Nurah</td>
                     <td class="px-3 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2" onclick="event.stopPropagation()">
                            <a href="{{ route('admin.products.edit', 2) }}" class="btn btn-sm btn-link text-secondary hover-primary p-0"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm btn-link text-secondary hover-danger p-0 ms-2"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
