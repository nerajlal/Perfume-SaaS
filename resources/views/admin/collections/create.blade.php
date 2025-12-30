@extends('layouts.admin')

@section('title', 'Create Collection')

@section('content')
<div class="container pb-5">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.collections') }}" class="text-secondary hover-text-dark">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="h3 mb-0 text-dark">Create collection</h1>
    </div>

    <form action="#" method="POST" class="row g-4">
        <!-- Left Column -->
        <div class="col-12 col-lg-8">
            <div class="vstack gap-4">
            
                <!-- Basic Info -->
                <div class="card border shadow-sm p-4">
                    <div class="vstack gap-3">
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Title</label>
                            <input type="text" class="form-control" placeholder="e.g. Summer Collection">
                        </div>
                        <div>
                            <label class="form-label fw-medium text-secondary small mb-1">Description</label>
                            <textarea rows="6" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                
                
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-12 col-lg-4">
            <div class="vstack gap-4">
                <!-- Collection Image -->
                <div class="card border shadow-sm p-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Collection Image</h2>
                    <div class="border-2 border-dashed border-secondary border-opacity-25 rounded p-4 text-center hover-bg-light transition-colors cursor-pointer" onclick="document.getElementById('collection_image').click()">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-image text-secondary opacity-50 display-6 mb-2"></i>
                            <span class="text-secondary fw-medium small mb-1">Add image</span>
                            <p class="small text-muted mb-0">1200 x 1200px recommended</p>
                        </div>
                        <input type="file" id="collection_image" class="d-none" accept="image/*">
                    </div>
                </div>                
            </div>
        </div>
        
        <div class="col-12 d-flex justify-content-end gap-3 mt-4 pt-4 border-top">
            <button type="button" class="btn btn-white border shadow-sm text-secondary fw-medium hover-bg-light">Discard</button>
            <button type="submit" class="btn btn-success shadow-sm fw-medium">Save</button>
        </div>
    </form>
</div>
<style>
    .hover-text-dark:hover { color: #343a40 !important; }
    .border-dashed { border-style: dashed !important; }
    .hover-bg-light:hover { background-color: var(--bs-light) !important; }
    .cursor-pointer { cursor: pointer; }
</style>
@endsection
