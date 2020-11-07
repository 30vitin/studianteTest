<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.2')}}" rel="stylesheet" />
  </head>
   <body>
        <div class="container-scroller">
                @yield('content')
        </div>
   </body>

   <script src="{{asset('admin/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
   <script src="{{asset('admin/assets/js/core/bootstrap-material-design.min.js')}}"></script>

   <script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

     <script src="{{asset('admin/assets/js/plugins/moment.min.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>

  <!--  Notifications Plugin    -->
  <script src="{{asset('admin/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('admin/assets/js/material-dashboard.min.js?v=2.1.2')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('admin/assets/demo/demo.js')}}"></script>

  @yield('script')
</html>