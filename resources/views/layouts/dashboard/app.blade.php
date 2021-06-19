<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Netflix-Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
  <!-- Navbar-->
  @include('layouts.dashboard._header')
  <!-- Sidebar menu-->
  @include('layouts.dashboard._aside')

    <main class="app-content">
        @include('dashboard.partials._confirm')
        @include('dashboard.partials._errors')
        @include('dashboard.partials._sessions')

        @yield('content')

        <footer class="alert alert-primary m-0">Copy Right © 2021 Mohamed Adel - All Rights Reserved</footer>
    </main>


    <!-- Essential javascripts for application to work-->
  <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
  <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('dashboard_files/js/main.js') }}"></script>


  </body>
</html>
