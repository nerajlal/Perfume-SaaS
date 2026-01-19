<aside id="adminSidebar" class="sidebar d-none d-md-flex flex-column bg-white border-end h-100">
    <div class="p-3 d-flex align-items-center justify-content-between border-bottom" style="height: 64px;">
        <div class="d-flex align-items-center gap-2">
            <div class="d-flex align-items-center justify-content-center rounded bg-dark text-white fw-bold" style="width: 32px; height: 32px; font-size: 14px;">SA</div>
            <span class="fw-semibold text-secondary">Super Admin</span>
        </div>
    </div>

    <nav class="flex-grow-1 overflow-auto py-2">
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a href="{{ route('super_admin.dashboard') }}" class="nav-link {{ request()->routeIs('super_admin.dashboard') ? 'active bg-primary text-white' : 'text-dark' }} px-3 py-2 rounded">
                    <i class="fas fa-home me-2"></i> Overview
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('super_admin.tenants') }}" class="nav-link {{ request()->routeIs('super_admin.tenants') ? 'active bg-primary text-white' : 'text-dark' }} px-3 py-2 rounded">
                    <i class="fas fa-store me-2"></i> Stores
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark px-3 py-2 rounded">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
        </ul>
    </nav>
    
    <div class="p-3 border-top">
         <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</aside>
