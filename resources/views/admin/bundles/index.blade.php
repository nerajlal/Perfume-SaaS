@extends('layouts.admin')

@section('title', 'Bundles')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Bundles</h1>
    <a href="{{ route('admin.bundles.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition-colors shadow-sm">Create bundle</a>
</div>

<div class="card bg-white rounded-lg border border-gray-200 shadow-sm">
    <div class="p-0 overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-200">
                 <tr>
                    <th class="px-6 py-3 w-16"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Products</th>
                    <th class="px-6 py-3">Total Sales</th>
                    <th class="px-6 py-3 w-20"></th>
                 </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors cursor-pointer group" onclick="window.location='{{ route('admin.bundles.edit', 1) }}'">
                    <td class="px-6 py-4" onclick="event.stopPropagation()"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center overflow-hidden">
                                <i class="fas fa-cubes text-gray-400"></i>
                            </div>
                            <span class="font-medium text-gray-800 hover:underline">Summer Essentials Bundle</span>
                        </div>
                    </td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Active</span></td>
                    <td class="px-6 py-4">3 products</td>
                    <td class="px-6 py-4">₹ 1,250.00</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.bundles.edit', 1) }}" class="text-gray-400 hover:text-gray-600 opacity-0 group-hover:opacity-100 transition-opacity" onclick="event.stopPropagation()">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                </tr>
                 <tr class="hover:bg-gray-50 transition-colors cursor-pointer group" onclick="window.location='{{ route('admin.bundles.edit', 2) }}'">
                    <td class="px-6 py-4" onclick="event.stopPropagation()"><input type="checkbox" class="rounded border-gray-300 text-green-600 focus:ring-green-500"></td>
                    <td class="px-6 py-4">
                         <div class="flex items-center gap-3">
                            <div class="h-10 w-10 bg-gray-100 rounded border border-gray-200 flex items-center justify-center overflow-hidden">
                                <i class="fas fa-cubes text-gray-400"></i>
                            </div>
                            <span class="font-medium text-gray-800 hover:underline">Oud Lovers Kit</span>
                        </div>
                    </td>
                    <td class="px-6 py-4"><span class="px-2 py-1 rounded bg-gray-100 text-gray-800 text-xs font-semibold">Draft</span></td>
                    <td class="px-6 py-4">2 products</td>
                    <td class="px-6 py-4">₹ 1000.00</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.bundles.edit', 2) }}" class="text-gray-400 hover:text-gray-600 opacity-0 group-hover:opacity-100 transition-opacity" onclick="event.stopPropagation()">
                            <i class="fas fa-pen"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
