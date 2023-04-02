<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/')}}/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/backend/dist/')}}/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/')}}/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/')}}/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/')}}/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/')}}/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/')}}/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('assets/backend/plugins/')}}/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">

 <div class="wrapper" id="app">
  <!-- Navbar -->
 @include('backend.layouts.partials.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <router-view></router-view>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   @include('backend.layouts.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>



<!-- ./wrapper -->
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('assets/backend/plugins/')}}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/backend/plugins/')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('assets/backend/plugins/')}}/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/backend/plugins/')}}/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ asset('assets/backend/plugins/')}}/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('assets/backend/plugins/')}}/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/backend/plugins/')}}/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{ asset('assets/backend/plugins/')}}/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ asset('assets/backend/plugins/')}}/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/backend/plugins/')}}/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{ asset('assets/backend/plugins/')}}/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('assets/backend/plugins/')}}/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/backend/dist/')}}/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/backend/dist/')}}/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/backend/dist/')}}/js/demo.js"></script>
@stack('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
