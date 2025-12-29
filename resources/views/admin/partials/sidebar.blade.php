<aside class="w-64 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col h-full hidden md:flex">
    <div class="p-4 flex items-center justify-between h-16 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-gray-900 text-white flex items-center justify-center rounded text-sm font-bold">N</div>
            <span class="font-semibold text-gray-700">Nurah Admin</span>
        </div>
        <button class="text-gray-400 hover:text-gray-600"><i class="fas fa-chevron-left text-xs"></i></button>
    </div>

    <nav class="flex-1 overflow-y-auto py-3">
        <ul class="space-y-0.5 px-2">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm transition-colors text-gray-600">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}" class="sidebar-item {{ request()->routeIs('admin.orders') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-box-open w-5 text-center"></i>
                    <span>Orders</span>
                    <span class="ml-auto bg-gray-100 text-xs px-1.5 py-0.5 rounded-full text-gray-500">2</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.collections') }}" class="sidebar-item {{ request()->routeIs('admin.collections*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-layer-group w-5 text-center"></i>
                    <span>Collections</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}" class="sidebar-item {{ request()->routeIs('admin.products*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-tag w-5 text-center"></i>
                    <span>Products</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.bundles') }}" class="sidebar-item {{ request()->routeIs('admin.bundles*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-cubes w-5 text-center"></i>
                    <span>Bundles</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.customers') }}" class="sidebar-item {{ request()->routeIs('admin.customers') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.analytics') }}" class="sidebar-item {{ request()->routeIs('admin.analytics') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-chart-bar w-5 text-center"></i>
                    <span>Analytics</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.discounts') }}" class="sidebar-item {{ request()->routeIs('admin.discounts*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-percent w-5 text-center"></i>
                    <span>Discounts</span>
                </a>
            </li>

            <li class="px-3 pt-4 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                Settings
            </li>
            <li>
                 <a href="{{ route('admin.settings.slider') }}" class="sidebar-item {{ request()->routeIs('admin.settings.slider') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-images w-5 text-center"></i>
                    <span>Hero Slider</span>
                </a>
            </li>
            <li>
                 <a href="{{ route('admin.settings.managers') }}" class="sidebar-item {{ request()->routeIs('admin.settings.managers*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 transition-colors">
                    <i class="fas fa-users-cog w-5 text-center"></i>
                    <span>Site Managers</span>
                </a>
            </li>
        </ul>

    </nav>

    <!-- <div class="p-4 border-t border-gray-200">
        <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm text-gray-600 hover:bg-gray-100 transition-colors">
            <i class="fas fa-cog w-5 text-center"></i>
            <span>Settings</span>
        </a>
    </div> -->
</aside>
