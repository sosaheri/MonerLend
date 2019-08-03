<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MonerLend') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" defer></script>
    

<!--     Fonts and icons     -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/monerLend.css') }}" rel="stylesheet">

 
    <!-- Material Kit CSS -->
    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/now-ui-dashboard.css') }}" rel="stylesheet" />
    

 
</head>
<body>
    <div id="app">


        <main class="py-4">
            @yield('content')
        </main>
    </div>

</html>
 
</body>


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" defer></script>

      <!--   Core JS Files   -->
      
  <script src="{{ asset('dashboard/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('dashboard/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>


  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('dashboard/js/now-ui-dashboard.js') }}" type="text/javascript"></script>

</html>
