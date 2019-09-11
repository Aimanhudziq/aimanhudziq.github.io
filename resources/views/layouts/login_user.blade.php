<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PICA Control</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Modular soft">

    <!-- The styles -->
    <link id="bs-css" href="{{ asset('css/bootstrap-cerulean.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/charisma-app.css') }} " rel="stylesheet">
    <link href='{{ asset("css/jquery.noty.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/noty_theme_default.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/elfinder.min.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/elfinder.theme.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/jquery.iphone.toggle.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/uploadify.css") }}' rel='stylesheet'>
    <link href='{{ asset("css/animate.min.css") }}' rel='stylesheet'>

    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<div class="ch-container" style="background-color: lightslategray; height: 1000px">
    <div class="row">

    <div class="row">
        <div class="col-md-12 center login-header">
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-5 center login-box">
                <a><img src="images/modular_logo.png" alt="Logo" width="500px" height="80px"></a>

            <div class="alert alert-info" style="margin-top: 20px">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="input-group input-group-md">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Username" >
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-md">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <a style="float: right" class="remember" for="remember">Forgot Password</a>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <a type="submit" class="btn btn-primary" href="">Login</a>
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- library for cookie management -->
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<!-- data table plugin -->
<script src='{{ asset("js/jquery.dataTables.min.js") }}'></script>
<!-- notification plugin -->
<script src="{{ asset('js/jquery.noty.js') }}"></script>
<!-- star rating plugin -->
<script src="{{ asset('js/jquery.raty.min.js') }}"></script>
<!-- for iOS style toggle switch -->
<script src="{{ asset('js/jquery.iphone.toggle.js') }}"></script>
<!-- autogrowing textarea plugin -->
<script src="{{ asset('js/jquery.autogrow-textarea.js') }}"></script>
<!-- multiple file upload plugin -->
<script src="{{ asset('js/jquery.uploadify-3.1.min.js') }}"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{ asset('js/jquery.history.js') }}"></script>
<!-- application script for Charisma demo -->
<script src="{{ asset('js/charisma.js') }}"></script>


</body>
</html>
