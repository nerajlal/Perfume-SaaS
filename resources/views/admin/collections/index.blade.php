@extends('layouts.admin')

@section('title', 'Collections')

@section('content')
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
    <h1 class="h3 mb-0 text-dark">Collections</h1>
    <a href="{{ route('admin.collections.create') }}" class="btn btn-success shadow-sm fw-medium">Create collection</a>
</div>

<div class="card border shadow-sm container-fluid p-0 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 text-start">
            <thead class="bg-light text-secondary small text-uppercase fw-medium">
                 <tr>
                    <th class="px-4 py-3" style="width: 50px;">
                        <input class="form-check-input" type="checkbox">
                    </th>
                    <th class="px-4 py-3 border-bottom">Title</th>
                    <th class="px-4 py-3 border-bottom">Products</th>
                    <th class="px-4 py-3 border-bottom">Conditions</th>
                    <th class="px-4 py-3 border-bottom" style="width: 100px;"></th>
                 </tr>
            </thead>
            <tbody class="divide-y">
                <tr class="cursor-pointer group" onclick="window.location='{{ route('admin.collections.show', 1) }}'">
                    <td class="px-4 py-3" onclick="event.stopPropagation()">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="px-4 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded border flex-shrink-0 overflow-hidden" style="width: 40px; height: 40px;">
                                <!-- Placeholder Image -->
                                <i class="fas fa-image text-secondary opacity-50"></i>
                            </div>
                            <span class="fw-medium text-dark text-decoration-underline-hover">Best Sellers</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-secondary">12 products</td>
                    <td class="px-4 py-3 text-secondary">Manual</td>
                    <td class="px-4 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2" onclick="event.stopPropagation()">
                            <a href="{{ route('admin.collections.show', 1) }}" class="btn btn-sm btn-white border shadow-sm text-secondary hover-text-primary"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm btn-white border shadow-sm text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                 <tr class="cursor-pointer group" onclick="window.location='{{ route('admin.collections.show', 2) }}'">
                    <td class="px-4 py-3" onclick="event.stopPropagation()">
                        <input class="form-check-input" type="checkbox">
                    </td>
                    <td class="px-4 py-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded border flex-shrink-0 overflow-hidden" style="width: 40px; height: 40px;">
                                <i class="fas fa-image text-secondary opacity-50"></i>
                            </div>
                            <span class="fw-medium text-dark text-decoration-underline-hover">New Arrivals</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-secondary">8 products</td>
                    <td class="px-4 py-3 text-secondary">Automated</td>
                    <td class="px-4 py-3 text-end">
                        <div class="d-flex justify-content-end gap-2" onclick="event.stopPropagation()">
                            <a href="{{ route('admin.collections.show', 2) }}" class="btn btn-sm btn-white border shadow-sm text-secondary hover-text-primary"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-sm btn-white border shadow-sm text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<style>
    .text-decoration-underline-hover:hover { text-decoration: underline !important; }
    .hover-text-primary:hover { color: var(--bs-primary) !important; }
    .hover-text-danger:hover { color: var(--bs-danger) !important; }
    .cursor-pointer { cursor: pointer; }
</style>
@endsection
