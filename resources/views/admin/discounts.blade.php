@extends('layouts.admin')

@section('title', 'Discounts')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-xl font-semibold text-gray-800">Discounts</h1>
    <button class="bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-green-800 transition-colors shadow-sm">Create discount</button>
</div>

<!-- Empty State Dummy -->
<div class="card bg-white rounded-lg border border-gray-200 p-12 text-center">
    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
        <i class="fas fa-tag text-gray-400 text-2xl"></i>
    </div>
    <h3 class="text-lg font-semibold text-gray-900 mb-2">Manage discounts and promotions</h3>
    <p class="text-gray-500 max-w-md mx-auto mb-6 text-sm">Create discount codes and automatic discounts that apply at checkout. You can also create discounts that buy X get Y.</p>
    <button class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm">Create discount</button>
</div>
@endsection
