@extends('layouts.admin')

@section('title', 'Add Customer')

@section('content')
<div class="max-w-4xl mx-auto pb-10">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.customers') }}" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-xl font-bold text-gray-900">Add customer</h1>
    </div>

    <form action="#" method="POST" class="space-y-6">
        
        <!-- Customer Overview -->
        <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
             <h2 class="font-semibold text-gray-700 text-sm mb-4">Customer Overview</h2>
             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                 <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First name</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                 <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last name</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                 <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                  <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone number</label>
                    <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                 
                 <div class="md:col-span-2 flex items-center gap-3 mt-2">
                     <input type="checkbox" id="marketing" class="rounded border-gray-300 text-green-600 focus:ring-green-500 h-4 w-4">
                     <label for="marketing" class="text-sm text-gray-600">Customer agreed to receive marketing emails.</label>
                 </div>
                 
                  <div class="md:col-span-2 flex items-center gap-3">
                     <input type="checkbox" id="sms_marketing" class="rounded border-gray-300 text-green-600 focus:ring-green-500 h-4 w-4">
                     <label for="sms_marketing" class="text-sm text-gray-600">Customer agreed to receive SMS marketing.</label>
                 </div>
             </div>
        </div>

        <!-- Address -->
        <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
             <h2 class="font-semibold text-gray-700 text-sm mb-4">Address</h2>
             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                 <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Country/Region</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        <option>India</option>
                        <option>United States</option>
                        <option>United Kingdom</option>
                        <option>UAE</option>
                    </select>
                 </div>
                  <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                 <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                 <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Apartment, suite, etc.</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                 <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
                 <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                     <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        <option>Maharashtra</option>
                        <option>Delhi</option>
                        <option>Karnataka</option>
                        <option>Tamil Nadu</option>
                    </select>
                 </div>
                 <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">PIN code</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                 </div>
             </div>
        </div>

        <!-- Notes -->
         <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
             <h2 class="font-semibold text-gray-700 text-sm mb-4">Notes</h2>
             <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Note</label>
                <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Add a note about this customer"></textarea>
             </div>
        </div>
        
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-200">
             <button type="button" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-gray-50">Discard</button>
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-green-800 transition-colors">Save</button>
        </div>

    </form>
</div>
@endsection
