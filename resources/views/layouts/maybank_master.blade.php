<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PICA Control</title>
    <meta name="description" content="ASCC, picture card">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <div class="container" id="app">  
  <div class="row"> 
    <div class="col-sm-12" style="background-color:#fc0;">
    <a href="#"><img src="images/maybank-logo-customer.png" style="background-color:#fc0;height:60px;"></a>
    </div>
    <div class="col-sm-12" style="background-color:#d9d9d9;margin-top:10px;">
    @yield('content')
    </div>
  </div>
  </div>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('js/app.js')}}"></script>
</div>
</body>
</html>
