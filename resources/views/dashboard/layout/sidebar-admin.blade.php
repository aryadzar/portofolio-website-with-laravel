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
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('edit_ex') ? 'active' : 'collapsed' }}" href="{{ route('edit_ex') }}">
                <i class="bi bi-backpack2"></i>                <span>Edit Education Experience</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('edit_services') ? 'active' : 'collapsed' }}" href="{{ route('edit_services') }}">
                <i class="bi bi-menu-up"></i>              <span>Edit Services</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('edit_services') ? 'active' : 'collapsed' }}" href="{{ route('edit_services') }}">
                <i class="bi bi-chat-text"></i>          <span>Edit Testimonials</span>
            </a>
        </li><!-- End Dashboard Nav -->

    </ul>
</aside><!-- End Sidebar-->
