@extends('layouts.admin')

@section('title', 'Bundles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-dark">Bundles</h1>
    <a href="{{ route('admin.bundles.create') }}" class="btn btn-success shadow-sm">Create bundle</a>
</div>

<div class="card border shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 text-secondary">
            <thead class="bg-light text-uppercase small fw-medium text-muted">
                 <tr>
                    <th class="px-3 py-3" style="width: 50px;"><div class="form-check"><input type="checkbox" class="form-check-input"></div></th>
                    <th class="px-3 py-3">Title</th>
                    <th class="px-3 py-3">Status</th>
                    <th class="px-3 py-3">Products</th>
                    <th class="px-3 py-3">Total Sales</th>
                    <th class="px-3 py-3" style="width: 80px;"></th>
                 </tr>
            </thead>
            <tbody class="border-top-0">
                <tr class="cursor-pointer" onclick="window.location='{{ route('admin.bundles.edit', 1) }}'">
                    <td class="px-3 py-3" onclick="event.stopPropagation()"><div class="form-check"><input type="checkbox" class="form-check-input"></div></td>
                    <td class="px-3 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center bg-light border rounded overflow-hidden" style="width: 40px; height: 40px;">
                                <i class="fas fa-cubes text-secondary opacity-50"></i>
                            </div>
                            <span class="fw-medium text-dark text-decoration-hover-underline">Summer Essentials Bundle</span>
                        </div>
                    </td>
                    <td class="px-3 py-3"><span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 py-1 fw-medium">Active</span></td>
                    <td class="px-3 py-3">3 products</td>
                    <td class="px-3 py-3">₹ 1,250.00</td>
                    <td class="px-3 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2" onclick="event.stopPropagation()">
                             <a href="{{ route('admin.bundles.edit', 1) }}" class="btn btn-white btn-sm border-0 text-secondary hover-text-primary p-1"><i class="fas fa-edit"></i></a>
                             <button class="btn btn-white btn-sm border-0 text-secondary hover-text-danger p-1"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                 <tr class="cursor-pointer" onclick="window.location='{{ route('admin.bundles.edit', 2) }}'">
                    <td class="px-3 py-3" onclick="event.stopPropagation()"><div class="form-check"><input type="checkbox" class="form-check-input"></div></td>
                    <td class="px-3 py-3">
                         <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center bg-light border rounded overflow-hidden" style="width: 40px; height: 40px;">
                                <i class="fas fa-cubes text-secondary opacity-50"></i>
                            </div>
                            <span class="fw-medium text-dark text-decoration-hover-underline">Oud Lovers Kit</span>
                        </div>
                    </td>
                    <td class="px-3 py-3"><span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-2 py-1 fw-medium">Draft</span></td>
                    <td class="px-3 py-3">2 products</td>
                    <td class="px-3 py-3">₹ 1000.00</td>
                    <td class="px-3 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2" onclick="event.stopPropagation()">
                             <a href="{{ route('admin.bundles.edit', 2) }}" class="btn btn-white btn-sm border-0 text-secondary hover-text-primary p-1"><i class="fas fa-edit"></i></a>
                             <button class="btn btn-white btn-sm border-0 text-secondary hover-text-danger p-1"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<style>
    .text-decoration-hover-underline:hover { text-decoration: underline !important; }
    .hover-text-primary:hover { color: var(--bs-primary) !important; }
    .hover-text-danger:hover { color: var(--bs-danger) !important; }
</style>
@endsection
