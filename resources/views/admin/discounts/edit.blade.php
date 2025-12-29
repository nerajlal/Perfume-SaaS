@extends('layouts.admin')

@section('title', 'Edit Discount')

@section('content')
<div class="max-w-4xl mx-auto pb-10">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.discounts') }}" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-xl font-bold text-gray-900">Edit discount</h1>
    </div>

    <form action="#" method="POST" class="space-y-6">
        
         <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Product Search -->
                <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                    <h2 class="font-semibold text-gray-700 text-sm mb-4">Product</h2>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Search product</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-2.5 text-gray-400 text-sm"></i>
                            <input type="text" value="Midnight Oud 50ml" class="w-full pl-9 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Search product name...">
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Search for a product to apply this coupon to.</p>
                    </div>
                </div>

                <!-- Discount Code -->
                <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                     <h2 class="font-semibold text-gray-700 text-sm mb-4">Discount code</h2>
                     <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Code</label>
                        <div class="flex gap-2">
                            <input type="text" id="discountCodeInput" value="SY2QA0ZM" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm uppercase font-medium" placeholder="e.g. SUMMER20">
                            <button type="button" id="generateCodeBtn" class="text-sm text-green-700 font-medium hover:text-green-800 shrink-0">Generate</button>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Customers will enter this code at checkout.</p>
                     </div>
                </div>

                <!-- Value -->
                <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                     <h2 class="font-semibold text-gray-700 text-sm mb-4">Value</h2>
                     <div class="grid grid-cols-2 gap-4">
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Discount type</label>
                             <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                <option selected>Percentage</option>
                                <option>Fixed amount</option>
                            </select>
                         </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Discount value</label>
                            <input type="text" value="5" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="10">
                         </div>
                     </div>
                </div>

                <!-- Active Dates -->
                 <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                     <h2 class="font-semibold text-gray-700 text-sm mb-4">Active dates</h2>
                     <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Start date</label>
                            <input type="date" value="2025-12-20" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">End date</label>
                            <input type="date" value="2025-12-31" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        </div>
                     </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                 <!-- Status -->
                <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                    <h2 class="font-semibold text-gray-700 text-sm mb-4">Status</h2>
                    <div class="flex items-center gap-2">
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option selected>Active</option>
                            <option>Draft</option>
                        </select>
                    </div>
                </div>

                <!-- Summary -->
                 <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                    <h2 class="font-semibold text-gray-700 text-sm mb-4">Summary</h2>
                    <h3 class="text-sm font-bold text-gray-900 mb-1">SY2QA0ZM</h3>
                    <ul class="list-disc list-inside text-xs text-gray-600 space-y-1">
                        <li>Applies to specific products</li>
                        <li>5% off</li>
                        <li>Active from Dec 20, 2025</li>
                    </ul>
                </div>
            </div>
         </div>
        
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
             <button type="button" class="bg-white border border-red-300 text-red-700 px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-red-50">Delete discount</button>
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-green-800 transition-colors">Update discount</button>
        </div>

    </form>
</div>
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
