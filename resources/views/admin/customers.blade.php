@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
    <div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Customers</h1>
    <div class="flex gap-2">
        <a href="{{ route('admin.customers.import') }}" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm">Import</a>
        <a href="{{ route('admin.customers.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition-colors shadow-sm">Add customer</a>
    </div>
</div>

<div class="card bg-white rounded-lg border border-gray-200 shadow-sm min-h-[400px]">
    <div class="p-4 border-b border-gray-200 flex gap-4 bg-gray-50">
        <div class="flex-1">
             <div class="flex items-center gap-4 bg-white border border-gray-300 rounded-md px-3 py-2 text-sm shadow-sm">
                 <i class="fas fa-search text-gray-400"></i>
                 <input type="text" placeholder="Search customers" class="flex-1 outline-none text-gray-700">
             </div>
        </div>
        <button class="px-3 py-2 border border-gray-300 bg-white rounded-md text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
            <i class="fas fa-filter mr-2"></i> Filter
        </button>
        <button class="px-3 py-2 border border-gray-300 bg-white rounded-md text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
            <i class="fas fa-sort mr-2"></i> Sort
        </button>
    </div>

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
                <tr class="hover:bg-gray-50 transition-colors cursor-pointer group" onclick="window.location='{{ route('admin.customers.show', 1) }}'">
                    <td class="px-6 py-4" onclick="event.stopPropagation()"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">SJ</div>
                            <div>
                                <p class="font-semibold text-gray-900 group-hover:underline">Sarah Jenkins</p>
                                <p class="text-xs text-gray-500">sarah@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Subscribed</span></td>
                    <td class="px-6 py-4">Mumbai, India</td>
                    <td class="px-6 py-4">5 orders</td>
                    <td class="px-6 py-4 text-right font-medium text-gray-900">₹12,400.00</td>
                </tr>
                 <tr class="hover:bg-gray-50 transition-colors cursor-pointer group" onclick="window.location='{{ route('admin.customers.show', 2) }}'">
                    <td class="px-6 py-4" onclick="event.stopPropagation()"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                         <div class="flex items-center gap-3">
                            <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">JD</div>
                            <div>
                                <p class="font-semibold text-gray-900 group-hover:underline">John Doe</p>
                                <p class="text-xs text-gray-500">john@example.com</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs font-semibold">Not subscribed</span></td>
                    <td class="px-6 py-4">Delhi, India</td>
                    <td class="px-6 py-4">1 order</td>
                    <td class="px-6 py-4 text-right font-medium text-gray-900">₹3,500.00</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
