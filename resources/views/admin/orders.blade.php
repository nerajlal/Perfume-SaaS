@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Orders</h1>
    <!-- <button class="bg-shopify-green text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition-colors shadow-sm">Content placeholder</button> -->
</div>

<div class="card bg-white rounded-lg border border-gray-200 shadow-sm">
    <div class="p-0 overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3">Order</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Customer</th>
                    <th class="px-6 py-3">Total</th>
                    <th class="px-6 py-3">Payment</th>
                    <th class="px-6 py-3">Fulfillment</th>
                    <th class="px-6 py-3 text-right">Items</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Dummy Row 1 -->
                <tr class="hover:bg-gray-50 transition-colors cursor-pointer" onclick="window.location='{{ route('admin.orders.show', 1025) }}'">
                    <td class="px-6 py-4 font-semibold text-gray-800 hover:text-blue-600 hover:underline">#1025</td>
                    <td class="px-6 py-4 text-gray-500">Just now</td>
                    <td class="px-6 py-4">John Doe</td>
                    <td class="px-6 py-4 text-gray-800">₹3,500.00</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs font-semibold">Pending</span></td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs font-semibold">Unfulfilled</span></td>
                    <td class="px-6 py-4 text-right">1</td>
                </tr>
                <!-- Dummy Row 2 -->
                <tr class="hover:bg-gray-50 transition-colors cursor-pointer" onclick="window.location='{{ route('admin.orders.show', 1024) }}'">
                    <td class="px-6 py-4 font-semibold text-gray-800 hover:text-blue-600 hover:underline">#1024</td>
                    <td class="px-6 py-4 text-gray-500">Today, 9:21 AM</td>
                    <td class="px-6 py-4">Sarah Jenkins</td>
                    <td class="px-6 py-4 text-gray-800">₹8,400.00</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Paid</span></td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Fulfilled</span></td>
                    <td class="px-6 py-4 text-right">3</td>
                </tr>
                 <!-- Dummy Row 3 -->
                 <tr class="hover:bg-gray-50 transition-colors cursor-pointer" onclick="window.location='{{ route('admin.orders.show', 1023) }}'">
                    <td class="px-6 py-4 font-semibold text-gray-800 hover:text-blue-600 hover:underline">#1023</td>
                    <td class="px-6 py-4 text-gray-500">Yesterday</td>
                    <td class="px-6 py-4">Michael Ross</td>
                    <td class="px-6 py-4 text-gray-800">₹2,100.00</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Paid</span></td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Fulfilled</span></td>
                    <td class="px-6 py-4 text-right">1</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Pagination Dummy -->
    <div class="p-4 border-t border-gray-200 flex justify-end gap-2 text-sm text-gray-600">
        <button class="px-3 py-1 border rounded hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
        <button class="px-3 py-1 border rounded hover:bg-gray-50">Next</button>
    </div>
</div>
@endsection
