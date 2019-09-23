<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::currentRouteNamed('admin-dashboard') ? 'active': '' }}">
                    <a href="{{ url('admin_dashboard') }}"><i class="menu-icon ti ti-layout ">
                    </i>Dashboard </a>
                </li>
                <li class="{{ Route::currentRouteNamed('admin-user-list') ? 'active': '' }}">
                    <a href="{{ url('admin_user_list') }}"><i class="menu-icon ti ti-user ">
                    </i>{{ trans('sidebar.user') }}</a>
                </li>
                <li class="{{ Route::currentRouteNamed('admin-policy') ? 'active': '' }}">
                    <a href="admin-bank-list.html"><i class="menu-icon ti ti-shield">
                    </i>{{ trans('sidebar.policy') }} </a>
                </li>
                <li class="{{ Route::currentRouteNamed('admin-bank-list') ? 'active': '' }}">
                    <a href="User_Search.html"><i class="menu-icon ti ti-credit-card">
                    </i>{{ trans('sidebar.bank') }} </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>