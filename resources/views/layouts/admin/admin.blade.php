<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Billto | Invoice">
        <meta name="author" content="Womenindigital">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- App title -->
        <title>@yield('title')</title>

        <!-- Switchery css -->
        <link href="{{ asset('public/assets/admin/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="{{ asset('public/assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App CSS -->
        <link href="{{ asset('public/assets/admin/css/style.css') }}" rel="stylesheet" type="text/css" />

        <!-- Modernizr js -->
        <script src="{{ asset('public/assets/admin/js/modernizr.min.js') }}"></script>

        <!-- Custom Css Start -->
        @stack('admin_style_css')
        <!-- Custom Css End -->

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            

            @include('layouts.admin.topbar')
            
            @include('layouts.admin.leftside_menu')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            @yield('page_content')
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            
            @include('layouts.admin.right_sidebar')

            @include('layouts.admin.footer')

        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('public/assets/admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/detect.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/fastclick.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/waves.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('public/plugins/switchery/switchery.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('public/assets/admin/js/jquery.core.js') }}"></script>
        <script src="{{ asset('public/assets/admin/js/jquery.app.js') }}"></script>

        @stack('admin_style_js')

    </body>
</html>