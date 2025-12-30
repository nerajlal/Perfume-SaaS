@extends('layouts.admin')

@section('title', 'Attributes & Fragrance Notes')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-dark">Attributes & Fragrance Notes</h1>
            <p class="text-muted small mb-0">Manage olfactory families and scent notes for your perfumes.</p>
        </div>
    </div>

    <div class="row g-4">
        
        <!-- Families Column -->
        <div class="col-12 col-lg-6">
            <div class="card border shadow-sm h-100">
                <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h2 class="h5 fw-bold text-dark mb-0">Olfactory Families</h2>
                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill">5 Families</span>
                </div>
                
                <div class="card-body p-3">
                    <!-- Add Form -->
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Add new family (e.g. Woody)" class="form-control form-control-sm">
                        <button class="btn btn-dark btn-sm">Add</button>
                    </div>

                    <!-- List -->
                    <div class="vstack gap-2">
                        <div class="d-flex items-center justify-content-between p-2 bg-light border rounded group-hover-border transition-colors item-row">
                            <div class="d-flex items-center gap-3">
                                <span class="rounded-circle bg-purple-400" style="width: 8px; height: 8px;"></span>
                                <span class="small fw-medium text-dark item-text">Floral</span>
                            </div>
                            <div class="d-flex gap-2 opacity-0 group-hover-opacity transition-opacity text-nowrap item-actions">
                                <button onclick="enableEdit(this)" class="btn btn-link btn-sm p-0 text-secondary hover-text-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <div class="d-flex items-center justify-content-between p-2 bg-light border rounded group-hover-border transition-colors item-row">
                            <div class="d-flex items-center gap-3">
                                <span class="rounded-circle bg-amber-600" style="width: 8px; height: 8px;"></span>
                                <span class="small fw-medium text-dark item-text">Oriental (Amber)</span>
                            </div>
                            <div class="d-flex gap-2 opacity-0 group-hover-opacity transition-opacity text-nowrap item-actions">
                                <button onclick="enableEdit(this)" class="btn btn-link btn-sm p-0 text-secondary hover-text-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                         <div class="d-flex items-center justify-content-between p-2 bg-light border rounded group-hover-border transition-colors item-row">
                            <div class="d-flex items-center gap-3">
                                <span class="rounded-circle bg-green-700" style="width: 8px; height: 8px;"></span>
                                <span class="small fw-medium text-dark item-text">Woody</span>
                            </div>
                            <div class="d-flex gap-2 opacity-0 group-hover-opacity transition-opacity text-nowrap item-actions">
                                <button onclick="enableEdit(this)" class="btn btn-link btn-sm p-0 text-secondary hover-text-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <div class="d-flex items-center justify-content-between p-2 bg-light border rounded group-hover-border transition-colors item-row">
                            <div class="d-flex items-center gap-3">
                                <span class="rounded-circle bg-cyan-400" style="width: 8px; height: 8px;"></span>
                                <span class="small fw-medium text-dark item-text">Fresh / Aquatic</span>
                            </div>
                            <div class="d-flex gap-2 opacity-0 group-hover-opacity transition-opacity text-nowrap item-actions">
                                <button onclick="enableEdit(this)" class="btn btn-link btn-sm p-0 text-secondary hover-text-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                          <div class="d-flex items-center justify-content-between p-2 bg-light border rounded group-hover-border transition-colors item-row">
                            <div class="d-flex items-center gap-3">
                                <span class="rounded-circle bg-red-400" style="width: 8px; height: 8px;"></span>
                                <span class="small fw-medium text-dark item-text">Citrus</span>
                            </div>
                            <div class="d-flex gap-2 opacity-0 group-hover-opacity transition-opacity text-nowrap item-actions">
                                <button onclick="enableEdit(this)" class="btn btn-link btn-sm p-0 text-secondary hover-text-primary"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notes Column -->
        <div class="col-12 col-lg-6">
            <div class="card border shadow-sm h-100">
                 <div class="card-header bg-white border-bottom p-3 d-flex justify-content-between align-items-center">
                    <h2 class="h5 fw-bold text-dark mb-0">Perfume Notes</h2>
                    <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill">12 Notes</span>
                </div>

                <div class="card-body p-3">
                    <!-- Add Form -->
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Add new note (e.g. Saffron)" class="form-control form-control-sm">
                        <button class="btn btn-success btn-sm">Add</button>
                    </div>

                    <!-- List with Search -->
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                        <input type="text" placeholder="Search notes..." class="form-control border-start-0 shadow-none">
                    </div>

                    <div class="vstack gap-1 overflow-auto pe-2 custom-scrollbar" style="max-height: 400px;">
                        
                        @php
                        $notes = ['Rose', 'Oud', 'Saffron', 'Amber', 'Musk', 'Vanilla', 'Bergamot', 'Patchouli', 'Sandalwood', 'Jasmine', 'Leather', 'Black Pepper'];
                        @endphp

                        @foreach($notes as $note)
                        <div class="d-flex items-center justify-content-between px-3 py-2 hover-bg-light rounded transition-colors item-row">
                            <span class="small text-dark item-text">{{ $note }}</span>
                            <div class="d-flex gap-2 opacity-0 group-hover-opacity transition-opacity text-nowrap item-actions">
                                 <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash small"></i></button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .bg-purple-400 { background-color: #c084fc !important; }
    .bg-amber-600 { background-color: #d97706 !important; }
    .bg-cyan-400 { background-color: #22d3ee !important; }
    .bg-red-400 { background-color: #f87171 !important; }
    .hover-text-primary:hover { color: var(--bs-primary) !important; }
    .hover-text-danger:hover { color: var(--bs-danger) !important; }
    .hover-text-success:hover { color: var(--bs-success) !important; }
    .group-hover-border:hover { border-color: #dee2e6 !important; }
    .item-row:hover .group-hover-opacity { opacity: 1 !important; }
    .hover-bg-light:hover { background-color: var(--bs-light) !important; }
</style>

<script>
    function enableEdit(btn) {
        const itemRow = btn.closest('.d-flex.items-center.justify-content-between'); // Updated selector
        const textSpan = itemRow.querySelector('.item-text'); // Updated class selector
        const currentText = textSpan.innerText;
        
        // Hide edit button, Show save button
        const actionDiv = btn.parentElement;
        actionDiv.innerHTML = `
            <button onclick="saveEdit(this)" class="btn btn-link btn-sm p-0 text-success hover-text-success"><i class="fas fa-check"></i></button>
            <button onclick="cancelEdit(this, '${currentText}')" class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-times"></i></button>
        `;
        
        // Replace text with input
        const input = document.createElement('input');
        input.type = 'text';
        input.value = currentText;
        input.className = 'form-control form-control-sm border-secondary'; // Bootstrap classes
        
        textSpan.style.display = 'none';
        textSpan.parentElement.insertBefore(input, textSpan.nextSibling);
        input.focus();
    }

    function saveEdit(btn) {
        const itemRow = btn.closest('.d-flex.items-center.justify-content-between');
        const input = itemRow.querySelector('input');
        const newText = input.value;
        const textSpan = itemRow.querySelector('.item-text');
        
        // Update text and show span
        textSpan.innerText = newText;
        textSpan.style.display = 'block';
        input.remove();
        
        // Restore buttons
        const actionDiv = btn.parentElement;
        actionDiv.innerHTML = `
            <button onclick="enableEdit(this)" class="btn btn-link btn-sm p-0 text-secondary hover-text-primary"><i class="fas fa-edit"></i></button>
            <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
        `;
    }

    function cancelEdit(btn, originalText) {
        const itemRow = btn.closest('.d-flex.items-center.justify-content-between');
        const input = itemRow.querySelector('input');
        const textSpan = itemRow.querySelector('.item-text');
        
        // Restore text and show span
        textSpan.style.display = 'block';
        input.remove();
        
        // Restore buttons
        const actionDiv = btn.parentElement;
        actionDiv.innerHTML = `
            <button onclick="enableEdit(this)" class="btn btn-link btn-sm p-0 text-secondary hover-text-primary"><i class="fas fa-edit"></i></button>
            <button class="btn btn-link btn-sm p-0 text-secondary hover-text-danger"><i class="fas fa-trash"></i></button>
        `;
    }
</script>
@endsection
