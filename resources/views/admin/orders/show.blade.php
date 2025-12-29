@extends('layouts.admin')

@section('title', 'Order #' . $id)

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.orders') }}" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-xl font-bold text-gray-900">Order #{{ $id }}</h1>

                <span id="fulfillmentBadge" class="px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs font-bold uppercase tracking-wide">Ordered</span>
            </div>
            <p class="text-sm text-gray-500 mt-1 ml-7">December 28, 2025 at 10:21 am from Online Store</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-300 text-gray-700 px-3 py-2 rounded shadow-sm text-sm font-medium hover:bg-gray-50">Print</button>
            <!-- <button class="bg-white border border-gray-300 text-gray-700 px-3 py-2 rounded shadow-sm text-sm font-medium hover:bg-gray-50">Refund</button> -->
            <button onclick="advanceAction()" id="fulfillBtn" class="bg-yellow-500 text-white px-3 py-2 rounded shadow-sm text-sm font-medium hover:bg-yellow-600 transition-colors">Mark as Processing</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Products Card -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                    <h2 class="font-semibold text-gray-700 text-sm">Order Items (2)</h2>
                    <!-- <span class="text-xs text-gray-500">Location: Warehouse A</span> -->
                </div>
                <div class="divide-y divide-gray-100">
                    <div id="trackingInfo" class="hidden p-4 bg-blue-50 border-b border-blue-100">
                         <p class="text-sm text-blue-800 font-medium">Tracking Number: <span id="trackingNumberDisplay" class="font-bold"></span></p>
                    </div>
                    <!-- Item 1 -->
                    <div class="p-4 flex gap-4">
                        <div class="w-16 h-16 bg-gray-100 rounded border border-gray-200 flex-shrink-0 flex items-center justify-center">
                            <i class="fas fa-image text-gray-300 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-blue-600 hover:underline cursor-pointer">Midnight Oud 50ml</h4>
                            <p class="text-xs text-gray-500 mt-1">Size: 50ml</p>
                            <p class="text-xs text-gray-500">SKU: MO-50</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-800">₹4,200.00 x 1</p>
                            <p class="text-sm font-medium text-gray-900">₹4,200.00</p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="p-4 flex gap-4">
                        <div class="w-16 h-16 bg-gray-100 rounded border border-gray-200 flex-shrink-0 flex items-center justify-center">
                            <i class="fas fa-image text-gray-300 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-blue-600 hover:underline cursor-pointer">Rose & Amber Gift Set</h4>
                            <p class="text-xs text-gray-500 mt-1">Variant: Standard</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-800">₹4,200.00 x 1</p>
                            <p class="text-sm font-medium text-gray-900">₹4,200.00</p>
                        </div>
                    </div>
                </div>
                <!-- Fulfillment Action Area -->
                <!-- <div class="p-4 border-t border-gray-100 bg-gray-50 flex justify-end">
                    <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-gray-50">Fulfill items</button>
                </div> -->
            </div>

            <!-- Payment Card -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="font-semibold text-gray-700 text-sm">Payment</h2>
                    <span class="px-2 py-0.5 rounded bg-green-100 text-green-800 text-xs font-bold uppercase">Paid</span>
                </div>
                <div class="p-4 space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="text-gray-900">₹8,400.00</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Shipping</span>
                        <span class="text-gray-900">₹0.00</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Tax</span>
                        <span class="text-gray-900">₹0.00</span>
                    </div>
                    <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-gray-900">
                        <span>Total</span>
                        <span>₹8,400.00</span>
                    </div>
                    <div class="border-t border-gray-100 pt-3 text-sm text-gray-500">
                        <div class="flex justify-between">
                            <span>Paid changes</span>
                            <span>₹8,400.00</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Timeline -->
            <!-- <div class="relative pl-4 border-l-2 border-gray-200 ml-3 space-y-6 pb-6">
                <div class="relative">
                    <div class="absolute -left-[21px] bg-gray-200 rounded-full h-3 w-3 border-2 border-white"></div>
                    <p class="text-sm text-gray-600">Order confirmation email was sent to Sarah Jenkins (sarah@example.com).</p>
                    <span class="text-xs text-gray-400">Today, 10:21 am</span>
                </div>
                <div class="relative">
                    <div class="absolute -left-[21px] bg-gray-200 rounded-full h-3 w-3 border-2 border-white"></div>
                    <p class="text-sm text-gray-600">Payment of ₹8,400.00 was processed via Razorpay.</p>
                    <span class="text-xs text-gray-400">Today, 10:21 am</span>
                </div>
            </div> -->

        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            
            <!-- Customer Card -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-4 border-b border-gray-200">
                    <h2 class="font-semibold text-gray-700 text-sm">Customer</h2>
                </div>
                <div class="p-4">
                    <a href="#" class="text-blue-600 hover:underline text-sm font-medium mb-1 block">Sarah Jenkins</a>
                    <p class="text-sm text-gray-600 mb-4">1 order</p>
                    
                    <h3 class="text-xs font-semibold text-gray-500 uppercase mb-2">Contact Information</h3>
                    <p class="text-sm text-blue-600 hover:underline cursor-pointer mb-1">sarah@example.com</p>
                    <p class="text-sm text-gray-600">+91 98765 43210</p>
                    
                    <div class="border-t border-gray-100 my-4"></div>
                    
                    <h3 class="text-xs font-semibold text-gray-500 uppercase mb-2">Shipping Address</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Sarah Jenkins<br>
                        123, Palm Grove Heights<br>
                        Sector 44<br>
                        Mumbai, Maharashtra 400001<br>
                        India
                    </p>
                    
                    <div class="border-t border-gray-100 my-4"></div>
                    
                    <h3 class="text-xs font-semibold text-gray-500 uppercase mb-2">Billing Address</h3>
                    <p class="text-sm text-gray-600 text-opacity-70">Same as shipping address</p>
                </div>
            </div>

             <!-- Notes Card -->
             <div class="card bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="font-semibold text-gray-700 text-sm">Notes</h2>
                    <button class="text-blue-600 hover:underline text-xs">Edit</button>
                </div>
                <div class="p-4">
                    <p class="text-sm text-gray-500 italic">No notes from customer</p>
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
                    badge.className = 'px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs font-bold uppercase tracking-wide';
                    badge.innerText = 'Processing';
                    
                    // Update Button
                    btn.innerHTML = 'Mark as Shipped';
                    btn.disabled = false;
                    btn.className = 'bg-blue-600 text-white px-3 py-2 rounded shadow-sm text-sm font-medium hover:bg-blue-700 transition-colors';
                    
                    alert('Order marked as Processing!');
                
                } else if (orderStatus === 'processing') {
                    // Transition to Shipped
                    orderStatus = 'shipped';
                    
                    // Show Tracking Info
                    if(trackingDiv && trackingDisplay) {
                        trackingDisplay.innerText = trackingId;
                        trackingDiv.classList.remove('hidden');
                    }
                    
                    // Update Badge
                    badge.className = 'px-2 py-1 rounded bg-purple-100 text-purple-800 text-xs font-bold uppercase tracking-wide';
                    badge.innerText = 'Shipped';
                    
                    // Update Button
                    btn.innerHTML = 'Mark as Delivered';
                    btn.disabled = false;
                    btn.className = 'bg-indigo-600 text-white px-3 py-2 rounded shadow-sm text-sm font-medium hover:bg-indigo-700 transition-colors';
                    
                    alert('Order marked as Shipped with Tracking ID: ' + trackingId);

                } else if (orderStatus === 'shipped') {
                    // Transition to Delivered
                    orderStatus = 'delivered';
                    
                    // Update Badge
                    badge.className = 'px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-bold uppercase tracking-wide';
                    badge.innerText = 'Delivered';
                    
                    // Update Button
                    btn.innerHTML = 'Completed';
                    btn.className = 'bg-gray-300 text-gray-500 px-3 py-2 rounded shadow-sm text-sm font-medium cursor-not-allowed';
                    
                    alert('Order marked as Delivered!');
                }
            }, 800);
        }
    </script>
@endsection
