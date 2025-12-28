@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Customers</h1>
    <div class="flex gap-2">
        <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm">Import</button>
        <button class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition-colors shadow-sm">Add customer</button>
    </div>
</div>

<div class="card bg-white rounded-lg border border-gray-200 shadow-sm min-h-[400px]">
    <!-- Placeholder Content -->
    <div class="p-0 overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
             <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-200">
                 <tr>
                    <th class="px-6 py-3 w-16"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></th>
                    <th class="px-6 py-3">Customer name</th>
                    <th class="px-6 py-3">Email subscription</th>
                    <th class="px-6 py-3">Location</th>
                    <th class="px-6 py-3">Orders</th>
                    <th class="px-6 py-3 text-right">Amount spent</th>
                 </tr>
            </thead>
             <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4 font-semibold text-gray-800 hover:underline cursor-pointer">Sarah Jenkins</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Subscribed</span></td>
                    <td class="px-6 py-4">Mumbai, India</td>
                    <td class="px-6 py-4">5</td>
                    <td class="px-6 py-4 text-right">₹12,400.00</td>
                </tr>
                 <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4 font-semibold text-gray-800 hover:underline cursor-pointer">John Doe</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs font-semibold">Not subscribed</span></td>
                    <td class="px-6 py-4">Delhi, India</td>
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4 text-right">₹3,500.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
