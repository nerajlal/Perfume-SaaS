@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.analytics') }}" class="text-gray-500 hover:text-gray-700 text-sm mb-4 inline-block">
        <i class="fas fa-arrow-left mr-1"></i> Back to Analytics
    </a>
    <div class="flex justify-between items-center">
        <h1 class="text-xl font-semibold text-gray-800">{{ $title }} Report</h1>
        <div class="flex items-center gap-2 border border-gray-300 rounded-md bg-white px-3 py-1.5 shadow-sm text-sm cursor-pointer hover:bg-gray-50">
            <i class="far fa-calendar text-gray-400"></i>
            <span class="text-gray-700">Last 30 days</span>
            <i class="fas fa-chevron-down text-gray-400 text-xs ml-1"></i>
        </div>
    </div>
</div>

<div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-6 mb-6">
    <div class="flex items-end gap-3 mb-6">
        <div class="text-3xl font-bold text-gray-900">{{ $value }}</div>
        <div class="text-sm text-green-600 font-medium mb-1">
             <i class="fas fa-arrow-up mr-1"></i> 12%
             <span class="text-gray-400 font-normal ml-1">vs previous period</span>
        </div>
    </div>

    <!-- Big Chart Placeholder -->
    <div class="h-64 bg-gray-50 rounded-lg border border-gray-100 flex items-end justify-between px-4 pb-0 relative overflow-hidden">
        <!-- Bars -->
        @for ($i = 0; $i < 30; $i++)
            @php $h = rand(30, 95); @endphp
            <div class="w-full bg-blue-500 opacity-80 hover:opacity-100 transition-opacity mx-0.5 rounded-t-sm" style="height: {{ $h }}%"></div>
        @endfor
    </div>
</div>

<!-- Detailed Data Table -->
<div class="card bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-4 border-b border-gray-200 bg-gray-50">
        <h3 class="font-semibold text-gray-700 text-sm">Daily Breakdown</h3>
    </div>
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 text-xs uppercase font-medium text-gray-500 border-b border-gray-100">
            <tr>
                <th class="px-6 py-3">Date</th>
                <th class="px-6 py-3 text-right">{{ $metricLabel }}</th>
                <th class="px-6 py-3 text-right">Growth</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @for ($i = 1; $i <= 5; $i++)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">Dec {{ 31 - $i }}, 2025</td>
                <td class="px-6 py-4 text-right font-medium text-gray-900">{{ $i % 2 == 0 ? '₹1,200.00' : '150' }}</td>
                <td class="px-6 py-4 text-right text-green-600">+5%</td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection
