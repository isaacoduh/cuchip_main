<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CUCHIP') }}</title>

    <!-- Styles -->
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}

    <!-- External Styles -->
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    {{-- <link href="/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('css/nifty.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/demo/nifty-demo-icons.min.css')}}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    {{-- <link href="/css/nifty.min.css" rel="stylesheet"> --}}

     <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    {{-- <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet"> --}}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    
    @yield('content')


    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <!--JAVASCRIPT-->
    <!--=================================================-->


    <link href="" rel="stylesheet">
    
    <link href="{{asset('css/nifty.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/demo/nifty-demo-icons.min.css')}}" rel="stylesheet">


    <!--jQuery [ REQUIRED ]-->
    <script src="{{asset('js/jquery.min.js')}}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!--NiftyJS [ RECOMMENDED ]-->
    
    <script src="{{asset('js/nifty.min.js')}}"></script>


</body>
</html>