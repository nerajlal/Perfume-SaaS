@extends('layouts.admin')

@section('title', 'Discounts')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Discounts</h1>
    <a href="{{ route('admin.discounts.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition-colors shadow-sm">Create discount</a>
</div>

<!-- Stats -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="card bg-white rounded-lg border border-gray-200 p-4 text-center">
        <div class="text-2xl font-bold text-gray-800">2</div>
        <div class="text-xs text-gray-500 uppercase tracking-wide mt-1">Total</div>
    </div>
    <div class="card bg-white rounded-lg border border-gray-200 p-4 text-center">
        <div class="text-2xl font-bold text-green-600">2</div>
        <div class="text-xs text-gray-500 uppercase tracking-wide mt-1">Active</div>
    </div>
    <div class="card bg-white rounded-lg border border-gray-200 p-4 text-center">
        <div class="text-2xl font-bold text-gray-400">0</div>
        <div class="text-xs text-gray-500 uppercase tracking-wide mt-1">Expired</div>
    </div>
     <div class="card bg-white rounded-lg border border-gray-200 p-4 text-center">
        <div class="text-2xl font-bold text-gray-400">0</div>
        <div class="text-xs text-gray-500 uppercase tracking-wide mt-1">Inactive</div>
    </div>
</div>

<div class="card bg-white rounded-lg border border-gray-200 shadow-sm mb-6">
    <!-- Toolbar -->
    <div class="p-4 border-b border-gray-200 flex gap-4 bg-gray-50">
        <div class="flex-1">
             <div class="flex items-center gap-4 bg-white border border-gray-300 rounded-md px-3 py-2 text-sm shadow-sm">
                 <i class="fas fa-search text-gray-400"></i>
                 <input type="text" placeholder="Search discounts" class="flex-1 outline-none text-gray-700">
             </div>
        </div>
        <button class="px-3 py-2 border border-gray-300 bg-white rounded-md text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
            <i class="fas fa-filter mr-2"></i> Filter
        </button>
        <button class="px-3 py-2 border border-gray-300 bg-white rounded-md text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
            <i class="fas fa-sort mr-2"></i> Sort
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 w-16"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></th>
                    <th class="px-6 py-3">Discount code</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Discount</th>
                    <th class="px-6 py-3">Valid Period</th>
                    <th class="px-6 py-3 text-right">Used</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                     <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="font-bold text-gray-900">SY2QA0ZM</span>
                            <span class="text-xs text-gray-500">Midnight Oud 50ml</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Active</span>
                    </td>
                    <td class="px-6 py-4 text-gray-900">
                        5% off
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-xs">
                        Dec 20, 2025 - Dec 31, 2025
                    </td>
                    <td class="px-6 py-4 text-right">
                        0
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                             <a href="{{ route('admin.discounts.edit', 1) }}" class="p-1.5 hover:bg-white rounded text-gray-400 hover:text-blue-600 transition-colors shadow-sm"><i class="fas fa-edit"></i></a>
                             <button class="p-1.5 hover:bg-white rounded text-gray-400 hover:text-red-600 transition-colors shadow-sm"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                 <tr class="hover:bg-gray-50 transition-colors">
                     <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span class="font-bold text-gray-900">HT00XAL8</span>
                            <span class="text-xs text-gray-500">Rose & Amber Set</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">Active</span>
                    </td>
                    <td class="px-6 py-4 text-gray-900">
                        10% off
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-xs">
                        Dec 11, 2025 - Jan 02, 2026
                    </td>
                    <td class="px-6 py-4 text-right">
                        12
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end gap-2">
                             <a href="{{ route('admin.discounts.edit', 2) }}" class="p-1.5 hover:bg-white rounded text-gray-400 hover:text-blue-600 transition-colors shadow-sm"><i class="fas fa-edit"></i></a>
                             <button class="p-1.5 hover:bg-white rounded text-gray-400 hover:text-red-600 transition-colors shadow-sm"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection
