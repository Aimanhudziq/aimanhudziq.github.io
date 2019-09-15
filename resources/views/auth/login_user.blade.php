<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ASCC Login</title>
    <meta name="description" content="ASCC, Pica image">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
ç
<body class="bg-white">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
            <div class="form-group text-center">
            <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?'; ?>
                {{ trans('login.select_language') }}: 
                <a href="{{ url(url()->current() . $mark . 'lang=my') }}">my</a> |
                <a href="{{ url(url()->current() . $mark . 'lang=en') }}">
                eng</a> 
                <hr>
            </div>
                <div class="login-logo">
                    <a href="index.html">
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

                @if(Session::has('errMsg'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i> {{ Session::get('errMsg') }}
                    </div>
                @endif
                    <form method="GET" action="{{ url('login') }}">
                       {{ csrf_field() }}
                        <div class="form-group">
                            <label>{{ trans('login.username') }}</label>
                            <input type="text" class="form-control {{ $errors->has('username') ? 'has-error' : '' }}" name="username" 
                            placeholder="{{ trans('login.placeholder_username') }}" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                            <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ trans('login.password') }}</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" name="password" 
                            placeholder="{{ trans('login.placeholder_password') }}" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong style='color: #a94442'>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                         <button type="submit" class="btn btn-info btn-flat m-b-30 m-t-30 btn-md" >Login</button>
                        
                        <div class="register-link m-t-15 text-center">
                             <a href="{{ url('/') }}">{{ trans('login.forgot_password') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
