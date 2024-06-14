<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.home') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        <li
            class="nav-item {{ Request::is('admin/permissions*') || Request::is('admin/roles*') || Request::is('admin/users*') || Request::is('admin/audit_logs*') ? 'menu-open' : '' }}">
            <a
                class="nav-link
                {{ Request::is('admin/permissions*') || Request::is('admin/roles*') || Request::is('admin/users*') || Request::is('admin/audit_logs*') ? 'active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>
                    User Management
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="nav-link {{ Request::is('admin/permissions*') ? 'active' : '' }}">
                        <span class="dot mr-1 bg-dark"></span>
                        <p>Permissions</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}"
                        class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                        <span class="dot mr-1 bg-dark"></span>
                        <p>Roles</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                        <span class="dot mr-1 bg-dark"></span>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <a href="{{ route('admin.media.index') }}" class="nav-link {{ Request::is('admin/media') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Media
            </p>
        </a> --}}
        </li>
    </ul>
</nav>
