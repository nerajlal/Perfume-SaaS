@extends('layouts.admin')

@section('title', 'Analytics')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Analytics</h1>
    <div class="flex items-center gap-2 border border-gray-300 rounded-md bg-white px-3 py-1.5 shadow-sm text-sm cursor-pointer hover:bg-gray-50">
        <i class="far fa-calendar text-gray-400"></i>
        <span class="text-gray-700">Last 30 days</span>
        <i class="fas fa-chevron-down text-gray-400 text-xs ml-1"></i>
    </div>
</div>

<!-- Key Metrics (Normal) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Sales -->
    <a href="{{ route('admin.analytics.show', 'sales') }}" class="card bg-white rounded-lg p-5 border border-gray-200 hover:shadow-md transition-shadow cursor-pointer block">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-xs font-semibold uppercase text-gray-500">Total Sales</h3>
        </div>
        <div class="text-2xl font-bold text-gray-900 mb-1">₹45,231.00</div>
        <div class="text-sm text-green-600 font-medium">
             <i class="fas fa-arrow-up mr-1"></i> 12%
        </div>
        <div class="mt-3 h-1 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-blue-500 rounded-full" style="width: 70%"></div>
        </div>
    </a>

    <!-- Total Orders (New Normal) -->
    <a href="{{ route('admin.analytics.show', 'orders') }}" class="card bg-white rounded-lg p-5 border border-gray-200 hover:shadow-md transition-shadow cursor-pointer block">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-xs font-semibold uppercase text-gray-500">Total Orders</h3>
        </div>
        <div class="text-2xl font-bold text-gray-900 mb-1">342</div>
        <div class="text-sm text-green-600 font-medium">
             <i class="fas fa-arrow-up mr-1"></i> 8%
        </div>
         <div class="mt-3 h-1 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-purple-500 rounded-full" style="width: 55%"></div>
        </div>
    </a>

    <!-- Average Order Value (New Normal) -->
    <a href="{{ route('admin.analytics.show', 'aov') }}" class="card bg-white rounded-lg p-5 border border-gray-200 hover:shadow-md transition-shadow cursor-pointer block">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-xs font-semibold uppercase text-gray-500">Avg. Order Value</h3>
        </div>
        <div class="text-2xl font-bold text-gray-900 mb-1">₹1,250.00</div>
        <div class="text-sm text-red-600 font-medium">
             <i class="fas fa-arrow-down mr-1"></i> 2%
        </div>
         <div class="mt-3 h-1 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-orange-500 rounded-full" style="width: 40%"></div>
        </div>
    </a>

    <!-- Online Store Sessions -->
    <a href="{{ route('admin.analytics.show', 'sessions') }}" class="card bg-white rounded-lg p-5 border border-gray-200 hover:shadow-md transition-shadow cursor-pointer block">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-xs font-semibold uppercase text-gray-500">Sessions</h3>
        </div>
        <div class="text-2xl font-bold text-gray-900 mb-1">10,234</div>
        <div class="text-sm text-green-600 font-medium">
             <i class="fas fa-arrow-up mr-1"></i> 5%
        </div>
         <div class="mt-3 h-1 bg-gray-100 rounded-full overflow-hidden">
            <div class="h-full bg-indigo-500 rounded-full" style="width: 65%"></div>
        </div>
    </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    
    <!-- Top Products (Normal) -->
    <div class="card bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden lg:col-span-2">
        <div class="p-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
            <h3 class="font-semibold text-gray-700 text-sm">Top Selling Products</h3>
            <span class="text-xs text-gray-500">Last 30 days</span>
        </div>
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-100">
                <tr>
                    <th class="px-4 py-3">Product</th>
                    <th class="px-4 py-3 text-right">Units Sold</th>
                    <th class="px-4 py-3 text-right">Revenue</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                            <span class="font-medium text-gray-900">Midnight Oud 50ml</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-right text-gray-600">45</td>
                    <td class="px-4 py-3 text-right font-medium text-gray-900">₹1,89,000</td>
                </tr>
                 <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                            <span class="font-medium text-gray-900">Jasmine Musk Oil</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-right text-gray-600">32</td>
                    <td class="px-4 py-3 text-right font-medium text-gray-900">₹44,800</td>
                </tr>
                 <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                            <span class="font-medium text-gray-900">Rose & Amber Gift Set</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-right text-gray-600">18</td>
                    <td class="px-4 py-3 text-right font-medium text-gray-900">₹1,53,000</td>
                </tr>
            </tbody>
        </table>
        <div class="p-3 border-t border-gray-100 text-center">
             <a href="{{ route('admin.products', ['sort' => 'best_selling']) }}" class="text-xs text-blue-600 hover:underline">View all products</a>
        </div>
    </div>

    <!-- Sales by Location (New Pro) -->
    <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative overflow-hidden">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700 text-sm">Sales by Location</h3>
            <i class="fas fa-crown text-yellow-500 text-xs" title="Pro Feature"></i>
        </div>
        
        <!-- Blurred Content -->
        <div class="blur-sm select-none opacity-50 space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Mumbai</span>
                <div class="h-2 w-24 bg-gray-100 rounded-full"><div class="h-full bg-blue-500 rounded-full" style="width: 80%"></div></div>
                <span class="text-sm font-medium">₹12.5k</span>
            </div>
             <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Delhi</span>
                 <div class="h-2 w-24 bg-gray-100 rounded-full"><div class="h-full bg-blue-500 rounded-full" style="width: 65%"></div></div>
                <span class="text-sm font-medium">₹8.2k</span>
            </div>
             <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Bangalore</span>
                 <div class="h-2 w-24 bg-gray-100 rounded-full"><div class="h-full bg-blue-500 rounded-full" style="width: 45%"></div></div>
                <span class="text-sm font-medium">₹5.1k</span>
            </div>
             <div class="flex items-center justify-between">
                <span class="text-sm text-gray-600">Chennai</span>
                 <div class="h-2 w-24 bg-gray-100 rounded-full"><div class="h-full bg-blue-500 rounded-full" style="width: 30%"></div></div>
                <span class="text-sm font-medium">₹3.4k</span>
            </div>
        </div>

        <!-- Lock Overlay -->
        <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
            <div class="bg-white/90 p-3 rounded-full shadow-sm border border-gray-200 flex items-center justify-center w-10 h-10 mb-2">
                <i class="fas fa-lock text-gray-400"></i>
            </div>
            <span class="text-xs font-semibold text-gray-500 bg-white/90 px-2.5 py-1 rounded border border-gray-200">Upgrade to Pro</span>
        </div>
    </div>

