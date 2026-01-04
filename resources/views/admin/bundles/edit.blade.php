@extends('layouts.admin')

@section('title', 'Edit Bundle')

@section('content')
<div class="container pb-5" style="max-width: 900px;">
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.bundles') }}" class="text-secondary hover-text-dark">
            <i class="fas fa-arrow-left"></i>
        </a>
        <h1 class="h3 mb-0 text-dark">Edit bundle</h1>
    </div>

    <form action="{{ route('admin.bundles.update', $bundle->id) }}" method="POST">
        @csrf
        @method('PUT')
        
         <div class="row g-4">
            <!-- Left Column -->
            <div class="col-12 col-lg-8">
                <!-- Title -->
                 <div class="card border shadow-sm p-3 mb-4">
                     <div class="vstack gap-3">
                        <div>
                            <label class="form-label fw-medium text-secondary small">Title</label>
                            <input type="text" name="title" value="{{ $bundle->title }}" class="form-control" placeholder="e.g. Summer Essentials Bundle" required>
                        </div>
                         <div>
                            <label class="form-label fw-medium text-secondary small">Description</label>
                            <textarea name="description" rows="4" class="form-control">{{ $bundle->description }}</textarea>
                        </div>
                     </div>
                </div>

                <!-- Products -->
                <div class="card border shadow-sm p-3 mb-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Products</h2>
                    <div class="vstack gap-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                            <input type="text" id="product_search" class="form-control border-start-0 shadow-none" placeholder="Search products..." list="product_list">
                            <datalist id="product_list">
                                @foreach($products as $product)
                                    <option value="{{ $product->title }}" data-id="{{ $product->id }}" data-price="{{ $product->variants->min('price') ?? 0 }}" data-image="{{ $product->images->first()?->path }}">
                                @endforeach
                            </datalist>
                        </div>
                        
                        <div id="selected_products_container" class="border rounded {{ $bundle->products->isEmpty() ? 'd-none' : '' }}">
                            @foreach($bundle->products as $product)
                            <div class="p-3 d-flex align-items-center gap-3 border-bottom last-border-none">
                                <div class="d-flex align-items-center justify-content-center bg-light border rounded overflow-hidden" style="width: 40px; height: 40px;">
                                    @if($product->images->first())
                                        <img src="{{ Storage::url($product->images->first()->path) }}" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <i class="fas fa-image text-secondary opacity-50"></i>
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <span class="d-block small fw-medium text-dark">{{ $product->title }}</span>
                                    <p class="mb-0 small text-muted">Starts at ₹ {{ $product->variants->min('price') ?? 0 }}</p>
                                </div>
                                <button type="button" onclick="removeProduct(this, '{{ $product->id }}')" class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-times"></i></button>
                            </div>
                            @endforeach
                        </div>
                        
                        <div id="hidden_inputs">
                             @foreach($bundle->products as $product)
                                <input type="hidden" name="products[]" value="{{ $product->id }}" id="input_product_{{ $product->id }}">
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-12 col-lg-4">
                 <!-- Status -->
                <div class="card border shadow-sm p-3 mb-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Status</h2>
                    <select name="status" class="form-select">
                        <option value="active" {{ $bundle->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="draft" {{ $bundle->status == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                 <div class="card border shadow-sm p-3 mb-4">
                     <h2 class="h6 fw-bold text-secondary mb-3">Bundle Discount</h2>
                     <div class="vstack gap-3">
                         <div>
                            <label class="form-label fw-medium text-secondary small">Discount type</label>
                             <select name="discount_type" class="form-select">
                                <option value="percentage" {{ $bundle->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                <option value="fixed" {{ $bundle->discount_type == 'fixed' ? 'selected' : '' }}>Fixed price</option>
                            </select>
                         </div>
                         <div>
                            <label class="form-label fw-medium text-secondary small">Discount value</label>
                            <input type="number" name="discount_value" value="{{ $bundle->discount_value }}" class="form-control" placeholder="10" step="0.01" min="0">
                         </div>
                     </div>
                </div>

                <!-- Summary -->
                 <div class="card border shadow-sm p-3 mb-4">
                    <h2 class="h6 fw-bold text-secondary mb-3">Summary</h2>
                    <ul class="list-unstyled small text-muted mb-0">
                        <li><i class="fas fa-circle text-secondary me-2" style="font-size: 4px; vertical-align: middle;"></i><span id="summary_count">{{ $bundle->products->count() }}</span> products</li>
                        <li class="fw-bold text-dark pt-2">Final Price: <span id="summary_total">Calculated at checkout</span></li>
                    </ul>
                </div>
            </div>
         </div>
        
        <div class="d-flex justify-content-end gap-3 pt-4 border-top mt-4">
             <button type="button" onclick="confirmDelete()" class="btn btn-white border-danger text-danger hover-bg-danger-soft">Delete bundle</button>
            <button type="submit" class="btn btn-success shadow-sm">Update bundle</button>
        </div>

    </form>
    
    <form id="delete-form" action="{{ route('admin.bundles.destroy', $bundle->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this bundle?')) {
                document.getElementById('delete-form').submit();
            }
        }

        document.getElementById('product_search').addEventListener('input', function(e) {
            const val = e.target.value;
            const options = document.getElementById('product_list').options;
            let found = false;
            let id = '';
            let price = '';
            let image = '';
            
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === val) {
                    found = true;
                    id = options[i].getAttribute('data-id');
                    price = options[i].getAttribute('data-price');
                    image = options[i].getAttribute('data-image');
                    break;
                }
            }

            if (found) {
                addProduct(id, val, price, image);
                e.target.value = '';
            }
        });

        function addProduct(id, title, price, imagePath) {
            // Check duplications
            if (document.querySelector(`input[name="products[]"][value="${id}"]`)) return;

            const container = document.getElementById('selected_products_container');
            const hiddenInputs = document.getElementById('hidden_inputs');
            
            container.classList.remove('d-none');
            
            // Add UI
            const div = document.createElement('div');
            div.className = 'p-3 d-flex align-items-center gap-3 border-bottom last-border-none';
            div.innerHTML = `
                <div class="d-flex align-items-center justify-content-center bg-light border rounded overflow-hidden" style="width: 40px; height: 40px;">
                    ${imagePath ? `<img src="/storage/${imagePath}" class="w-100 h-100 object-fit-cover">` : `<i class="fas fa-image text-secondary opacity-50"></i>`}
                </div>
                <div class="flex-grow-1">
                    <span class="d-block small fw-medium text-dark">${title}</span>
                    <p class="mb-0 small text-muted">Starts at ₹ ${price}</p>
                </div>
                <button type="button" onclick="removeProduct(this, '${id}')" class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-times"></i></button>
            `;
            container.appendChild(div);

            // Add Input
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'products[]';
            input.value = id;
            input.id = `input_product_${id}`;
            hiddenInputs.appendChild(input);
            
            updateSummary();
        }

        function removeProduct(btn, id) {
            btn.closest('div').remove();
            document.getElementById(`input_product_${id}`).remove();
             const container = document.getElementById('selected_products_container');
             if (container.children.length === 0) container.classList.add('d-none');
             updateSummary();
        }

        function updateSummary() {
            const count = document.getElementById('hidden_inputs').children.length;
            document.getElementById('summary_count').innerText = count;
        }
    </script>
</div>
<style>
    .hover-text-dark:hover { color: #343a40 !important; }
    .hover-text-danger:hover { color: var(--bs-danger) !important; }
    .hover-bg-danger-soft:hover { background-color: #fef2f2 !important; }
</style>
@endsection
