<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <!-- Normal user dashboard-->
                @if(@Auth::user()->frole_id == 3)
                <li class="{{ Route::currentRouteNamed('about') ? 'active' : '' }}">
                    <a href="{{ url('user_dashboard') }}"><i class="menu-icon ti ti-layout "></i>Dashboard </a>
                </li>
                <li class="@yield('user_new_task')">
                    <a href="{{ url('user_new_task') }}"><i class="menu-icon ti ti-plus"></i>{{ trans('sidebar.new') }} </a>
                </li>
                <li>
                    <a href="{{ url('user_track_log') }}"><i class="menu-icon ti ti-folder"></i>{{ trans('sidebar.log') }} </a>
                </li>
                <li>
                    <a href="{{ url('user_search') }}"><i class="menu-icon ti ti-search"></i>{{ trans('sidebar.search') }} </a>
                </li>
                @endif

                <!-- Reviewer dashboard-->
                @if(@Auth::user()->frole_id == 2)
                <li class="active">
                    <a href="{{ url('user_dashboard') }}"><i class="menu-icon ti ti-layout "></i>Dashboard </a>
                </li>
                <li>
                    <a href="User_New.html"><i class="menu-icon ti ti-plus"></i>{{ trans('sidebar.kiv') }} </a>
                </li>
                <li>
                    <a href="{{ url('user_track_log') }}"><i class="menu-icon ti ti-folder"></i>{{ trans('sidebar.log') }} </a>
                </li>
                <li>
                    <a href="{{ url('user_search') }}"><i class="menu-icon ti ti-search"></i>{{ trans('sidebar.search') }} </a>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>