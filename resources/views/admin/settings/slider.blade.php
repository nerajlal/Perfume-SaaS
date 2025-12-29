@extends('layouts.admin')

@section('title', 'Hero Slider')

@section('content')
<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Hero Slider</h1>
            <p class="text-sm text-gray-500 mt-1">Manage home page hero banner slides order and content.</p>
        </div>
        <a href="{{ route('admin.settings.slider.create') }}" class="bg-green-700 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-green-800 transition-colors flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Slide
        </a>
    </div>

    <!-- Slides List (Draggable Style) -->
    <div class="bg-white rounded-lg border border-gray-200 shadow-sm overflow-hidden">
        <div class="divide-y divide-gray-200">
            
            <!-- Slide Item 1 -->
            <div class="p-4 flex items-center gap-4 hover:bg-gray-50 transition-colors group">
                <!-- Drag Handle -->
                <div class="cursor-move text-gray-400 group-hover:text-gray-600 px-2">
                    <i class="fas fa-grip-vertical"></i>
                </div>

                <!-- Desktop Thumb -->
                <div class="w-32 h-12 bg-gray-100 rounded border border-gray-200 overflow-hidden relative flex-shrink-0">
                    <img src="https://myop.in/cdn/shop/files/b2g1_6e47992a-e85f-4019-89d5-179ac74e931d.webp?v=1740730153&width=5760" class="w-full h-full object-cover">
                    <span class="absolute bottom-0 right-0 bg-black/50 text-white text-[10px] px-1">Desktop</span>
                </div>

                <!-- Mobile Thumb -->
                <div class="w-8 h-12 bg-gray-100 rounded border border-gray-200 overflow-hidden relative flex-shrink-0">
                    <img src="https://myop.in/cdn/shop/files/b2g1_phone.webp?v=1740730153&width=1000" class="w-full h-full object-cover">
                    <span class="absolute bottom-0 right-0 bg-black/50 text-white text-[10px] px-1">Mob</span>
                </div>

                <!-- Info -->
                <div class="flex-1 min-w-0 ml-2">
                    <h3 class="text-sm font-semibold text-gray-900 truncate">Buy 2 Get 1</h3>
                </div>

                <!-- Status -->
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Active
                </span>

                <!-- Actions -->
                <div class="flex items-center gap-2 ml-4">
                    <button class="p-2 text-gray-400 hover:text-red-600 transition-colors" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>

            <!-- Slide Item 2 -->
            <div class="p-4 flex items-center gap-4 hover:bg-gray-50 transition-colors group">
                <!-- Drag Handle -->
                <div class="cursor-move text-gray-400 group-hover:text-gray-600 px-2">
                    <i class="fas fa-grip-vertical"></i>
                </div>

                <!-- Desktop Thumb -->
                <div class="w-32 h-12 bg-gray-100 rounded border border-gray-200 overflow-hidden relative flex-shrink-0">
                    <img src="https://myop.in/cdn/shop/files/banner_elante_chandigarh_copy.webp?v=1764662226&width=5760" class="w-full h-full object-cover">
                     <span class="absolute bottom-0 right-0 bg-black/50 text-white text-[10px] px-1">Desktop</span>
                </div>

                <!-- Mobile Thumb -->
                <div class="w-8 h-12 bg-gray-100 rounded border border-gray-200 overflow-hidden relative flex-shrink-0">
                    <img src="https://myop.in/cdn/shop/files/Banner_elante_chandigarh_phone_copy_1.webp?v=1764662226&width=1000" class="w-full h-full object-cover">
                    <span class="absolute bottom-0 right-0 bg-black/50 text-white text-[10px] px-1">Mob</span>
                </div>

                <!-- Info -->
                <div class="flex-1 min-w-0 ml-2">
                    <h3 class="text-sm font-semibold text-gray-900 truncate">New Store - Chandigarh</h3>
                </div>

                <!-- Status -->
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Active
                </span>

                <!-- Actions -->
                <div class="flex items-center gap-2 ml-4">
                    <button class="p-2 text-gray-400 hover:text-red-600 transition-colors" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
