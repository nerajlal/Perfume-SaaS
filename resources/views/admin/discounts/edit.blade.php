@extends('layouts.admin')

@section('title', 'Edit Discount')

@section('content')
<div class="container pb-5" style="max-width: 900px;">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.discounts') }}" class="text-secondary hover-text-dark">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="h3 mb-0 text-dark">Edit discount</h1>
    </div>

    <form action="#" method="POST">
         <div class="row g-4">
            <!-- Left Column -->
            <div class="col-12 col-lg-8">
                <div class="vstack gap-4">
                    <!-- Product Search -->
                    <div class="card border shadow-sm p-4">
                        <h2 class="h6 fw-bold text-secondary mb-3">Product</h2>
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Search product</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-secondary border-end-0"><i class="fas fa-search"></i></span>
                                <input type="text" value="Midnight Oud 50ml" class="form-control border-start-0 shadow-none ps-0" placeholder="Search product name...">
                            </div>
                            <p class="small text-muted mt-1 mb-0">Search for a product to apply this coupon to.</p>
                        </div>
                    </div>

                    <!-- Discount Code -->
                    <div class="card border shadow-sm p-4">
                         <h2 class="h6 fw-bold text-secondary mb-3">Discount code</h2>
                         <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Code</label>
                            <div class="input-group">
                                <input type="text" id="discountCodeInput" value="SY2QA0ZM" class="form-control text-uppercase fw-medium" placeholder="e.g. SUMMER20">
                                <button type="button" id="generateCodeBtn" class="btn btn-outline-success">Generate</button>
                            </div>
                            <p class="small text-muted mt-1 mb-0">Customers will enter this code at checkout.</p>
                         </div>
                    </div>

                    <!-- Value -->
                    <div class="card border shadow-sm p-4">
                         <h2 class="h6 fw-bold text-secondary mb-3">Value</h2>
                         <div class="row g-3">
                             <div class="col-12 col-md-6">
                                <label class="form-label fw-medium text-secondary small mb-1">Discount type</label>
                                 <select class="form-select">
                                    <option selected>Percentage</option>
                                    <option>Fixed amount</option>
                                </select>
                             </div>
                             <div class="col-12 col-md-6">
                                <label class="form-label fw-medium text-secondary small mb-1">Discount value</label>
                                <input type="text" value="5" class="form-control" placeholder="10">
                             </div>
                         </div>
                    </div>


                </div>
            </div>

            <!-- Right Column -->
            <div class="col-12 col-lg-4">
                <div class="vstack gap-4">
                     <!-- Status -->
                    <div class="card border shadow-sm p-4">
                        <h2 class="h6 fw-bold text-secondary mb-3">Status</h2>
                        <select class="form-select">
                            <option selected>Active</option>
                            <option>Draft</option>
                        </select>
                    </div>

                    <!-- Active Dates -->
                     <div class="card border shadow-sm p-4">
                         <h2 class="h6 fw-bold text-secondary mb-3">Active dates</h2>
                         <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-medium text-secondary small mb-1">Start date</label>
                                <input type="date" value="2025-12-20" class="form-control">
                            </div>
                             <div class="col-12">
                                <label class="form-label fw-medium text-secondary small mb-1">End date</label>
                                <input type="date" value="2025-12-31" class="form-control">
                            </div>
                         </div>
                    </div>

                    <!-- Summary -->
                     <div class="card border shadow-sm p-4">
                        <h2 class="h6 fw-bold text-secondary mb-3">Summary</h2>
                        <h3 class="h6 fw-bold text-dark mb-2">SY2QA0ZM</h3>
                        <ul class="list-unstyled mb-0 small text-secondary">
                            <li class="mb-1"><i class="fas fa-circle text-secondary me-2" style="font-size: 4px; vertical-align: middle;"></i>Applies to specific products</li>
                            <li class="mb-1"><i class="fas fa-circle text-secondary me-2" style="font-size: 4px; vertical-align: middle;"></i>5% off</li>
                            <li><i class="fas fa-circle text-secondary me-2" style="font-size: 4px; vertical-align: middle;"></i>Active from Dec 20, 2025</li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
        
        <div class="d-flex justify-content-end gap-3 mt-4 pt-4 border-top">
             <button type="button" class="btn btn-white border border-danger text-danger shadow-sm fw-medium hover-bg-danger-soft">Delete discount</button>
            <button type="submit" class="btn btn-success shadow-sm fw-medium">Update discount</button>
        </div>

    </form>
</div>
<style>
    .hover-text-dark:hover { color: #343a40 !important; }
    .hover-bg-light:hover { background-color: var(--bs-light) !important; }
    .hover-bg-danger-soft:hover { background-color: #fef2f2 !important; }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const generateBtn = document.getElementById('generateCodeBtn');
        const codeInput = document.getElementById('discountCodeInput');

        generateBtn.addEventListener('click', function() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let result = '';
            const length = 10;
            for (let i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            codeInput.value = result;
        });
    });
</script>
@endpush
