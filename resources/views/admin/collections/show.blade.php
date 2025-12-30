@extends('layouts.admin')

@section('title', 'Best Sellers')

@section('content')
<div class="container pb-5">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="d-flex align-items-center gap-3">
             <a href="{{ route('admin.collections') }}" class="text-secondary hover-text-dark">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="h3 mb-0 text-dark">Best Sellers</h1>
        </div>
        <a href="{{ route('admin.products') }}" class="btn btn-white border shadow-sm text-secondary hover-bg-light fw-medium">Browse products</a>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <div class="vstack gap-4">
            
                <!-- Products List -->
                <div class="card border shadow-sm overflow-hidden">
                    <div class="card-header bg-light border-bottom d-flex justify-content-between align-items-center p-3">
                        <h2 class="h6 fw-bold text-secondary mb-0">Products</h2>
                        <div class="d-flex gap-2">
                            <span class="badge bg-white text-secondary border fw-normal">Sorted by: Best Selling</span>
                        </div>
                    </div>
                    
                    <div class="list-group list-group-flush">
                        <!-- Product 1 -->
                        <div class="list-group-item p-3 d-flex gap-3 align-items-center hover-bg-light transition-colors">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded border flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="fas fa-image text-secondary opacity-50"></i>
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="d-block text-dark fw-medium text-decoration-none text-decoration-underline-hover small">Midnight Oud 50ml</a>
                                <p class="small text-muted mb-0">Active • 25 in stock</p>
                            </div>
                             <button class="btn btn-link btn-sm text-secondary hover-text-danger p-0">
                                 <i class="fas fa-times"></i>
                             </button>
                        </div>
                        <!-- Product 2 -->
                        <div class="list-group-item p-3 d-flex gap-3 align-items-center hover-bg-light transition-colors">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded border flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="fas fa-image text-secondary opacity-50"></i>
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="d-block text-dark fw-medium text-decoration-none text-decoration-underline-hover small">Rose & Amber Gift Set</a>
                                <p class="small text-muted mb-0">Draft • 0 in stock</p>
                            </div>
                            <button class="btn btn-link btn-sm text-secondary hover-text-danger p-0">
                                 <i class="fas fa-times"></i>
                             </button>
                        </div>
                         <!-- Product 3 -->
                        <div class="list-group-item p-3 d-flex gap-3 align-items-center hover-bg-light transition-colors">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded border flex-shrink-0" style="width: 40px; height: 40px;">
                                <i class="fas fa-image text-secondary opacity-50"></i>
                            </div>
                            <div class="flex-grow-1">
                                <a href="#" class="d-block text-dark fw-medium text-decoration-none text-decoration-underline-hover small">Jasmine Musk Oil</a>
                                <p class="small text-muted mb-0">Active • 10 in stock</p>
                            </div>
                            <button class="btn btn-link btn-sm text-secondary hover-text-danger p-0">
                                 <i class="fas fa-times"></i>
                             </button>
                        </div>
                    </div>
                    
                     <div class="p-3 border-top bg-light">
                         <p class="small text-center text-muted mb-0">Showing 3 of 12 products</p>
                     </div>
                </div>
            
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="vstack gap-4">
                <!-- Image Card -->
                <div class="card border shadow-sm p-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Collection Image</h2>
                    <div class="ratio ratio-1x1 bg-light rounded border d-flex align-items-center justify-content-center mb-3">
                        <i class="fas fa-image text-secondary opacity-25 display-4"></i>
                    </div>
                    <button class="btn btn-link w-100 text-decoration-none small">Change image</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
<style>
    .hover-text-dark:hover { color: #343a40 !important; }
    .hover-bg-light:hover { background-color: var(--bs-light) !important; }
    .text-decoration-underline-hover:hover { text-decoration: underline !important; }
    .hover-text-danger:hover { color: var(--bs-danger) !important; }
</style>
@endsection
