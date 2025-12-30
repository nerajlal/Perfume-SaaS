@extends('layouts.admin')

@section('title', 'Add New Slide')

@section('content')
<div class="container pb-5" style="max-width: 900px;">
    <!-- Header -->
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.settings.slider') }}" class="text-secondary hover-text-dark">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="h3 mb-0 text-dark">Add New Slide</h1>
    </div>

    <form>
        <div class="card border shadow-sm p-4 mb-4">
            <div class="row g-4">
                <!-- Desktop Image -->
                <div class="col-12 col-md-6">
                    <label class="form-label fw-bold text-secondary small mb-2">Desktop Image (1920x600 recommended)</label>
                    <div class="border-2 border-dashed border-secondary border-opacity-25 rounded p-4 d-flex flex-column align-items-center justify-content-center text-center hover-bg-light cursor-pointer transition-colors" onclick="document.getElementById('desktop_image').click()" style="height: 200px;">
                        <i class="fas fa-desktop text-secondary opacity-50 display-6 mb-3"></i>
                        <p class="small text-muted mb-0">Click to upload desktop image</p>
                        <input type="file" id="desktop_image" class="d-none" accept="image/*">
                    </div>
                </div>

                <!-- Mobile Image -->
                <div class="col-12 col-md-6">
                    <label class="form-label fw-bold text-secondary small mb-2">Mobile Image (800x1200 recommended)</label>
                    <div class="border-2 border-dashed border-secondary border-opacity-25 rounded p-4 d-flex flex-column align-items-center justify-content-center text-center hover-bg-light cursor-pointer transition-colors" onclick="document.getElementById('mobile_image').click()" style="height: 200px;">
                        <i class="fas fa-mobile-alt text-secondary opacity-50 display-6 mb-3"></i>
                        <p class="small text-muted mb-0">Click to upload mobile image</p>
                        <input type="file" id="mobile_image" class="d-none" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="vstack gap-3 mt-4">
                <div>
                    <label class="form-label fw-medium text-secondary small">Slide Title / Alt Text</label>
                    <input type="text" class="form-control" placeholder="e.g. Summer Sale Banner">
                </div>
                
                <div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" checked id="activeCheck">
                        <label class="form-check-label fw-medium text-dark small" for="activeCheck">
                            Active
                        </label>
                     </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end gap-3">
             <a href="{{ route('admin.settings.slider') }}" class="btn btn-white border text-secondary shadow-sm">Cancel</a>
            <button type="button" class="btn btn-success shadow-sm">Save Slide</button>
        </div>
    </form>
</div>
<style>
    .hover-text-dark:hover { color: #343a40 !important; }
    .border-dashed { border-style: dashed !important; }
    .hover-bg-light:hover { background-color: var(--bs-light) !important; }
    .display-6 { font-size: 2rem; }
    .cursor-pointer { cursor: pointer; }
</style>
@endsection
