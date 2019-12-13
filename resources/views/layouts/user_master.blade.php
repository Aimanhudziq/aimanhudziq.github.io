<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PICA Control</title>
    <meta name="description" content="ASCC, picture card">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel=”stylesheet” href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
    <!-- Popup Start-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <!-- Popup End -->
</head>

<body>
<?php error_reporting(E_ALL ^ E_NOTICE); ?>
    <!-- bank modal for bank -->     
    <!-- side bar -->
    @include('partials.user_sidebar')
    <!-- /side bar -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Top bar-->
        @include('partials.user_topbar')

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('partials.footer')

    </div><!-- right panel -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script> <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script><!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="{{ asset('assets/js/init/weather-init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('assets/js/init/fullcalendar-init.js') }}"></script>
    <script src="{{ asset('assets/js/dashboardjs/dashboard_chart.js') }}"></script> <!-- dashboard menu -->
    <script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/init/datatables-init.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script>

    $(document).ready(function () {
        $(":checkbox").click(function () {
            var checkbox = $("input:checked").length;
                if (checkbox > 0) {
                $("#approve").prop("disabled", true);
                }
                else {
                $("#approve").prop("disabled", false);
                }
            
        });
    });

    </script>  

    <script>
        //admin-bank-assign(pass multiple value)
        $(document).ready(function() {
                
            var policy_no=[];

            $("input[type=checkbox]").change(function(){

                var value = $(this).attr("value1");
                //alert(policy_no);
                
                if ($(this).is(':checked')) {
                    policy_no.push(value);
                    $('#txt_policy_no').val(policy_no);
                }
                else{
                    policy_no.pop(value);
                    $('#txt_policy_no').val(policy_no);
                }

            });
                    
        });    
    </script>

    <script type="text/javascript">
        var locale = '{{ config('app.locale') }}';
        //console.log({{trans('dashboard.reject')}});

        //*************** for display info to dashboard ******************* */
        var baru = "{{ $new }}";
        var kiv = "{{ $kiv }}";
        var reject = "{{ $reject }}";
        var approve = "{{ $approve }}";
        //**************** end dashboard ********************************* */
        //**************** approve by month ****************************** */
        var jan = "{{ $jan }}";
        var feb = "{{ $feb }}";
        var mac = "{{ $mac }}";
        var apr = "{{ $apr }}";
        var mei = "{{ $mei }}";
        var jun = "{{ $jun }}";
        var july = "{{ $july }}";
        var aug = "{{ $aug }}";
        var sept = "{{ $sept }}";
        var oct = "{{ $oct }}";
        var nov = "{{ $nov }}";
        var dec = "{{ $dec }}";
        //***************** reject by month **************************** */
        var jan_r = "{{ $jan_r }}";
        var feb_r = "{{ $feb_r }}";
        var mac_r = "{{ $mac_r }}";
        var apr_r = "{{ $apr_r }}";
        var mei_r = "{{ $mei_r }}";
        var jun_r = "{{ $jun_r }}";
        var july_r = "{{ $july_r }}";
        var aug_r = "{{ $aug_r }}";
        var sept_r = "{{ $sept_r }}";
        var oct_r = "{{ $oct_r }}";
        var nov_r = "{{ $nov_r }}";
        var dec_r = "{{ $dec_r }}";
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
      } );
    </script>
    
    <script>

    function testDisplay(ref){
    var commentInfo=<?php echo json_encode($allInfo);?>;
    commentInfo.forEach(function(item){
        if(ref==item.freference_no){
   
        document.getElementById("commentPolicy").innerHTML=item.comment;
        // tr.appendChild(comment);
   
        document.getElementById("violated_policy").innerHTML=item.violated_policy;
        }
    });
    }
    </script>
    

</body>
</html>
