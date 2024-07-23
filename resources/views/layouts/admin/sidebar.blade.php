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
        <!-- Dashboards Section -->
        <li class="menu-item {{ request()->routeIs('_admins.home') ? 'active open' : '' }}">
            <a href="{{ route('_admins.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Apps & Pages Header -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li>

        <!-- Projects Menu Item -->
        <li class="menu-item {{ request()->routeIs('_admins.projects.*') ? 'active open' : '' }}">
            <a href="{{ route('_admins.projects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                <div data-i18n="Project">Projects</div>
            </a>
        </li>

        <!-- Tasks Menu Item -->
        <li class="menu-item {{ request()->routeIs('_admins.tasks.*') ? 'active open' : '' }}">
            <a href="{{ route('_admins.tasks.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Task">Tasks</div>
            </a>
        </li>

        <!-- Notifications Menu Item -->
        <li class="menu-item {{ request()->routeIs('_admins.notifications.*') ? 'active open' : '' }}">
            <a href="{{ route('_admins.notifications.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bell"></i>
                <div data-i18n="Notification">Notifications</div>
            </a>
        </li>

        <!-- Comments Menu Item -->
        <li class="menu-item {{ request()->routeIs('_admins.comments.*') ? 'active open' : '' }}">
            <a href="{{ route('_admins.comments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-comment"></i>
                <div data-i18n="Comment">Comments</div>
            </a>
        </li>

        <!-- Attachments Menu Item -->
        <li class="menu-item {{ request()->routeIs('_admins.attachments.*') ? 'active open' : '' }}">
            <a href="{{ route('_admins.attachments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-paperclip"></i>
                <div data-i18n="Attachment">Attachments</div>
            </a>
        </li>

        <!-- Teams Menu Item -->
        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Team">Teams</div>
            </a>
        </li>

        <!-- Account Header -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Account</span>
        </li>

        <!-- Account Settings Menu Item -->
        <li class="menu-item {{ request()->routeIs('_admins.user.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
            </a>
            <ul class="menu-sub {{ request()->routeIs('_admins.user.*') ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('_admins.user.index') ? 'active' : '' }}">
                    <a href="{{ route('_admins.user.index') }}" class="menu-link">
                        <div data-i18n="Account">Account</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('_admins.profile.my_profile') ? 'active' : '' }}">
                    <a href="{{ route('_admins.profile.my_profile') }}" class="menu-link">
                        <div data-i18n="My Profile">My Profile</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('_admins.profile.edit_profile') ? 'active' : '' }}">
                    <a href="{{ route('_admins.profile.edit_profile') }}" class="menu-link">
                        <div data-i18n="Edit Profile">Edit Profile</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('_admins.profile.change_password') ? 'active' : '' }}">
                    <a href="{{ route('_admins.profile.change_password') }}" class="menu-link">
                        <div data-i18n="Change Password">Change Password</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
