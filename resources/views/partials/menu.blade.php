<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('test_repo_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw far fa-edit nav-icon">

                        </i>
                        {{ trans('cruds.testRepo.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('issue_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.issues.index") }}" class="nav-link {{ request()->is('admin/issues') || request()->is('admin/issues/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-paper-plane nav-icon">

                                    </i>
                                    {{ trans('cruds.issue.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('bugs_repo_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.bugs-repos.index") }}" class="nav-link {{ request()->is('admin/bugs-repos') || request()->is('admin/bugs-repos/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.bugsRepo.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('test_case_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.test-cases.index") }}" class="nav-link {{ request()->is('admin/test-cases') || request()->is('admin/test-cases/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-clipboard-list nav-icon">

                                    </i>
                                    {{ trans('cruds.testCase.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('time_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-clock nav-icon">

                        </i>
                        {{ trans('cruds.timeManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('time_work_type_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-work-types.index") }}" class="nav-link {{ request()->is('admin/time-work-types') || request()->is('admin/time-work-types/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-th nav-icon">

                                    </i>
                                    {{ trans('cruds.timeWorkType.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('time_project_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-projects.index") }}" class="nav-link {{ request()->is('admin/time-projects') || request()->is('admin/time-projects/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.timeProject.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('time_entry_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-entries.index") }}" class="nav-link {{ request()->is('admin/time-entries') || request()->is('admin/time-entries/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.timeEntry.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('time_report_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.time-reports.index") }}" class="nav-link {{ request()->is('admin/time-reports') || request()->is('admin/time-reports/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-chart-line nav-icon">

                                    </i>
                                    {{ trans('cruds.timeReport.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('client_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                                    <i class="fa-fw far fa-handshake nav-icon">

                                    </i>
                                    {{ trans('cruds.client.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('task_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-cogs nav-icon">

                                    </i>
                                    {{ trans('cruds.task.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>