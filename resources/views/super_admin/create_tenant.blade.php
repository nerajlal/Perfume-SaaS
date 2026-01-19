@extends('super_admin.layouts.app')

@section('title', 'Create New Tenant')

@section('content')
<div class="container-fluid py-4" style="max-width: 1000px;">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('super_admin.dashboard') }}" class="btn btn-light btn-sm rounded-circle border shadow-sm d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                <i class="fas fa-arrow-left text-secondary"></i>
            </a>
            <h1 class="h4 fw-bold text-dark m-0">Create Store</h1>
        </div>
    </div>

    <form action="{{ route('super_admin.store_tenant') }}" method="POST">
        @csrf
        <div class="row g-4">
            <!-- Main Column -->
            <div class="col-lg-8">
                
                <!-- Store Details Card -->
                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-header bg-white border-bottom py-3 px-4">
                        <h5 class="m-0 fw-bold text-dark fs-6"><i class="fas fa-store text-secondary me-2"></i>Store Details</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4">
                            <label for="site_name" class="form-label fw-medium text-secondary small text-uppercase ls-1">Store Name</label>
                            <input type="text" class="form-control form-control-lg fs-6" id="site_name" name="site_name" placeholder="e.g. My Perfume Brand" required>
                        </div>

                        <div class="mb-3">
                            <label for="subdomain" class="form-label fw-medium text-secondary small text-uppercase ls-1">Online Store Domain</label>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg fs-6" id="subdomain" name="subdomain" placeholder="brand-name" required>
                                <span class="input-group-text bg-light text-muted border-start-0">.metora.in</span>
                            </div>
                            <div class="form-text mt-2 ms-1">
                                <i class="fas fa-globe me-1 text-muted"></i> Your store will be accessible at <strong id="url_preview" class="text-dark">http://brand-name.metora.in</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Account Card -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-white border-bottom py-3 px-4">
                        <h5 class="m-0 fw-bold text-dark fs-6"><i class="fas fa-user-shield text-secondary me-2"></i>Merchant Account</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-medium text-secondary small text-uppercase ls-1">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-medium text-secondary small text-uppercase ls-1">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="merchant@example.com" required>
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label fw-medium text-secondary small text-uppercase ls-1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="12345678" required>
                                <div class="form-text text-success"><i class="fas fa-check-circle me-1"></i> Default strong password set.</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar Column -->
            <div class="col-lg-4">
                
                <!-- Plan Selection Card -->
                <div class="card border-0 shadow-sm rounded-3 mb-4 bg-dark text-white">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3"><i class="fas fa-crown text-warning me-2"></i>Subscription Plan</h5>
                        <p class="small text-white-50 mb-3">Select the billing tier for this merchant.</p>
                        
                        <div class="mb-3">
                            <div class="form-check p-0 mb-2">
                                <input type="radio" class="btn-check" name="plan" id="plan_basic" value="basic" autocomplete="off" checked>
                                <label class="btn btn-outline-light w-100 text-start d-flex justify-content-between align-items-center" for="plan_basic">
                                    <span>Basic Plan</span>
                                    <span class="badge bg-secondary">Free</span>
                                </label>
                            </div>
                            <div class="form-check p-0 mb-2">
                                <input type="radio" class="btn-check" name="plan" id="plan_essential" value="essential" autocomplete="off">
                                <label class="btn btn-outline-light w-100 text-start d-flex justify-content-between align-items-center" for="plan_essential">
                                    <span>Essential Plan</span>
                                    <span class="badge bg-primary">$29</span>
                                </label>
                            </div>
                            <div class="form-check p-0">
                                <input type="radio" class="btn-check" name="plan" id="plan_pro" value="pro" autocomplete="off">
                                <label class="btn btn-outline-light w-100 text-start d-flex justify-content-between align-items-center" for="plan_pro">
                                    <span>Pro Plan</span>
                                    <span class="badge bg-warning text-dark">$79</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">
                        Create Store
                    </button>
                    <a href="{{ route('super_admin.dashboard') }}" class="btn btn-outline-secondary border-0">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('subdomain').addEventListener('input', function(e) {
        const val = e.target.value ? e.target.value : 'brand-name';
        document.getElementById('url_preview').textContent = 'http://' + val + '.metora.in';
    });
</script>

<style>
    .ls-1 { letter-spacing: 0.5px; font-size: 0.75rem; }
    .form-control:focus, .form-select:focus {
        border-color: #212529;
        box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.1);
    }
</style>
@endsection
