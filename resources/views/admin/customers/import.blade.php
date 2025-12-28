@extends('layouts.admin')

@section('title', 'Import Customers')

@section('content')
<div class="max-w-xl mx-auto pb-10 mt-10">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.customers') }}" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-xl font-bold text-gray-900">Import customers</h1>
    </div>

    <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-6 text-center">
        <div class="mb-6">
            <i class="fas fa-file-csv text-green-600 text-5xl mb-4"></i>
            <h2 class="text-lg font-semibold text-gray-900">Upload CSV file</h2>
            <p class="text-sm text-gray-500 mt-1">Download a <a href="#" class="text-blue-600 hover:underline">sample CSV template</a> to see an example of the format required.</p>
        </div>

        <div class="border-2 border-dashed border-gray-300 rounded-lg p-10 hover:bg-gray-50 transition-colors cursor-pointer mb-6" onclick="document.getElementById('file_upload').click()">
            <div class="flex flex-col items-center">
                <span class="bg-gray-100 p-3 rounded-full mb-3">
                    <i class="fas fa-cloud-upload-alt text-gray-500 text-xl"></i>
                </span>
                <span class="text-gray-900 font-medium mb-1">Click to upload</span>
                <span class="text-xs text-gray-500">or drag and drop</span>
            </div>
            <input type="file" id="file_upload" class="hidden" accept=".csv">
        </div>

        <div class="flex items-center gap-2 mb-6 text-left p-3 bg-yellow-50 text-yellow-800 rounded text-sm border border-yellow-200">
            <i class="fas fa-exclamation-triangle"></i>
            <p>Existing customers with the same email or phone number will be updated.</p>
        </div>

        <div class="flex justify-between items-center">
            <button type="button" class="text-gray-500 hover:text-gray-700 font-medium text-sm">Cancel</button>
            <button type="button" class="bg-green-700 text-white px-6 py-2 rounded shadow-sm text-sm font-medium hover:bg-green-800 transition-colors">Import customers</button>
        </div>
    </div>
</div>
@endsection
