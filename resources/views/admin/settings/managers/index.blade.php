@extends('layouts.admin')

@section('title', 'Store Managers')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Store Managers</h1>
            <p class="text-sm text-gray-500 mt-1">Manage store managers and their permissions.</p>
        </div>
        <a href="{{ route('admin.settings.managers.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-green-800 transition-colors flex items-center gap-2">
            <i class="fas fa-user-plus"></i> Add Manager
        </a>
    </div>

    <!-- Managers List -->
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Assigned Store</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Mock Manager 1 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-gray-900">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">
                                JD
                            </div>
                            John Doe
                        </div>
                    </td>
                    <td class="px-6 py-4">john.doe@example.com</td>
                    <td class="px-6 py-4">Chandigarh Store</td>
                    <td class="px-6 py-4">
                        <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-600"></div>
                            <span class="ml-2 text-xs font-medium text-gray-900">Active</span>
                        </label>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-red-600 hover:text-red-900 text-xs font-semibold uppercase bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded transition-colors">Remove</button>
                    </td>
                </tr>

                <!-- Mock Manager 2 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 font-medium text-gray-900">
                         <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                AS
                            </div>
                            Alice Smith
                        </div>
                    </td>
                    <td class="px-6 py-4">alice.smith@example.com</td>
                    <td class="px-6 py-4">Mumbai Store</td>
                    <td class="px-6 py-4">
                         <!-- Toggle Switch -->
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" checked class="sr-only peer">
                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-600"></div>
                             <span class="ml-2 text-xs font-medium text-gray-900">Active</span>
                        </label>
                    </td>
                     <td class="px-6 py-4 text-right">
                        <button class="text-red-600 hover:text-red-900 text-xs font-semibold uppercase bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded transition-colors">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
