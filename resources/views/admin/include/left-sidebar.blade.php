<ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item">
        <a href="{{ route('dashboard') }}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-mail"></i>
            <div data-i18n="Dashboards">Dashboard</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="Users">User Management</div>
            <div class="badge bg-label-primary rounded-pill ms-auto">3</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.user-roles') }}" class="menu-link">
                    <div data-i18n="create user">Roles</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('dashboard.showUser') }}" class="menu-link">
                    <div data-i18n="show user">show user</div>
                </a>
            </li>
        </ul>
    </li>

    <!-- Role menu -->

    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="role menu">role menu</div>

        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.create') }}" class="menu-link">
                    <div data-i18n="create role">create role</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('dashboard.view') }}" class="menu-link">
                    <div data-i18n="view role">view role</div>
                </a>
            </li>
        </ul>
    </li>

{{--    user role--}}

    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="user role">user role</div>

        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.roll_assign') }}" class="menu-link">
                    <div data-i18n="roll_assign"> roll_assign</div>
                </a>
            </li>
        </ul>
    </li>

{{--    Permission menu--}}

    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="permission">permission</div>

        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.permission.create') }}" class="menu-link">
                    <div data-i18n="create permission">create permission</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('dashboard.permission.view') }}" class="menu-link">
                    <div data-i18n="view permission">view permission</div>
                </a>
            </li>
        </ul>
    </li>


{{--    permit--}}
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons ti ti-smart-home"></i>
            <div data-i18n="permit">permit</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('dashboard.permit.create') }}" class="menu-link">
                    <div data-i18n="create permit">create permit</div>
                </a>
            </li>
        </ul>
    </li>



</ul>
