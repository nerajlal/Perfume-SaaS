@extends('layouts.admin')

@section('title', 'Analytics')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Analytics</h1>
    <div class="flex items-center gap-2 border border-gray-300 rounded-md bg-white px-3 py-1.5 shadow-sm text-sm">
        <i class="far fa-calendar text-gray-400"></i>
        <span class="text-gray-700">Last 30 days</span>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Total Sales -->
    <div class="card bg-white rounded-lg p-6 border border-gray-200">
        <h3 class="text-xs font-semibold uppercase text-gray-500 mb-2">Total Sales</h3>
        <div class="text-2xl font-bold text-gray-900 mb-1">₹45,231.00</div>
        <div class="text-sm text-green-600 font-medium">
             <i class="fas fa-arrow-up mr-1"></i> 12%
             <span class="text-gray-400 font-normal ml-1">vs previous period</span>
        </div>
        <!-- Dummy Chart Line -->
        <div class="h-10 mt-4 flex items-end gap-1">
            <div class="w-full bg-gray-100 h-full rounded-sm flex items-end overflow-hidden">
                 <div class="w-[10%] h-[40%] bg-blue-100"></div>
                 <div class="w-[10%] h-[60%] bg-blue-100"></div>
                 <div class="w-[10%] h-[30%] bg-blue-100"></div>
                 <div class="w-[10%] h-[70%] bg-blue-100"></div>
                 <div class="w-[10%] h-[50%] bg-blue-100"></div>
                 <div class="w-[10%] h-[80%] bg-blue-100"></div>
                 <div class="w-[10%] h-[60%] bg-blue-100"></div>
                 <div class="w-[10%] h-[90%] bg-blue-100"></div>
                 <div class="w-[10%] h-[70%] bg-blue-100"></div>
                 <div class="w-[10%] h-[100%] bg-blue-500"></div>
            </div>
        </div>
    </div>

    <!-- Online Store Sessions -->
    <div class="card bg-white rounded-lg p-6 border border-gray-200">
        <h3 class="text-xs font-semibold uppercase text-gray-500 mb-2">Online Store Sessions</h3>
        <div class="text-2xl font-bold text-gray-900 mb-1">10,234</div>
        <div class="text-sm text-red-600 font-medium">
             <i class="fas fa-arrow-down mr-1"></i> 3%
             <span class="text-gray-400 font-normal ml-1">vs previous period</span>
        </div>
         <div class="h-10 mt-4 bg-gray-50 rounded"></div>
    </div>

    <!-- Conversion Rate -->
    <div class="card bg-white rounded-lg p-6 border border-gray-200">
        <h3 class="text-xs font-semibold uppercase text-gray-500 mb-2">Returning Customer Rate</h3>
        <div class="text-2xl font-bold text-gray-900 mb-1">15.45%</div>
        <div class="text-sm text-green-600 font-medium">
             <i class="fas fa-arrow-up mr-1"></i> 5%
        </div>
        <div class="h-10 mt-4 bg-gray-50 rounded"></div>
    </div>
</div>

<div class="card bg-white rounded-lg border border-gray-200 p-6">
    <h3 class="font-semibold text-gray-800 mb-4">Top Selling Products</h3>
    <div class="space-y-4">
        <div class="flex items-center justify-between border-b border-gray-50 pb-2">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gray-100 rounded"></div>
                <span class="text-sm font-medium text-gray-700">Midnight Oud 50ml</span>
            </div>
            <span class="text-sm font-semibold text-gray-900">₹12,000</span>
        </div>
        <div class="flex items-center justify-between border-b border-gray-50 pb-2">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gray-100 rounded"></div>
                <span class="text-sm font-medium text-gray-700">Rose & Amber Gift Set</span>
            </div>
            <span class="text-sm font-semibold text-gray-900">₹8,500</span>
        </div>
    </div>
</div>
@endsection
