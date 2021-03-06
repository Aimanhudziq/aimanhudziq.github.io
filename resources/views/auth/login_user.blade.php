<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ASCC Login</title>
    <meta name="description" content="ASCC, Pica image">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jasvin Liyun">

    <link rel="apple-touch-icon" href="{{ asset('images/icon_ascc.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style>
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
        .popover-title {
            text-align: center;
        }

        .custom-popover li {
            border: none!important;
            text-align: center;
        }

        .custom-popover li:nth-child(2) {
            border-top: 1px solid #ccc!important;
        }

        .custom-popover li:last-child {
            border-top: 1px solid #ccc!important;
        }    
        .popover{
            background-color:#b94a48;
            border:none;
            border-radius:unset;
            min-width:100px;
            width:100%;
            max-width:400px;
            overflow-wrap:break-word;
        }
        .has-error {
            border: 2px solid #e74c3c;
        }      
    </style>
<body class="bg-white">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
            <div class="form-group text-center">
            <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?'; ?>
                {{ trans('login.select_language') }}: 
                <a href="{{ url(url()->current() . $mark . 'lang=my') }}">my</a> |
                <a href="{{ url(url()->current() . $mark . 'lang=en') }}">
                en</a> 
                <hr>
            </div>
                <div class="login-logo">
                    <a href="">
                        <img class="align-content" src="images/logo_piCa.png" alt="Pica Logo">
                    </a>
                </div>
                <div class="login-form">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    @include('partials.session_msg')
                    <form method="GET" action="{{ url('login') }}">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <label>{{ trans('login.username') }}</label>
                            <input type="text" class="form-control {{($errors->has('username') ? 'has-error' : '' )}}" name="username" 
                                placeholder="{{ trans('login.placeholder_username') }}" value="{{ old('username') }}"
                                    title="{{ trans('login.username') }}" data-toggle="popover"
                                        data-content="{{ trans('login.popover_info_username') }}">
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label>{{ trans('login.password') }}</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" name="password" 
                                placeholder="{{ trans('login.placeholder_password') }}" value="{{ old('password') }}" id="password-field"
                                    title="{{ trans('login.password') }}" data-toggle="popover"
                                        >
                                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                         <button type="submit" class="btn btn-info btn-flat m-b-20 m-t-30" >Login</button>
                        <div class="register-link m-t-15 text-center">
                             <a class="reset_pass" href="{{ route('password-request') }}">{{ trans('login.forgot_password') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- loaded popover content -->
    <div id="popover-content" style="display: none">
        <ul class="list-group custom-popover">
            <li class="list-group-item">{{trans('login.popover_pwd_rule1')}}</li>
            <li class="list-group-item">{{trans('login.popover_pwd_rule2')}}</li>
            <li class="list-group-item">{{trans('login.popover_pwd_rule3')}}</li>
            <li class="list-group-item">{{trans('login.popover_pwd_rule4')}}</li>
            <li class="list-group-item">{{trans('login.popover_pwd_rule5')}}</li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script type='text/javascript'src="{{ asset('assets/js/jquery-1.9.1.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script type='text/javascript'src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- tooltip -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
    <script>
        //$("[data-toggle=popover]").popover();
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                html: true,
                container: 'body',
                content: function() {
                    return $('#popover-content').html();
                }
            });
        });

    </script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") 
            {
                input.attr("type", "text");
            } 
            else 
            {
                input.attr("type", "password");
            }
        });
    </script>

</html>
