@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid" style="max-width: 1200px; padding-bottom: 2.5rem;">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.products') }}" class="text-secondary text-decoration-none">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="h3 fw-bold text-dark mb-0">Add product</h1>
    </div>

    <form action="#" method="POST" class="row g-4">
        <!-- Left Column -->
        <div class="col-12 col-lg-8">
            
            <!-- Basic Info -->
            <div class="card border shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-medium text-secondary small mb-1">Title</label>
                        <input type="text" class="form-control shadow-sm" placeholder="Jasmine Perfume">
                    </div>
                    <div>
                        <label class="form-label fw-medium text-secondary small mb-1">Description</label>
                        <textarea rows="6" class="form-control shadow-sm"></textarea>
                    </div>
                </div>
            </div>

            <!-- Media -->
            <div class="card border shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="h6 fw-semibold text-secondary mb-0">Media</h2>
                        <button type="button" id="toggleUrlBtn" class="btn btn-link btn-sm text-decoration-none p-0" onclick="toggleUrlInput()">Add from URL</button>
                    </div>
                    
                    <!-- URL Input Section -->
                    <div id="urlInputContainer" class="d-none mb-3 p-3 bg-light rounded border">
                        <label class="form-label fw-medium text-secondary extra-small mb-1">Image or Video URL</label>
                        <div class="input-group input-group-sm">
                            <input type="text" id="mediaUrl" class="form-control" placeholder="https://example.com/image.jpg">
                            <button type="button" onclick="addMediaFromUrl()" class="btn btn-white border text-secondary">Add</button>
                        </div>
                        <p class="text-muted extra-small mt-1 mb-0">Supports types: .jpg, .png, .gif, .mp4, .mov</p>
                    </div>

                    <input type="file" id="media_upload" name="media[]" multiple accept="image/*" class="d-none" onchange="handleFileSelect(event)">
                    
                    <!-- Preview Grid -->
                    <div id="media_preview_grid" class="row g-3 mb-3 d-none"></div>

                    <div id="media_dropzone" class="border opacity-50 border-2 border-dashed rounded py-5 text-center bg-light bg-opacity-25 cursor-pointer hover-bg-light transition-base" onclick="document.getElementById('media_upload').click()">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-image text-secondary opacity-50 fs-2 mb-2"></i>
                            <span class="text-secondary small fw-medium mb-1">Add images</span>
                            <p class="text-muted extra-small mb-0">Accepts images only (use URL for videos)</p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function toggleUrlInput() {
                    document.getElementById('urlInputContainer').classList.toggle('d-none');
                }

                function handleFileSelect(event) {
                    const files = event.target.files;
                    const previewGrid = document.getElementById('media_preview_grid');
                    
                    if (files.length > 0) {
                         previewGrid.classList.remove('d-none');
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
                    
                    document.getElementById('media_preview_grid').classList.remove('d-none');
                    
                    // Simple check for video extensions
                    const isVideo = url.match(/\.(mp4|mov|webm)$/i);
                    const type = isVideo ? 'video' : 'image';
                    
                    createPreviewItem(url, type);
                    
                    urlInput.value = '';
                    toggleUrlInput();
                }

                function createPreviewItem(src, type) {
                    const previewGrid = document.getElementById('media_preview_grid');
                    const col = document.createElement('div');
                    col.className = 'col-6 col-md-3';
                    
                    const div = document.createElement('div');
                    div.className = 'ratio ratio-1x1 bg-dark rounded border overflow-hidden position-relative group-hover-container';
                    
                    let content = '';
                    if (type === 'video') {
                        content = `<video src="${src}" class="w-100 h-100 object-fit-cover opacity-75"></video><i class="fas fa-play position-absolute top-50 start-50 translate-middle text-white fs-3 opacity-75"></i>`;
                    } else {
                        content = `<img src="${src}" class="w-100 h-100 object-fit-cover">`;
                    }

                    div.innerHTML = `
                        ${content}
                        <button type="button" onclick="this.closest('.col-6').remove()" class="btn btn-white btn-sm rounded-circle shadow-sm position-absolute top-0 end-0 m-1 opacity-0 group-hover-visible transition-opacity text-danger p-0 d-flex align-items-center justify-content-center" style="width: 24px; height: 24px;">
                            <i class="fas fa-trash extra-small"></i>
                        </button>
                    `;
                    col.appendChild(div);
                    previewGrid.appendChild(col);
                }
            </script>

            <!-- Variants -->
            <div class="card border shadow-sm mb-4">
                <div class="card-body p-4">
                    <h2 class="h6 fw-semibold text-secondary mb-3">Product Variants (Sizes)</h2>
                    <div class="vstack gap-3">
                        <!-- 30ml -->
                        <div class="border rounded p-3 bg-light bg-opacity-50">
                            <div class="form-check mb-3 d-flex align-items-center gap-2 ps-0">
                                <input type="checkbox" name="variants[]" value="30ml" id="var_30ml" class="form-check-input mt-0">
                                <label for="var_30ml" class="form-check-label small fw-bold text-dark cursor-pointer flex-grow-1">30ml</label>
                            </div>
                            <div class="row g-2 ps-4">
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Stock</label>
                                    <input type="number" class="form-control form-control-sm shadow-sm" placeholder="0">
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Price</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Compare At</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 50ml -->
                        <div class="border rounded p-3 bg-light bg-opacity-50">
                            <div class="form-check mb-3 d-flex align-items-center gap-2 ps-0">
                                <input type="checkbox" name="variants[]" value="50ml" id="var_50ml" checked class="form-check-input mt-0">
                                <label for="var_50ml" class="form-check-label small fw-bold text-dark cursor-pointer flex-grow-1">50ml</label>
                            </div>
                            <!-- Variant Inputs -->
                             <div class="row g-2 ps-4">
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Stock</label>
                                    <input type="number" class="form-control form-control-sm shadow-sm" placeholder="0">
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Price</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Compare At</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 100ml -->
                        <div class="border rounded p-3 bg-light bg-opacity-50">
                            <div class="form-check mb-3 d-flex align-items-center gap-2 ps-0">
                                <input type="checkbox" name="variants[]" value="100ml" id="var_100ml" class="form-check-input mt-0">
                                <label for="var_100ml" class="form-check-label small fw-bold text-dark cursor-pointer flex-grow-1">100ml</label>
                            </div>
                            <div class="row g-2 ps-4">
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Stock</label>
                                    <input type="number" class="form-control form-control-sm shadow-sm" placeholder="0">
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Price</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Compare At</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sample/Tester -->
                        <div class="border rounded p-3 bg-light bg-opacity-50">
                            <div class="form-check mb-3 d-flex align-items-center gap-2 ps-0">
                                <input type="checkbox" name="variants[]" value="tester" id="var_tester" class="form-check-input mt-0">
                                <label for="var_tester" class="form-check-label small fw-bold text-dark cursor-pointer flex-grow-1">Sample / Tester (2ml)</label>
                            </div>
                            <div class="row g-2 ps-4">
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Stock</label>
                                    <input type="number" class="form-control form-control-sm shadow-sm" placeholder="0">
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Price</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <label class="form-label extra-small fw-medium text-muted mb-1">Compare At</label>
                                    <div class="input-group input-group-sm shadow-sm">
                                        <span class="input-group-text bg-white text-muted border-end-0">₹</span>
                                        <input type="text" class="form-control border-start-0 ps-1" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="col-12 col-lg-4">
            
            <!-- Status -->
            <div class="card border shadow-sm mb-4">
                <div class="card-body p-4">
                    <h2 class="h6 fw-semibold text-secondary mb-3">Product Status</h2>
                    <select class="form-select shadow-sm">
                        <option value="active">Active</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
            </div>

            <!-- Organization -->
            <div class="card border shadow-sm mb-4">
                <div class="card-body p-4">
                    <h2 class="h6 fw-semibold text-secondary mb-3">Product Organization</h2>
                    <div class="vstack gap-3">
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Product type</label>
                            <input type="text" class="form-control shadow-sm">
                        </div>
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Collections</label>
                            <select class="form-select shadow-sm">
                                <option value="">Select a collection</option>
                                <option value="best_sellers">Best Sellers</option>
                                <option value="new_arrivals">New Arrivals</option>
                                <option value="perfume">Perfumes</option>
                                <option value="gift_sets">Gift Sets</option>
                            </select>
                        </div>
                         <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Gender</label>
                            <select class="form-select shadow-sm">
                                <option value="">Select gender</option>
                                <option value="him">For Him</option>
                                <option value="her">For Her</option>
                                <option value="unisex">Unisex</option>
                            </select>
                        </div>
                </div>
                </div>
            </div>

            <!-- Fragrance Profile (New Location) -->
            <div class="card border shadow-sm mb-4">
                <div class="card-body p-4">
                    <h2 class="h6 fw-semibold text-secondary mb-3">Fragrance Profile</h2>
                    <div class="vstack gap-3">
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Olfactory Family</label>
                            <select class="form-select shadow-sm">
                                <option value="">Select a family</option>
                                <option value="floral">Floral</option>
                                <option value="woody">Woody</option>
                                <option value="oriental">Oriental</option>
                                <option value="fresh">Fresh</option>
                                <option value="citrus">Citrus</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Intensity</label>
                            <select class="form-select shadow-sm">
                                <option value="">Select intensity</option>
                                <option value="light">Light</option>
                                <option value="moderate">Moderate</option>
                                <option value="long-lasting">Long Lasting</option>
                                <option value="intense">Intense</option>
                                <option value="beast-mode">Beast Mode</option>
                            </select>
                        </div>
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Top Notes</label>
                            <input type="text" class="form-control shadow-sm" placeholder="e.g. Lemon, Bergamot">
                        </div>
                         <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Heart Notes</label>
                            <input type="text" class="form-control shadow-sm" placeholder="e.g. Rose, Jasmine">
                        </div>
                         <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Base Notes</label>
                            <input type="text" class="form-control shadow-sm" placeholder="e.g. Oud, Amber">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="col-12 d-flex justify-content-end gap-2 border-top pt-3">
            <button type="button" class="btn btn-white border shadow-sm text-secondary">Discard</button>
            <button type="submit" class="btn btn-success shadow-sm">Save</button>
        </div>
    </form>
</div>
<style>
    .group-hover-visible { visibility: hidden; }
    .group-hover-container:hover .group-hover-visible { visibility: visible; opacity: 1 !important; }
    .extra-small { font-size: 0.75rem; }
    .hover-bg-light:hover { background-color: var(--bs-light) !important; }
    .cursor-pointer { cursor: pointer; }
</style>@endsection
