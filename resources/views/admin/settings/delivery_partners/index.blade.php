@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Delivery Partners</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
                        <i class="fas fa-plus"></i> Add Partner
                    </button>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Site URL</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($partners as $partner)
                                <tr>
                                    <td>{{ $partner->id }}</td>
                                    <td>{{ $partner->name }}</td>
                                    <td>
                                        @if($partner->site_url)
                                            <a href="{{ $partner->site_url }}" target="_blank">{{ $partner->site_url }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $partner->status ? 'success' : 'danger' }}">
                                            {{ $partner->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="editPartner({{ $partner }})">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.settings.delivery-partners.destroy', $partner->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No delivery partners found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                    <button type="submit" class="btn btn-primary">Save</button>
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
                    <button type="submit" class="btn btn-primary">Update</button>
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
