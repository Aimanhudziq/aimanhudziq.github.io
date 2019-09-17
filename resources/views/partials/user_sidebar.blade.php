<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('user_dashboard') }}"><i class="menu-icon ti ti-layout "></i>Dashboard </a>
                </li>
                <li>
                    <a href="User_New.html"><i class="menu-icon ti ti-plus"></i>{{ trans('sidebar.new') }} </a>
                </li>
                <li>
                    <a href="User_Log.html"><i class="menu-icon ti ti-folder"></i>{{ trans('sidebar.log') }} </a>
                </li>
                <li>
                    <a href="User_Search.html"><i class="menu-icon ti ti-search"></i>{{ trans('sidebar.search') }} </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>