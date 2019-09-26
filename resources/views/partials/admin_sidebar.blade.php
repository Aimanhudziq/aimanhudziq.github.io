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
                <li class="{{ Route::currentRouteNamed('admin-policy-list') ? 'active': '' }}">
                    <a href="{{ url('admin_policy_list') }}"><i class="menu-icon ti ti-shield">
                    </i>{{ trans('sidebar.policy') }}</a>
                </li>

                <li class="menu-item-has-children dropdown ">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"  aria-expanded="false"> <i class="menu-icon ti ti-credit-card"></i>Bank</a>
                        <ul class="sub-menu children dropdown-menu ">
                            <li class="{{ Route::currentRouteNamed('admin-assign-bank') ? 'active': '' }}">
                                <a href="{{url('admin_assign_bank')}}"><i class="menu-icon">
                                </i>{{ trans('sidebar.bank_assign') }} </a>
                            </li>

                            <li class="{{ Route::currentRouteNamed('admin-bank-list') ? 'active': '' }}">
                                <a href="User_Search.html"><i class="menu-icon">
                                </i>{{ trans('sidebar.bank_details') }} </a>
                            </li>
                        </ul>
                </li>               
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>