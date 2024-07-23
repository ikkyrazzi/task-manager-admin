<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- SVG Logo Here -->
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Task Manager</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('_ketuas.home') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboard</div>
            </a>
        </li>

        <!-- Projects Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Projects</span>
        </li>
        <li class="menu-item {{ request()->routeIs('_ketuas.projects.index') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.projects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="Projects">Daftar Proyek yang dikelola</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('_ketuas.projects.create') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.projects.create') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-plus-circle"></i>
                <div data-i18n="Create Project">Tambah Proyek</div>
            </a>
        </li>

        <!-- Tasks Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tasks</span>
        </li>
        <li class="menu-item {{ request()->routeIs('_ketuas.tasks.index') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.tasks.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Tasks">Daftar Tugas yang dikelola</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('_ketuas.tasks.create') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.tasks.create') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-plus-circle"></i>
                <div data-i18n="Create Task">Tambah Tugas</div>
            </a>
        </li>

        <!-- Notifications Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Notifications</span>
        </li>
        <li class="menu-item {{ request()->routeIs('_ketuas.notifications.index') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.notifications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bell"></i>
                <div data-i18n="Notifications">Daftar Notifikasi terkait tugas</div>
            </a>
        </li>

        <!-- Comments Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Comments</span>
        </li>
        <li class="menu-item {{ request()->routeIs('_ketuas.comments.index') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.comments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-comment"></i>
                <div data-i18n="Comments">Daftar Komentar pada tugas yang dikelola</div>
            </a>
        </li>

        <!-- Attachments Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Attachments</span>
        </li>
        <li class="menu-item {{ request()->routeIs('_ketuas.attachments.index') ? 'active open' : '' }}">
            <a href="{{ route('_ketuas.attachments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-paperclip"></i>
                <div data-i18n="Attachments">Daftar Lampiran pada tugas yang dikelola</div>
            </a>
        </li>
    </ul>
</aside>
