<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ASCC| Password Reset</title>

        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{asset('css/nprogress.css')}}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{asset('css/custom.min.css')}}" rel="stylesheet">
    </head>

    <body class="bg-white">
        <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <a class="hiddenanchor" id="signup"></a>
            <a class="hiddenanchor" id="lostpassword"></a>

            <div class="form-group text-center">
                    <?php $mark = (preg_match('/\?/', url()->current())) ? '&' : '?'; ?>
                        {{ trans('passwords.select_language') }}: 
                        <a href="{{ url(url()->current() . $mark . 'lang=my') }}">my</a> |
                        <a href="{{ url(url()->current() . $mark . 'lang=en') }}">
                        eng</a> 
                        <hr>
            </div>

            <div class="login_wrapper">
                <div class="animate form login_form">
                    <section class="login_content">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                           <p style="display: flex; justify-content: center;"> 
                           <img class="align-content" src="images/logo_piCa.png" alt="Pica Logo" ></p>
                        </a>
                        <form role="form" method="POST" action="{{ route('password-request') }}">
                            <h3>Reset Password</h3>

                            {{ csrf_field() }}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                                <input type="text" class="form-control" id="email" name="email" placeholder="{{ trans('passwords.placeholder_email')}}" />
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                                <input type="password" class="form-control" id="password" name="password" placeholder="{{ trans('passwords.placeholder_password')}}"/>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                @endif
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ trans('passwords.placeholder_passwordConfirmation')}}"/>
                            </div>

                            <div>

                                <button type="submit" class="btn btn-default submit">Reset Password</button>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">

                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class=""></i>Modularsoft Sdn Bhd</h1>
                                    <p>©2019 All Rights Reserved.</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>