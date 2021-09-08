<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Analog-Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  {{-- noty --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
  <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

  {{--select2 --}}
  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

{{--  <!-- include summernote css/js -->--}}
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


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
  <script src="{{ asset('dashboard_files/plugins/tiny/tinymce.min.js') }}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script>
      $('.select2').select2({
          width: '100%'
      });
  </script>

  <script>
      $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Description for article',
            height: 200
        });
      });
  </script>

  <script>
      tinymce.init({
          selector: '#mytextarea',
      });
  </script>
  <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  </script>

  @include('dashboard.partials._confirm')


  @stack('script')
  </body>
</html>
