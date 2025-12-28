@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Welcome Section -->
<div class="flex justify-between items-center">
    <h1 class="text-xl font-semibold text-gray-800">Good morning, Admin</h1>
    <span class="text-sm text-gray-500">Last login: Today, 9:41 AM</span>
</div>

<!-- Metrics Grid -->
<!-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> -->
    <!-- Metric Card -->
    <div class="card bg-white rounded-lg p-6 border border-gray-200">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-sm font-semibold text-gray-600">Total Sales</h3>
            <button class="text-gray-400 hover:text-gray-600"><i class="fas fa-ellipsis-h"></i></button>
        </div>
        <div class="flex items-baseline gap-2 mb-2">
            <span class="text-2xl font-bold text-gray-900">₹45,231.00</span>
            <span class="text-xs text-green-600 font-medium flex items-center">
                <i class="fas fa-arrow-up mr-1"></i> 12%
            </span>
        </div>
        <p class="text-xs text-gray-500">Compared to ₹40,100 previous period</p>
    </div>

    <!-- Metric Card -->
    
<!-- </div> -->

<!-- Recent Orders -->
<div class="card bg-white rounded-lg border border-gray-200">
    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-sm font-semibold text-gray-700">Recent Orders</h2>
        <a href="#" class="text-xs text-blue-600 hover:underline">View all</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500">
                <tr>
                    <th class="px-4 py-3">Order</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Customer</th>
                    <th class="px-4 py-3">Total</th>
                    <th class="px-4 py-3">Payment</th>
                    <th class="px-4 py-3">Fulfillment</th>
                    <th class="px-4 py-3 text-right">Items</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-semibold text-gray-800">#1024</td>
                    <td class="px-4 py-3 text-gray-500">Today, 9:21 AM</td>
                    <td class="px-4 py-3">Sarah J.</td>
                    <td class="px-4 py-3 text-gray-800">₹8,400</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-gray-200 text-gray-700 text-xs font-semibold">Pending</span></td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs font-semibold">Unfulfilled</span></td>
                    <td class="px-4 py-3 text-right">3</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-semibold text-gray-800">#1023</td>
                    <td class="px-4 py-3 text-gray-500">Yesterday</td>
                    <td class="px-4 py-3">Mike R.</td>
                    <td class="px-4 py-3 text-gray-800">₹2,100</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Paid</span></td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Fulfilled</span></td>
                    <td class="px-4 py-3 text-right">1</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-4 py-3 font-semibold text-gray-800">#1022</td>
                    <td class="px-4 py-3 text-gray-500">Dec 20</td>
                    <td class="px-4 py-3">Emma W.</td>
                    <td class="px-4 py-3 text-gray-800">₹12,500</td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Paid</span></td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Fulfilled</span></td>
                    <td class="px-4 py-3 text-right">4</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
