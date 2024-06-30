<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('edit_hal_depan') ? 'active' : 'collapsed' }}" href="{{ route('edit_hal_depan') }}">
                <i class="bi bi-pen"></i>
                <span>Edit Halaman Depan</span>
            </a>
        </li><!-- End Dashboard Nav -->

    </ul>
</aside><!-- End Sidebar-->
