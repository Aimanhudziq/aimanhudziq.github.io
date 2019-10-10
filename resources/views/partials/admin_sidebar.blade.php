<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Route::currentRouteNamed('admin-dashboard') ? 'active': '' }}">
                    <a href="{{ url('admin_dashboard') }}"><i class="menu-icon ti ti-layout ">
                    </i>Dashboard </a>
                </li>
                <!------------------------------------------------------------------------------------>
                <li class="menu-item-has-children dropdown {{ Route::currentRouteNamed('admin-user-list') || 
                    Route::currentRouteNamed('user-admin-list') ? 'active': '' }}">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"  aria-expanded="false"> <i class="menu-icon ti ti-user"></i>{{ trans('sidebar.user') }}</a>
                        <ul class="sub-menu children dropdown-menu nav nav-bar">
                            <li class="active treeview">
                                <a href="{{url('admin_user_list')}}"><i class="menu-icon">
                                </i>{{ trans('sidebar.normal_user') }} </a>
                            </li>

                            <li class="{{ Route::currentRouteNamed('admin-admin-list') ? 'active': '' }}">
                                <a href="{{url('admin_admin_list')}}"><i class="menu-icon">
                                </i>{{ trans('sidebar.admin_user') }} </a>
                            </li>
                        </ul>
                </li>
                <!------------------------------------------------------------------------------->
                
                <li class="{{ Route::currentRouteNamed('admin-policy-list') ? 'active': '' }}">
                    <a href="{{ url('admin_policy_list') }}"><i class="menu-icon ti ti-shield">
                    </i>{{ trans('sidebar.policy') }}</a>
                </li>

                <li class="{{ Route::currentRouteNamed('admin-user-bank-list') ? 'active': '' }}">
                    <a href="{{url('admin_user_bank_list')}}"><i class="menu-icon ti ti-credit-card">
                    </i>Bank</a>
                </li>

                <!--
                <li class="menu-item-has-children dropdown {{ Route::currentRouteNamed('admin-assign-bank') || 
                    Route::currentRouteNamed('admin-user-bank-list') ? 'active': '' }}">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"  aria-expanded="false"> <i class="menu-icon ti ti-credit-card"></i>Bank</a>
                        <ul class="sub-menu children dropdown-menu nav nav-bar">
                            <li class="{{ Route::currentRouteNamed('admin-user-bank-list') ? 'active': '' }}">
                                <a href="{{url('admin_user_bank_list')}}"><i class="menu-icon">
                                </i>{{ trans('sidebar.bank_details') }} </a>
                            </li>
                        </ul>
                </li>    
                -->    
                

                <li class="{{ Route::currentRouteNamed('register-client-details') ? 'active': '' }}">
                    <a href="{{ url('register/client_details') }}"><i class="menu-icon fa fa-users">
                    </i>Add Client Details</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>