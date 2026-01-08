<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                {{-- <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="101" width="132" /> --}}
            </span>
            <span class="logo-lg">
                {{-- <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="101" width="132" /> --}}
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                {{-- <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="101" width="132" /> --}}
            </span>
            <span class="logo-lg">
                {{-- <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="101" width="132" />\ --}}
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>


                @canany(['users.view', 'roles.view'])
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'active' : 'collapsed' }}" href="#sidebarLayouts1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts1">
                            <i class="ri-layout-3-line"></i>
                            <span data-key="t-layouts">User Management</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'show' : '' }} " id="sidebarLayouts1">
                            <ul class="nav nav-sm flex-column">
                                @can('users.view')
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" data-key="t-horizontal">Users</a>
                                    </li>
                                @endcan
                                @can('roles.view')
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}" data-key="t-horizontal">Roles</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcanany
                   <li class="nav-item">
                        {{-- <a class="nav-link menu-link {{ request()->routeIs('court.*') || request()->routeIs('lawyer.*') ? 'active' : 'collapsed' }}" href="#sidebarLayouts12"data-bs-toggle="collapse" role="button"
                        aria-expanded="{{ request()->routeIs('court.*') || request()->routeIs('lawyer.*') ? 'true' : 'false' }}" aria-controls="sidebarLayouts12">
                            <i class="ri-layout-3-line"></i>
                            <span data-key="t-layouts">Masters</span>
                        </a> --}}

                  <div class="collapse menu-dropdown {{ request()->routeIs('court.*') || request()->routeIs('lawyer.*') ? 'show' : '' }}" id="sidebarLayouts12">
                   <ul class="nav nav-sm flex-column">
                    {{-- <li class="nav-item">
                        <a href="{{ route('court.index') }}"
                        class="nav-link {{ request()->routeIs('court.*') ? 'active' : '' }}"
                        data-key="t-horizontal">Court</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('lawyer.index') }}"
                        class="nav-link {{ request()->routeIs('lawyer.*') ? 'active' : '' }}"
                        data-key="t-horizontal">Lawyer</a>
                    </li> --}}
                        </ul>
                    </div>
                </li>

                    <li class="nav-item">
                      <a class="nav-link menu-link {{ request()->routeIs('property.*')  ? 'active' : 'collapsed' }}" href="#sidebarLayouts123" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts1">
                            <i class="ri-bank-line"></i>
                            <span data-key="t-layouts">Property Management</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->routeIs('property.*')  ? 'show' : '' }} " id="sidebarLayouts123">
                            <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('property.index') }}" class="nav-link {{ request()->routeIs('property.*') ? 'active' : '' }}" data-key="t-horizontal">Property</a>
                                    </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link  {{ request()->routeIs('show-change-password') ? 'active' : 'collapsed' }}" href="{{ route('show-change-password') }}">
                            <i class="ri-lock-password-line"></i>
                            <span data-key="t-dashboards">Change Password</span>
                        </a>
                    </li>

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
