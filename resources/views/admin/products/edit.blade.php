@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="max-w-5xl mx-auto pb-10">
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.products') }}" class="text-gray-500 hover:text-gray-700">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="text-xl font-bold text-gray-900">Midnight Oud 50ml</h1>
        <span class="px-2 py-1 rounded bg-green-100 text-green-800 text-xs font-semibold uppercase tracking-wide">Active</span>
    </div>

    <form action="#" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Basic Info -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" value="Midnight Oud 50ml" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">Experience the deep, rich aroma of Midnight Oud. Top notes of saffron and rose.</textarea>
                    </div>
                </div>
            </div>

            <!-- Media -->
            <!-- Media -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-semibold text-gray-700 text-sm">Media</h2>
                    <button type="button" id="toggleUrlBtn" class="text-xs text-blue-600 hover:underline" onclick="toggleUrlInput()">Add from URL</button>
                </div>
                
                <!-- URL Input Section -->
                <div id="urlInputContainer" class="hidden mb-4 p-3 bg-gray-50 rounded border border-gray-200">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Image or Video URL</label>
                    <div class="flex gap-2">
                        <input type="text" id="mediaUrl" class="flex-1 px-3 py-1.5 border border-gray-300 rounded text-sm focus:outline-none focus:ring-green-500 focus:border-green-500" placeholder="https://example.com/image.jpg">
                        <button type="button" onclick="addMediaFromUrl()" class="bg-white border border-gray-300 text-gray-700 px-3 py-1.5 rounded text-xs font-medium hover:bg-gray-100">Add</button>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Supports types: .jpg, .png, .gif, .mp4, .mov</p>
                </div>

                <input type="file" id="media_upload" name="media[]" multiple accept="image/*" class="hidden" onchange="handleFileSelect(event)">
                
                <!-- Preview Grid -->
                <div id="media_preview_grid" class="grid grid-cols-4 gap-4 mb-4">
                     <!-- Existing Dummy Images -->
                     <div class="aspect-square bg-gray-100 rounded border border-gray-200 relative group overflow-hidden flex items-center justify-center">
                         <i class="fas fa-image text-gray-400 text-2xl"></i>
                         <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:text-red-600 z-10">
                            <i class="fas fa-trash text-xs"></i>
                        </button>
                     </div>
                     <div class="aspect-square bg-gray-100 rounded border border-gray-200 relative group overflow-hidden flex items-center justify-center">
                         <i class="fas fa-image text-gray-400 text-2xl"></i>
                         <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:text-red-600 z-10">
                            <i class="fas fa-trash text-xs"></i>
                        </button>
                     </div>
                </div>

                <div id="media_dropzone" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:bg-gray-50 transition-colors cursor-pointer" onclick="document.getElementById('media_upload').click()">
                    <div class="flex flex-col items-center">
                        <i class="fas fa-image text-gray-400 text-2xl mb-2"></i>
                        <span class="text-gray-600 text-sm font-medium mb-1">Add images</span>
                        <p class="text-xs text-gray-500">Accepts images only (use URL for videos)</p>
                    </div>
                </div>
            </div>

            <script>
                function toggleUrlInput() {
                    document.getElementById('urlInputContainer').classList.toggle('hidden');
                }

                function handleFileSelect(event) {
                    const files = event.target.files;
                    const previewGrid = document.getElementById('media_preview_grid');
                    
                    if (files.length > 0) {
                         previewGrid.classList.remove('hidden');
                    }

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        
                        if (!file.type.startsWith('image/')) continue;

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            createPreviewItem(e.target.result, 'image');
                        };
                        reader.readAsDataURL(file);
                    }
                }

                function addMediaFromUrl() {
                    const urlInput = document.getElementById('mediaUrl');
                    const url = urlInput.value.trim();
                    
                    if (!url) return;
                    
                    document.getElementById('media_preview_grid').classList.remove('hidden');
                    
                    // Simple check for video extensions
                    const isVideo = url.match(/\.(mp4|mov|webm)$/i);
                    const type = isVideo ? 'video' : 'image';
                    
                    createPreviewItem(url, type);
                    
                    urlInput.value = '';
                    toggleUrlInput();
                }

                function createPreviewItem(src, type) {
                    const previewGrid = document.getElementById('media_preview_grid');
                    const div = document.createElement('div');
                    div.className = 'aspect-square bg-gray-100 rounded border border-gray-200 relative group overflow-hidden flex items-center justify-center bg-black';
                    
                    let content = '';
                    if (type === 'video') {
                        content = `<video src="${src}" class="w-full h-full object-cover opacity-80"></video><i class="fas fa-play absolute text-white text-2xl opacity-80"></i>`;
                    } else {
                        content = `<img src="${src}" class="w-full h-full object-cover">`;
                    }

                    div.innerHTML = `
                        ${content}
                        <button type="button" onclick="this.parentElement.remove()" class="absolute top-1 right-1 bg-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:text-red-600 z-10">
                            <i class="fas fa-trash text-xs"></i>
                        </button>
                    `;
                    previewGrid.appendChild(div);
                }
            </script>

            <!-- Pricing -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                <h2 class="font-semibold text-gray-700 text-sm mb-4">Pricing</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">₹</span>
                            </div>
                            <input type="text" value="4200.00" class="w-full pl-7 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Compare-at price</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">₹</span>
                            </div>
                            <input type="text" value="5500.00" class="w-full pl-7 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            
            <!-- Status -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                <h2 class="font-semibold text-gray-700 text-sm mb-4">Product Status</h2>
                <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    <option value="active" selected>Active</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <!-- Organization -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                <h2 class="font-semibold text-gray-700 text-sm mb-4">Product Organization</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product type</label>
                        <input type="text" value="Perfume" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Collections</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="">Select a collection</option>
                            <option value="best_sellers" selected>Best Sellers</option>
                            <option value="new_arrivals">New Arrivals</option>
                            <option value="perfume">Perfumes</option>
                            <option value="gift_sets">Gift Sets</option>
                        </select>
                    </div>
                     <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="">Select gender</option>
                            <option value="him">For Him</option>
                            <option value="her">For Her</option>
                            <option value="unisex">Unisex</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Variants -->
            <div class="card bg-white rounded-lg border border-gray-200 shadow-sm p-4">
                <h2 class="font-semibold text-gray-700 text-sm mb-4">Product Variants (Sizes)</h2>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 border border-gray-200 rounded p-3 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="variants[]" value="30ml" id="var_30ml" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <label for="var_30ml" class="text-sm text-gray-700 font-medium cursor-pointer flex-1">30ml</label>
                    </div>
                    <div class="flex items-center gap-3 border border-gray-200 rounded p-3 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="variants[]" value="50ml" id="var_50ml" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500" checked>
                        <label for="var_50ml" class="text-sm text-gray-700 font-medium cursor-pointer flex-1">50ml</label>
                    </div>
                    <div class="flex items-center gap-3 border border-gray-200 rounded p-3 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="variants[]" value="100ml" id="var_100ml" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <label for="var_100ml" class="text-sm text-gray-700 font-medium cursor-pointer flex-1">100ml</label>
                    </div>
                    <div class="flex items-center gap-3 border border-gray-200 rounded p-3 hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="variants[]" value="tester" id="var_tester" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <label for="var_tester" class="text-sm text-gray-700 font-medium cursor-pointer flex-1">Sample / Tester (2ml)</label>
                    </div>
                
                </div>
            </div>

        </div>
        
        <div class="lg:col-span-3 flex justify-end gap-3 mt-4 border-t border-gray-200 pt-4">
            <button type="button" class="bg-red-50 text-red-600 border border-transparent px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-red-100 transition-colors mr-auto">Delete product</button>
            <button type="button" class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-gray-50">Discard</button>
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded shadow-sm text-sm font-medium hover:bg-green-800 transition-colors">Save</button>
        </div>
    </form>
</div>
@endsection
