<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="{{ asset('public/icon.png') }}">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/normalize.css') }}">

  <!-- Bootstrap v5.1.3  -->
  <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/bootstrap.min.css') }}">
  <!-- Bootstrap icons v1.7.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <!--JQuery-->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/main.css') }}">

    @stack('frontend_css')

  <meta name="theme-color" content="#fafafa">

</head>

<body>
  <!-- Header Start -->
  @include('layouts.frontend.partial.header')
  <!-- Header End -->

    @yield('frontend_content')

  <!-- Footer Start -->
  @include('layouts.frontend.partial.footer')
  <!-- Footer End -->

  <script src="{{ asset('public/assets/frontend/js/vendor/modernizr-3.11.2.min.js') }}"></script>
  <script src="{{ asset('public/assets/frontend/js/plugins.js') }}"></script>

  <!-- Bootstrap v5.1.3 -->
  <script src="{{ asset('public/assets/frontend/js/bootstrap.min.js') }}"></script>



  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>

  @stack('frontend_js')
  <script src="{{ asset('public/assets/frontend/js/main.js') }}"></script>
</body>

</html>