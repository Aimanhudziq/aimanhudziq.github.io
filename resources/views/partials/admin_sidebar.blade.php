<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('admin_dashboard') }}"><i class="menu-icon ti ti-layout "></i>Dashboard </a>
                </li>
                <li>
                    <a href="User_New.html"><i class="menu-icon ti ti-user "></i>{{ trans('sidebar.user') }}</a>
                </li>
                <li>
                    <a href="User_Log.html"><i class="menu-icon ti ti-shield"></i>{{ trans('sidebar.policy') }} </a>
                </li>
                <li>
                    <a href="User_Search.html"><i class="menu-icon ti ti-credit-card"></i>{{ trans('sidebar.bank') }} </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>