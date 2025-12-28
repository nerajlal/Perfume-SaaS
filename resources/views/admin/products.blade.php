@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Products</h1>
    <button class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition-colors shadow-sm">Add product</button>
</div>

<div class="card bg-white rounded-lg border border-gray-200 shadow-sm">
    <div class="p-4 border-b border-gray-200 flex gap-4 bg-gray-50">
        <div class="flex-1">
             <div class="flex items-center gap-4 bg-white border border-gray-300 rounded-md px-3 py-2 text-sm shadow-sm">
                 <i class="fas fa-search text-gray-400"></i>
                 <input type="text" placeholder="Filter products" class="flex-1 outline-none text-gray-700">
             </div>
        </div>
        <button class="px-3 py-2 border border-gray-300 bg-white rounded-md text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
            <i class="fas fa-sort mr-2"></i> Sort
        </button>
    </div>

    <div class="p-0 overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-200">
                 <tr>
                    <th class="px-6 py-3 w-16"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></th>
                    <th class="px-6 py-3">Product</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Inventory</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Vendor</th>
                 </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                            <span class="font-medium text-gray-800 hover:underline cursor-pointer">Midnight Oud 50ml</span>
                        </div>
                    </td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Active</span></td>
                    <td class="px-6 py-4 text-gray-500">25 in stock</td>
                    <td class="px-6 py-4">Perfume</td>
                    <td class="px-6 py-4">Nurah</td>
                </tr>
                 <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                            <span class="font-medium text-gray-800 hover:underline cursor-pointer">Rose & Amber Gift Set</span>
                        </div>
                    </td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-gray-200 text-gray-800 text-xs font-semibold">Draft</span></td>
                    <td class="px-6 py-4 text-gray-500">0 in stock</td>
                    <td class="px-6 py-4">Gift Set</td>
                    <td class="px-6 py-4">Nurah</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
