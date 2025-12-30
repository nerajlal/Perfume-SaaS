@extends('layouts.admin')

@section('title', 'Sarah Jenkins')

@section('content')
@section('content')
<div class="container pb-5">
    <!-- Header -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.customers') }}" class="text-secondary hover-text-dark">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="flex-grow-1">
            <h1 class="h3 mb-1 text-dark d-flex align-items-center gap-2">
                Sarah Jenkins 
                <span class="badge bg-success bg-opacity-10 text-success fw-bold text-uppercase small tracking-wide" style="letter-spacing: 0.05em;">Subscribed</span>
            </h1>
            <p class="small text-muted mb-0">Mumbai, India • Customer for 2 years</p>
        </div>
        <button class="btn btn-link text-secondary text-decoration-none small fw-medium">Prev</button>
        <span class="text-muted">|</span>
        <button class="btn btn-link text-secondary text-decoration-none small fw-medium">Next</button>
    </div>

    <div class="row g-4">
        
        <!-- Left Column: Orders & Timeline -->
        <div class="col-12 col-lg-8">
            <div class="vstack gap-4">
            
                <!-- Orders -->
                 <div class="card border shadow-sm overflow-hidden">
                     <div class="card-header bg-light border-bottom d-flex justify-content-between align-items-center p-3">
                        <h2 class="h6 fw-bold text-secondary mb-0">Orders</h2>
                        <span class="small text-muted">Total spent: ₹12,400.00</span>
                     </div>
                     
                     <div class="table-responsive">
                         <table class="table table-hover align-middle mb-0 text-start">
                            <thead class="bg-light text-secondary small text-uppercase">
                                <tr>
                                    <th class="px-3 py-2 border-bottom fw-medium">Order</th>
                                    <th class="px-3 py-2 border-bottom fw-medium">Date</th>
                                    <th class="px-3 py-2 border-bottom fw-medium">Status</th>
                                    <th class="px-3 py-2 border-bottom fw-medium text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                <tr>
                                    <td class="px-3 py-2 fw-medium text-dark">
                                        <a href="#" class="text-decoration-none">#1024</a>
                                    </td>
                                    <td class="px-3 py-2 text-secondary">Dec 20, 2024</td>
                                    <td class="px-3 py-2"><span class="badge bg-warning bg-opacity-10 text-warning text-dark-warning rounded fw-semibold">Unfulfilled</span></td>
                                    <td class="px-3 py-2 text-end text-secondary">₹4,200.00</td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-2 fw-medium text-dark">
                                        <a href="#" class="text-decoration-none">#1018</a>
                                    </td>
                                    <td class="px-3 py-2 text-secondary">Dec 10, 2024</td>
                                    <td class="px-3 py-2"><span class="badge bg-success bg-opacity-10 text-success rounded fw-semibold">Fulfilled</span></td>
                                    <td class="px-3 py-2 text-end text-secondary">₹3,500.00</td>
                                </tr>
                                 <tr>
                                    <td class="px-3 py-2 fw-medium text-dark">
                                        <a href="#" class="text-decoration-none">#1012</a>
                                    </td>
                                    <td class="px-3 py-2 text-secondary">Nov 25, 2024</td>
                                    <td class="px-3 py-2"><span class="badge bg-success bg-opacity-10 text-success rounded fw-semibold">Fulfilled</span></td>
                                    <td class="px-3 py-2 text-end text-secondary">₹1,200.00</td>
                                </tr>
                                 <tr>
                                    <td class="px-3 py-2 fw-medium text-dark">
                                        <a href="#" class="text-decoration-none">#1005</a>
                                    </td>
                                    <td class="px-3 py-2 text-secondary">Nov 01, 2024</td>
                                    <td class="px-3 py-2"><span class="badge bg-secondary bg-opacity-10 text-secondary rounded fw-semibold">Archived</span></td>
                                    <td class="px-3 py-2 text-end text-secondary">₹2,800.00</td>
                                </tr>
                                 <tr>
                                    <td class="px-3 py-2 fw-medium text-dark">
                                        <a href="#" class="text-decoration-none">#1001</a>
                                    </td>
                                    <td class="px-3 py-2 text-secondary">Oct 15, 2024</td>
                                    <td class="px-3 py-2"><span class="badge bg-secondary bg-opacity-10 text-secondary rounded fw-semibold">Archived</span></td>
                                    <td class="px-3 py-2 text-end text-secondary">₹700.00</td>
                                </tr>
                            </tbody>
                         </table>
                         <div class="p-3 border-top text-center bg-white">
                             <a href="#" class="small fw-medium text-secondary text-decoration-none hover-text-dark">View all orders</a>
                         </div>
                     </div>
                </div>

                <!-- Notes -->
                <div class="card border shadow-sm p-4">
                     <div class="d-flex justify-content-between align-items-center mb-3">
                         <h2 class="h6 fw-bold text-secondary mb-0">Notes</h2>
                         <button class="btn btn-link btn-sm p-0 text-decoration-none">Edit</button>
                     </div>
                     <p class="small text-secondary fst-italic mb-0">"Preferrs delivery on weekends. Called to confirm address twice."</p>
                </div>
                
            </div>
        </div>

        <!-- Right Column: Customer Info -->
        <div class="col-12 col-lg-4">
            <div class="vstack gap-4">
            
                <!-- Customer Contact -->
                <div class="card border shadow-sm p-4 position-relative card-hover-actions">
                    <button class="btn btn-link btn-sm p-0 position-absolute top-0 end-0 mt-3 me-3 text-decoration-none opacity-0 hover-opacity-100 transition-opacity show-on-hover">Edit</button>
                    <h2 class="h6 fw-bold text-secondary mb-3">Customer Contact</h2>
                    <div class="vstack gap-3">
                        <div class="d-flex align-items-center gap-3">
                             <div class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle fw-bold small" style="width: 32px; height: 32px;">SJ</div>
                             <a href="mailto:sarah@example.com" class="text-primary text-decoration-none small">sarah@example.com</a>
                             <button class="btn btn-link btn-sm p-0 text-secondary hover-text-dark"><i class="far fa-copy"></i></button>
                        </div>
                         <div class="d-flex align-items-center gap-3">
                             <div class="text-center text-secondary small" style="width: 32px;"><i class="fas fa-phone"></i></div>
                             <span class="small text-dark">+91 98765 43210</span>
                        </div>
                    </div>
                </div>

                <!-- Default Address -->
                <div class="card border shadow-sm p-4 position-relative card-hover-actions">
                    <button class="btn btn-link btn-sm p-0 position-absolute top-0 end-0 mt-3 me-3 text-decoration-none opacity-0 hover-opacity-100 transition-opacity show-on-hover">Manage</button>
                    <h2 class="h6 fw-bold text-secondary mb-3">Default Address</h2>
                    <div class="small text-secondary lh-sm">
                        <p class="fw-medium text-dark mb-1">Sarah Jenkins</p>
                        <p class="mb-1">123, Orchid Towers, Bandra West</p>
                        <p class="mb-1">Mumbai, Maharashtra 400050</p>
                        <p class="mb-0">India</p>
                    </div>
                </div>

                
                <div class="pt-3 border-top">
                    <button class="btn btn-link text-danger text-decoration-none fw-medium w-100 text-start border-0 p-0 small hover-text-danger-dark">Delete customer</button>
                </div>

            </div>
        </div>
    </div>
</div>
<style>
    .hover-text-dark:hover { color: #343a40 !important; }
    .text-dark-warning { color: #856404; }
    .card-hover-actions:hover .show-on-hover { opacity: 1 !important; }
    .hover-text-danger-dark:hover { color: #bd2130 !important; }
</style>
@endsection
@endsection
