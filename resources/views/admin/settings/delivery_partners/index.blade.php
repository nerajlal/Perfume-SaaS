@extends('layouts.admin')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <h1 class="h3 fw-bold text-dark mb-0">Delivery Partners</h1>
    <button class="btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#addPartnerModal">Add Partner</button>
</div>

<div class="card border shadow-sm">
    <div class="card-header bg-light border-bottom p-3">
        <div class="d-flex gap-3">
            <div class="flex-grow-1">
                 <div class="input-group shadow-sm">
                     <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                     <input type="text" id="searchInput" class="form-control border-start-0 ps-0 shadow-none" placeholder="Search delivery partners...">
                 </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted small text-uppercase">
                <tr>
                    <th class="px-3 py-3 w-auto">ID</th>
                    <th class="px-3 py-3 border-0 fw-medium">Name</th>
                    <th class="px-3 py-3 border-0 fw-medium">Tracking URL</th>
                    <th class="px-3 py-3 border-0 fw-medium">Status</th>
                    <th class="px-3 py-3 text-end" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody id="partnersTableBody">
                @forelse($partners as $partner)
                <tr>
                    <td class="px-3 py-3 text-muted">#{{ $partner->id }}</td>
                    <td class="px-3 py-3 fw-medium text-dark">{{ $partner->name }}</td>
                    <td class="px-3 py-3">
                        @if($partner->tracking_url_template)
                            <a href="{{ $partner->tracking_url_template }}" target="_blank" class="text-decoration-none text-success small">
                                <i class="fas fa-external-link-alt me-1"></i> {{ Str::limit($partner->tracking_url_template, 40) }}
                            </a>
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td class="px-3 py-3">
                        <span class="badge {{ $partner->status ? 'bg-success text-success' : 'bg-secondary text-secondary' }} bg-opacity-10 rounded-pill px-2 py-1 small">
                            {{ $partner->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-3 py-3 text-end">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-white border shadow-sm" onclick="editPartner({{ $partner }})">
                                <i class="fas fa-edit text-secondary"></i>
                            </button>
                            <form action="{{ route('admin.settings.delivery-partners.destroy', $partner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-white border shadow-sm ms-1"><i class="fas fa-trash text-danger"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <i class="fas fa-box-open fs-3 mb-3 text-secondary opacity-50"></i>
                        <p class="mb-0">No delivery partners found.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.settings.delivery-partners.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Delivery Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Site URL</label>
                        <input type="url" name="site_url" class="form-control" placeholder="https://example.com">
                    </div>
                    <div class="mb-3">
                        <label>Tracking URL Template</label>
                        <input type="text" name="tracking_url_template" class="form-control" placeholder="https://example.com/track?id={tracking_number}">
                        <small class="text-muted">Use {tracking_number} as placeholder</small>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editPartnerModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Delivery Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Site URL</label>
                        <input type="url" name="site_url" id="edit_site_url" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Tracking URL Template</label>
                        <input type="text" name="tracking_url_template" id="edit_tracking_url_template" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" id="edit_status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function editPartner(partner) {
        document.getElementById('edit_name').value = partner.name;
        document.getElementById('edit_site_url').value = partner.site_url;
        document.getElementById('edit_tracking_url_template').value = partner.tracking_url_template;
        document.getElementById('edit_status').value = partner.status;
        
        document.getElementById('editForm').action = `/admin/settings/delivery-partners/${partner.id}`;
        
        new bootstrap.Modal(document.getElementById('editPartnerModal')).show();
    }
</script>
@endsection
