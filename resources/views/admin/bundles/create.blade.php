@extends('layouts.admin')

@section('title', 'Create Bundle')

@section('content')
<div class="container pb-5" style="max-width: 900px;">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.bundles') }}" class="text-secondary hover-text-dark">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="h3 mb-0 text-dark">Create bundle</h1>
    </div>

    <form action="#" method="POST">
        
         <div class="row g-4">
            <!-- Left Column -->
            <div class="col-12 col-lg-8">
                <!-- Title -->
                 <div class="card border shadow-sm p-3 mb-4">
                     <div class="vstack gap-3">
                        <div>
                            <label class="form-label fw-medium text-secondary small">Title</label>
                            <input type="text" class="form-control" placeholder="e.g. Summer Essentials Bundle">
                        </div>
                         <div>
                            <label class="form-label fw-medium text-secondary small">Description</label>
                            <textarea rows="4" class="form-control"></textarea>
                        </div>
                     </div>
                </div>

                <!-- Products -->
                <div class="card border shadow-sm p-3 mb-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Products</h2>
                    <div class="vstack gap-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control border-start-0 shadow-none" placeholder="Search products...">
                        </div>
                        
                        <div class="border rounded">
                             <div class="p-3 d-flex align-items-center gap-3 border-bottom">
                                <div class="d-flex align-items-center justify-content-center bg-light border rounded" style="width: 40px; height: 40px;">
                                    <i class="fas fa-image text-secondary opacity-50"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="d-block small fw-medium text-dark">Midnight Oud 50ml</span>
                                    <p class="mb-0 small text-muted">₹ 250.00</p>
                                </div>
                                <button type="button" class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-times"></i></button>
                            </div>
                             <div class="p-3 d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center justify-content-center bg-light border rounded" style="width: 40px; height: 40px;">
                                    <i class="fas fa-image text-secondary opacity-50"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="d-block small fw-medium text-dark">Rose & Amber Gift Set</span>
                                    <p class="mb-0 small text-muted">₹ 450.00</p>
                                </div>
                                <button type="button" class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-12 col-lg-4">
                 <!-- Status -->
                <div class="card border shadow-sm p-3 mb-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Status</h2>
                    <select class="form-select">
                        <option>Active</option>
                        <option>Draft</option>
                    </select>
                </div>

                 <div class="card border shadow-sm p-3 mb-4">
                     <h2 class="h6 fw-bold text-secondary mb-3">Bundle Discount</h2>
                     <div class="vstack gap-3">
                         <div>
                            <label class="form-label fw-medium text-secondary small">Discount type</label>
                             <select class="form-select">
                                <option>Percentage</option>
                                <option>Fixed price</option>
                            </select>
                         </div>
                         <div>
                            <label class="form-label fw-medium text-secondary small">Discount value</label>
                            <input type="text" class="form-control" placeholder="10">
                         </div>
                     </div>
                </div>

                <!-- Summary -->
                 <div class="card border shadow-sm p-3 mb-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Summary</h2>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li><i class="fas fa-circle text-secondary me-2" style="font-size: 4px; vertical-align: middle;"></i>2 products</li>
                        <li><i class="fas fa-circle text-secondary me-2" style="font-size: 4px; vertical-align: middle;"></i>Original price: ₹ 700.00</li>
                        <li><i class="fas fa-circle text-secondary me-2" style="font-size: 4px; vertical-align: middle;"></i>Discount: 10%</li>
                        <li class="fw-bold text-dark pt-2">Final Price: ₹ 630.00</li>
                    </ul>
                </div>
            </div>
         </div>
        
        <div class="d-flex justify-content-end gap-3 pt-4 border-top mt-4">
             <button type="button" class="btn btn-white border shadow-sm text-secondary">Discard</button>
            <button type="submit" class="btn btn-success shadow-sm">Save bundle</button>
        </div>

    </form>
</div>
<style>
    .hover-text-dark:hover { color: #343a40 !important; }
    .hover-text-danger:hover { color: var(--bs-danger) !important; }
</style>
@endsection
