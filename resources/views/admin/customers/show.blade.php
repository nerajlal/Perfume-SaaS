@extends('layouts.admin')

@section('title', 'Sarah Jenkins')

@section('content')
<div class="max-w-6xl mx-auto pb-10">
    <!-- Header -->
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.customers') }}" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="flex-1">
            <h1 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                Sarah Jenkins 
                <span class="px-2 py-0.5 rounded bg-green-100 text-green-800 text-xs font-semibold uppercase tracking-wide">Subscribed</span>
            </h1>
            <p class="text-sm text-gray-500">Mumbai, India • Customer for 2 years</p>
        </div>
        <button class="text-gray-500 hover:text-gray-700 font-medium text-sm">Prev</button>
        <span class="text-gray-300">|</span>
        <button class="text-gray-500 hover:text-gray-700 font-medium text-sm">Next</button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left Column: Orders & Timeline -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Orders -->
             <div class="card bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
                 <div class="p-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                    <h2 class="font-semibold text-gray-700 text-sm">Orders</h2>
                    <span class="text-xs text-gray-500">Total spent: ₹12,400.00</span>
                 </div>
                 
                 <div class="overflow-x-auto">
                     <table class="w-full text-left text-sm">
                        <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-100">
                            <tr>
                                <th class="px-4 py-3">Order</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <a href="#" class="hover:underline">#1024</a>
                                </td>
                                <td class="px-4 py-3 text-gray-500">Dec 20, 2024</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800 text-xs font-semibold">Unfulfilled</span></td>
                                <td class="px-4 py-3 text-right text-gray-600">₹4,200.00</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <a href="#" class="hover:underline">#1018</a>
                                </td>
                                <td class="px-4 py-3 text-gray-500">Dec 10, 2024</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Fulfilled</span></td>
                                <td class="px-4 py-3 text-right text-gray-600">₹3,500.00</td>
                            </tr>
                             <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <a href="#" class="hover:underline">#1012</a>
                                </td>
                                <td class="px-4 py-3 text-gray-500">Nov 25, 2024</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold">Fulfilled</span></td>
                                <td class="px-4 py-3 text-right text-gray-600">₹1,200.00</td>
                            </tr>
                             <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <a href="#" class="hover:underline">#1005</a>
                                </td>
                                <td class="px-4 py-3 text-gray-500">Nov 01, 2024</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs font-semibold">Archived</span></td>
                                <td class="px-4 py-3 text-right text-gray-600">₹2,800.00</td>
                            </tr>
                             <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <a href="#" class="hover:underline">#1001</a>
                                </td>
                                <td class="px-4 py-3 text-gray-500">Oct 15, 2024</td>
                                <td class="px-4 py-3"><span class="px-2 py-1 rounded bg-gray-100 text-gray-600 text-xs font-semibold">Archived</span></td>
                                <td class="px-4 py-3 text-right text-gray-600">₹700.00</td>
                            </tr>
                        </tbody>
                     </table>
                     <div class="px-4 py-3 border-t border-gray-100 text-center">
                         <a href="#" class="text-xs font-medium text-gray-500 hover:text-gray-700">View all orders</a>
                     </div>
                 </div>
            </div>

            <!-- Notes -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                 <div class="flex justify-between items-center mb-4">
                     <h2 class="font-semibold text-gray-700 text-sm">Notes</h2>
                     <button class="text-blue-600 hover:underline text-xs">Edit</button>
                 </div>
                 <p class="text-sm text-gray-600 italic">"Preferrs delivery on weekends. Called to confirm address twice."</p>
            </div>
            

        </div>

        <!-- Right Column: Customer Info -->
        <div class="space-y-6">
            
            <!-- Customer Contact -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative group">
                <button class="absolute top-4 right-4 text-blue-600 hover:underline text-xs opacity-0 group-hover:opacity-100 transition-opacity">Edit</button>
                <h2 class="font-semibold text-gray-700 text-sm mb-4">Customer Contact</h2>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                         <div class="h-8 w-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">SJ</div>
                         <a href="mailto:sarah@example.com" class="text-blue-600 hover:underline text-sm">sarah@example.com</a>
                         <button class="text-gray-400 hover:text-gray-600"><i class="far fa-copy"></i></button>
                    </div>
                     <div class="flex items-center gap-3">
                         <i class="fas fa-phone text-gray-400 w-8 text-center text-sm"></i>
                         <span class="text-sm text-gray-700">+91 98765 43210</span>
                    </div>
                </div>
            </div>

            <!-- Default Address -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4 relative group">
                <button class="absolute top-4 right-4 text-blue-600 hover:underline text-xs opacity-0 group-hover:opacity-100 transition-opacity">Manage</button>
                <h2 class="font-semibold text-gray-700 text-sm mb-4">Default Address</h2>
                <div class="text-sm text-gray-600 space-y-1">
                    <p class="font-medium text-gray-900">Sarah Jenkins</p>
                    <p>123, Orchid Towers, Bandra West</p>
                    <p>Mumbai, Maharashtra 400050</p>
                    <p>India</p>
                </div>
            </div>

            
            <div class="pt-4 border-t border-gray-200">
                <button class="text-red-600 hover:text-red-800 text-sm font-medium w-full text-left">Delete customer</button>
            </div>

        </div>
    </div>
</div>
@endsection
