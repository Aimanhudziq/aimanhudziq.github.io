<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="images/modular_logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="user-area dropdown float-right">
                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i></a>

                <!-- language selection -->       
                <div class="user-area">
                    <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?'; ?>
                    <a href="{{ url(url()->current() . $mark . 'lang=my') }}">my</a> |
                    <a href="{{ url(url()->current() . $mark . 'lang=en') }}">eng</a>
                </div>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" data-toggle="modal" data-target="#myModal">Select Bank</a>
                    <a class="nav-link" href="Change_Password.html">Change Password</a>
                    <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>