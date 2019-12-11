<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <!-- Normal user dashboard-->
                @if(@Auth::user()->frole_code == 3)
                <li class="{{ Route::currentRouteNamed('user-dashboard') ? 'active' : '' }}">
                    <a href="{{ url('user_dashboard') }}"><i class="menu-icon ti ti-layout ">
                    </i>Dashboard </a>
                </li>
                <li class="{{ Route::currentRouteNamed('user-list-bank') ? 'active' : '' }}">
                    <a href="{{ url('user_list_bank') }}"><i class="menu-icon ti ti-credit-card">
                    </i>{{trans('sidebar.bank_select')}}</a>
                </li>
                <li class="{{ Route::currentRouteNamed('user-track-log') ? 'active' : '' }}">
                    <a href="{{ url('user_track_log') }}"><i class="menu-icon ti ti-folder">
                    </i>{{ trans('sidebar.log') }} </a>
                </li>
                <li class="{{ Route::currentRouteNamed('user-search') ? 'active' : '' }}">
                    <a href="{{ url('user_search') }}"><i class="menu-icon ti ti-search">
                    </i>{{ trans('sidebar.search') }} </a>
                </li>
                <li class="{{ Route::currentRouteNamed('user-report') ? 'active' : '' }}">
                    <a href="{{ url('report/user_report') }}"><i class="menu-icon ti ti-pencil">
                    </i>Report</a>
                </li>
            
                <!-- <li class="{{ Route::currentRouteNamed('user-excel-report') ? 'active' : '' }}">
                    <a href="{{ url('user_excel_report') }}"><i class="menu-icon ti ti-search">
                    </i>Download Client Report(Excel)</a>
                </li>
                <li class="{{ Route::currentRouteNamed('html-pdf') ? 'active' : '' }}">
                    <a href="{{ url('/htmlPDF/pdf') }}"><i class="menu-icon ti ti-search">
                    </i>Download Client Report(Pdf)</a>
                </li> -->
                @endif

                <!-- Reviewer dashboard-->
                @if(@Auth::user()->frole_code == 2)
                <li class="{{ Route::currentRouteNamed('user-dashboard') ? 'active': '' }}">
                    <a href="{{ url('user_dashboard') }}">
                    <i class="menu-icon ti ti-layout "></i>Dashboard </a>
                </li>
                <li class="{{ Route::currentRouteNamed('reviewer-list-bank') ? 'active': '' }}">
                    <a href="{{ URL::route('reviewer-list-bank') }}"><i class="menu-icon ti ti-credit-card">
                    </i>{{trans('sidebar.bank_select')}}</a>
                </li>
                <li class="{{ Route::currentRouteNamed('user-track-log') ? 'active': '' }}">
                    <a href="{{ url('user_track_log') }}"><i class="menu-icon ti ti-folder">
                    </i>{{ trans('sidebar.log') }} </a>
                </li>
                <li class="{{ Route::currentRouteNamed('user-search') ? 'active': '' }}">
                    <a href="{{ url('user_search') }}">
                    <i class="menu-icon ti ti-search"></i>{{ trans('sidebar.search') }} </a>
                </li>
                <li class="{{ Route::currentRouteNamed('user-report') ? 'active' : '' }}">
                    <a href="{{ url('report/user_report') }}"><i class="menu-icon ti ti-pencil">
                    </i>Report</a>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>