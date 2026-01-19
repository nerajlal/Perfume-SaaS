                @forelse($tenants as $tenant)
                <tr>
                    <td class="px-3 py-3 fw-semibold text-dark">#{{ $tenant->id }}</td>
                    <td class="px-3 py-3">
                        <span class="d-block fw-bold text-dark">{{ $tenant->name }}</span>
                    </td>
                    <td class="px-3 py-3">
                        <a href="http://{{ $tenant->domain }}" target="_blank" class="text-decoration-none small">
                            {{ $tenant->domain }} <i class="fas fa-external-link-alt ms-1 text-muted" style="font-size: 10px;"></i>
                        </a>
                    </td>
                    <td class="px-3 py-3">
                        @if($tenant->plan == 'pro')
                            <span class="badge bg-warning text-dark">Pro</span>
                        @elseif($tenant->plan == 'essential')
                            <span class="badge bg-primary">Essential</span>
                        @else
                            <span class="badge bg-secondary">Basic</span>
                        @endif
                    </td>
                    <td class="px-3 py-3 text-muted small">
                        {{ $tenant->subscription_ends_at ? $tenant->subscription_ends_at->format('M d, Y') : 'Lifetime' }}
                    </td>
                    <td class="px-3 py-3">
                        <div class="d-flex flex-column small">
                            <span class="fw-medium text-dark">{{ $tenant->admin->name ?? 'No Admin' }}</span>
                            <span class="text-muted">{{ $tenant->admin->email ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="px-3 py-3">
                        @if($tenant->status)
                            <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                        @else
                            <span class="badge bg-danger bg-opacity-10 text-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="px-3 py-3 text-end">
                        <form action="{{ route('super_admin.toggle_status', $tenant->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm {{ $tenant->status ? 'btn-outline-danger' : 'btn-outline-success' }}" title="Toggle Status">
                                <i class="fas {{ $tenant->status ? 'fa-ban' : 'fa-check' }}"></i>
                                {{ $tenant->status ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-5 text-muted">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-store-slash fs-1 mb-3 opacity-25"></i>
                            <p class="mb-0">No stores found.</p>
                            <a href="{{ route('super_admin.create_tenant') }}" class="btn btn-link btn-sm text-decoration-none mt-2">Create your first store</a>
                        </div>
                    </td>
                </tr>
                @endforelse
