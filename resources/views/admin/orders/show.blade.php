@extends('layouts.admin')

@section('title', 'Order #' . $id)

@section('content')
<div class="container-fluid" style="max-width: 1200px;">
    <!-- Header -->
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mb-4">
        <div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.orders') }}" class="text-secondary text-decoration-none">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="h4 fw-bold text-dark mb-0">Order #{{ $id }}</h1>

                <span id="fulfillmentBadge" class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-10 text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.05em;">Ordered</span>
            </div>
            <p class="text-muted small mt-1 mb-0 ms-4 ps-1">December 28, 2025 at 10:21 am from Online Store</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-white border shadow-sm btn-sm">Print</button>
            <!-- <button class="btn btn-white border shadow-sm btn-sm">Refund</button> -->
            <button onclick="advanceAction()" id="fulfillBtn" class="btn btn-warning text-white shadow-sm btn-sm fw-medium">Mark as Processing</button>
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-12 col-lg-8">
            
            <!-- Products Card -->
            <div class="card border shadow-sm mb-4 overflow-hidden">
                <div class="card-header bg-light border-bottom d-flex justify-content-between align-items-center py-3">
                    <h2 class="h6 fw-semibold text-secondary mb-0">Order Items (2)</h2>
                    <!-- <span class="small text-muted">Location: Warehouse A</span> -->
                </div>
                <div class="list-group list-group-flush">
                    <div id="trackingInfo" class="list-group-item bg-info bg-opacity-10 border-bottom border-info border-opacity-25 d-none">
                         <p class="small text-info text-darken-2 fw-medium mb-0">Tracking Number: <span id="trackingNumberDisplay" class="fw-bold"></span></p>
                    </div>
                    <!-- Item 1 -->
                    <div class="list-group-item p-3 d-flex gap-3">
                        <div class="bg-light rounded border d-flex align-items-center justify-content-center flex-shrink-0" style="width: 64px; height: 64px;">
                            <i class="fas fa-image text-secondary opacity-50 fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h4 class="h6 fw-medium text-primary mb-1"><a href="#" class="text-decoration-none">Midnight Oud 50ml</a></h4>
                            <p class="small text-muted mb-0">Size: 50ml</p>
                            <p class="small text-muted mb-0">SKU: MO-50</p>
                        </div>
                        <div class="text-end">
                            <p class="small text-dark mb-1">₹4,200.00 x 1</p>
                            <p class="small fw-medium text-dark mb-0">₹4,200.00</p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="list-group-item p-3 d-flex gap-3">
                        <div class="bg-light rounded border d-flex align-items-center justify-content-center flex-shrink-0" style="width: 64px; height: 64px;">
                            <i class="fas fa-image text-secondary opacity-50 fs-4"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h4 class="h6 fw-medium text-primary mb-1"><a href="#" class="text-decoration-none">Rose & Amber Gift Set</a></h4>
                            <p class="small text-muted mb-0">Variant: Standard</p>
                        </div>
                        <div class="text-end">
                            <p class="small text-dark mb-1">₹4,200.00 x 1</p>
                            <p class="small fw-medium text-dark mb-0">₹4,200.00</p>
                        </div>
                    </div>
                </div>
                <!-- Fulfillment Action Area -->
                <!-- <div class="card-footer bg-light border-top text-end p-3">
                    <button class="btn btn-white border shadow-sm btn-sm">Fulfill items</button>
                </div> -->
            </div>

            <!-- Payment Card -->
            <div class="card border shadow-sm overflow-hidden">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                    <h2 class="h6 fw-semibold text-secondary mb-0">Payment</h2>
                    <span class="badge bg-success bg-opacity-10 text-success text-uppercase">Paid</span>
                </div>
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between small mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="text-dark">₹8,400.00</span>
                    </div>
                    <div class="d-flex justify-content-between small mb-2">
                        <span class="text-muted">Shipping</span>
                        <span class="text-dark">₹0.00</span>
                    </div>
                    <div class="d-flex justify-content-between small mb-3">
                        <span class="text-muted">Tax</span>
                        <span class="text-dark">₹0.00</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold text-dark border-top pt-3 mb-3">
                        <span>Total</span>
                        <span>₹8,400.00</span>
                    </div>
                    <div class="border-top pt-3 small text-muted">
                        <div class="d-flex justify-content-between">
                            <span>Paid changes</span>
                            <span>₹8,400.00</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Timeline -->
            <!-- <div class="position-relative ps-4 border-start ms-2 mt-4 space-y-4">
                <div class="position-relative mb-4">
                    <div class="position-absolute start-0 top-0 translate-middle bg-light rounded-circle border border-white" style="width: 12px; height: 12px; margin-left: -1px;"></div>
                    <p class="small text-muted mb-0">Order confirmation email was sent to Sarah Jenkins (sarah@example.com).</p>
                    <span class="extra-small text-muted">Today, 10:21 am</span>
                </div>
                <div class="position-relative">
                    <div class="position-absolute start-0 top-0 translate-middle bg-light rounded-circle border border-white" style="width: 12px; height: 12px; margin-left: -1px;"></div>
                    <p class="small text-muted mb-0">Payment of ₹8,400.00 was processed via Razorpay.</p>
                    <span class="extra-small text-muted">Today, 10:21 am</span>
                </div>
            </div> -->

        </div>

        <!-- Sidebar -->
        <div class="col-12 col-lg-4">
            
            <!-- Customer Card -->
            <div class="card border shadow-sm mb-4 overflow-hidden">
                <div class="card-header bg-white border-bottom py-3">
                    <h2 class="h6 fw-semibold text-secondary mb-0">Customer</h2>
                </div>
                <div class="card-body p-3">
                    <a href="#" class="text-decoration-none fw-medium text-primary mb-1 d-block">Sarah Jenkins</a>
                    <p class="small text-muted mb-3">1 order</p>
                    
                    <h3 class="small fw-semibold text-muted text-uppercase mb-2">Contact Information</h3>
                    <p class="small text-primary mb-1"><a href="mailto:sarah@example.com" class="text-decoration-none">sarah@example.com</a></p>
                    <p class="small text-muted">+91 98765 43210</p>
                    
                    <hr class="text-muted opacity-25 my-3">
                    
                    <h3 class="small fw-semibold text-muted text-uppercase mb-2">Shipping Address</h3>
                    <p class="small text-muted lh-base">
                        Sarah Jenkins<br>
                        123, Palm Grove Heights<br>
                        Sector 44<br>
                        Mumbai, Maharashtra 400001<br>
                        India
                    </p>
                    
                    <hr class="text-muted opacity-25 my-3">
                    
                    <h3 class="small fw-semibold text-muted text-uppercase mb-2">Billing Address</h3>
                    <p class="small text-muted opacity-75">Same as shipping address</p>
                </div>
            </div>

             <!-- Notes Card -->
             <div class="card border shadow-sm overflow-hidden">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                    <h2 class="h6 fw-semibold text-secondary mb-0">Notes</h2>
                    <button class="btn btn-link btn-sm text-decoration-none p-0">Edit</button>
                </div>
                <div class="card-body p-3">
                    <p class="small text-muted fst-italic mb-0">No notes from customer</p>
                </div>
            </div>

        </div>
    </div>
