<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
 
         <!-- Styles -->
     <link href="{{asset('admin/css/material-dashboard.css')}}" rel="stylesheet">
     <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
</head>
<body>
     <div class="wrapper">
      @include('layouts.inc.sidebar')

      <div class="main-panel">
      @include('layouts.inc.adminnav')
      <div class="content">
        @yield('content')
      </div>
      @include('layouts.inc.adminfooter')
      </div>
     </div>



    <!--   Core JS Files   -->
  <script src="{{asset('admin/js/jquery.min.js')}}" defer></script>
  <script src="{{asset('admin/js/popper.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap-material-design.min.js')}}" defer></script>
  <script src="{{asset('admin/js/perfect-scrollbar.jquery.min.js')}}" defer></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if(session('status'))
  <script>
     swal("{{session('status')}}");
  </script>
 
  @endif
  @yield('scripts')
    <!-- <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}" defer></script> -->
</body>
</html>
