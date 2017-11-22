<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ asset('css/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{ asset('css/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- NProgress -->
    <link href="{{ asset('css/vendors/nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- iCheck -->
    <link href="{{ asset('css/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('css/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">

    <!-- JQVMap -->
    <link href="{{ asset('css/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>

    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('css/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('css/build/css/custom.min.css') }}" rel="stylesheet">

    @yield('style')
    @yield('script')
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            @include('layout.sidebar')

            @include('layout.navigation')

            <div class="right_col" role="main">
                @yield('content')
            </div>

            <footer>
                <div class="pull-right">
                    Copyright &copy by Cashier
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('css/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('css/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- FastClick -->
    <script src="{{ asset('css/vendors/fastclick/lib/fastclick.js') }}"></script>

    <!-- NProgress -->
    <script src="{{ asset('css/vendors/nprogress/nprogress.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('css/vendors/Chart.js/dist/Chart.min.js') }}"></script>

    <!-- gauge.js -->
    <script src="{{ asset('css/vendors/gauge.js/dist/gauge.min.js') }}"></script>

    <!-- bootstrap-progressbar -->
    <script src="{{ asset('css/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>

    <!-- iCheck -->
    <script src="{{ asset('css/vendors/iCheck/icheck.min.js') }}"></script>

    <!-- Skycons -->
    <script src="{{ asset('css/vendors/skycons/skycons.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset('css/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('css/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('css/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('css/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('css/vendors/Flot/jquery.flot.resize.js') }}"></script>

    <!-- Flot plugins -->
    <script src="{{ asset('css/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('css/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('css/vendors/flot.curvedlines/curvedLines.js') }}"></script>

    <!-- DateJS -->
    <script src="{{ asset('css/vendors/DateJS/build/date.js') }}"></script>

    <!-- JQVMap -->
    <script src="{{ asset('css/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('css/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('css/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('css/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('css/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('css/build/js/custom.min.js') }}"></script>
</body>
</html>