</div>

<!-- Pro Features Row -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- Sessions by Device (Pro) -->
     <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative overflow-hidden">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700 text-sm">Sessions by Device</h3>
            <i class="fas fa-crown text-yellow-500 text-xs" title="Pro Feature"></i>
        </div>
        <div class="blur-md select-none opacity-40">
            <div class="flex items-center justify-center h-32 relative">
                <div class="w-24 h-24 rounded-full border-[8px] border-blue-500" style="border-right-color: #ef4444; transform: rotate(45deg);"></div>
            </div>
        </div>
        <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
             <div class="bg-white/90 p-3 rounded-full shadow-sm border border-gray-200 flex items-center justify-center w-10 h-10 mb-2">
                <i class="fas fa-lock text-gray-400"></i>
            </div>
            <span class="text-xs font-semibold text-gray-500 bg-white/90 px-2.5 py-1 rounded border border-gray-200">Upgrade to Pro</span>
        </div>
    </div>

    <!-- Returning Customer Rate (Pro) -->
    <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative overflow-hidden">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700 text-sm">Retention Rate</h3>
            <i class="fas fa-crown text-yellow-500 text-xs" title="Pro Feature"></i>
        </div>
        <div class="blur-md select-none opacity-40 space-y-2">
             <div class="text-2xl font-bold text-gray-900">15.45%</div>
             <div class="h-24 bg-gray-50 rounded w-full"></div>
        </div>
         <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
             <div class="bg-white/90 p-3 rounded-full shadow-sm border border-gray-200 flex items-center justify-center w-10 h-10 mb-2">
                <i class="fas fa-lock text-gray-400"></i>
            </div>
            <span class="text-xs font-semibold text-gray-500 bg-white/90 px-2.5 py-1 rounded border border-gray-200">Upgrade to Pro</span>
        </div>
    </div>

    <!-- Profit Margin (New Pro) -->
    <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative overflow-hidden">
        <div class="flex justify-between items-center mb-4">
             <h3 class="font-semibold text-gray-700 text-sm">Profit Margin</h3>
            <i class="fas fa-crown text-yellow-500 text-xs" title="Pro Feature"></i>
        </div>
        <div class="blur-md select-none opacity-40 space-y-2">
             <div class="text-2xl font-bold text-gray-900">22.1%</div>
             <div class="h-24 bg-gray-50 rounded w-full"></div>
        </div>
         <div class="absolute inset-0 flex flex-col items-center justify-center z-10">
             <div class="bg-white/90 p-3 rounded-full shadow-sm border border-gray-200 flex items-center justify-center w-10 h-10 mb-2">
                <i class="fas fa-lock text-gray-400"></i>
            </div>
            <span class="text-xs font-semibold text-gray-500 bg-white/90 px-2.5 py-1 rounded border border-gray-200">Upgrade to Pro</span>
        </div>
    </div>

</div>
@endsection