</div>

    <script>
        let orderStatus = 'ordered'; // Initial state

        function advanceAction() {
            const btn = document.getElementById('fulfillBtn');
            const badge = document.getElementById('fulfillmentBadge');
            const trackingDiv = document.getElementById('trackingInfo');
            const trackingDisplay = document.getElementById('trackingNumberDisplay');
            
            // Simulating Backend Call
            const originalText = btn.innerText;
            
            // Check if we are moving to Shipped to ask for Tracking ID first
            if (orderStatus === 'processing') {
                var trackingId = prompt("Please enter the Shipment Tracking ID:");
                if(trackingId === null || trackingId.trim() === "") {
                    return; // Cancel action if no ID
                }
            }

            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
            btn.disabled = true;
            
            setTimeout(() => {
                if (orderStatus === 'ordered') {
                    // Transition to Processing
                    orderStatus = 'processing';
                    
                    // Update Badge
                    badge.className = 'badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-10 text-uppercase';
                    badge.innerText = 'Processing';
                    
                    // Update Button
                    btn.innerHTML = 'Mark as Shipped';
                    btn.disabled = false;
                    btn.className = 'btn btn-primary text-white shadow-sm btn-sm fw-medium';
                    
                    alert('Order marked as Processing!');
                
                } else if (orderStatus === 'processing') {
                    // Transition to Shipped
                    orderStatus = 'shipped';
                    
                    // Show Tracking Info
                    if(trackingDiv && trackingDisplay) {
                        trackingDisplay.innerText = trackingId;
                        trackingDiv.classList.remove('d-none');
                    }
                    
                    // Update Badge
                    badge.className = 'badge bg-info bg-opacity-10 text-info border border-info border-opacity-10 text-uppercase';
                    badge.innerText = 'Shipped';
                    
                    // Update Button
                    btn.innerHTML = 'Mark as Delivered';
                    btn.disabled = false;
                    btn.className = 'btn btn-info text-white shadow-sm btn-sm fw-medium';
                    
                    alert('Order marked as Shipped with Tracking ID: ' + trackingId);

                } else if (orderStatus === 'shipped') {
                    // Transition to Delivered
                    orderStatus = 'delivered';
                    
                    // Update Badge
                    badge.className = 'badge bg-success bg-opacity-10 text-success border border-success border-opacity-10 text-uppercase';
                    badge.innerText = 'Delivered';
                    
                    // Update Button
                    btn.innerHTML = 'Completed';
                    btn.className = 'btn btn-light text-muted border shadow-sm btn-sm fw-medium disabled';
                    
                    alert('Order marked as Delivered!');
                }
            }, 800);
        }
    </script>
@endsection
