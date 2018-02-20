<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The CUCHIP | Covenant University</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                background: url({{asset('images/landing/bannersplash.jpg')}});
                /*color: #636b6f;*/
                color:#fff;
                background-repeat: no-repeat;
                background-size: 100% 720px;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 38px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .container{
                width: 500px;
                height: 400px;
                text-align: center;
                margin: 0 auto;
                background-color:rgba(52,73,94,0.9);
                border-radius: 4px;
                margin-top: 150px;
            }
            .container img{
                width: 120px;
                height: 120px;
                border-radius:50%;
                margin-top: -60px;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                {{-- <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
                <div class="container ">
                    <img src="{{asset('images/landing/cu-logo-2.jpg')}}">
                    <div class="title m-b-md">
                        Covenant University Community Health Project
                        <hr style="width: 50%;">
                        The <strong>CUCHIP</strong> APP

                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h5 class="lead">Powered by - Department of Electrical and Information Engineering</h5>
                        </div>
                        <div class="col-xs-12 col-md-12">
                            <h6 class="lead">In collaboration with Covenant University Center for Research Innovation and Development (CUCRID)</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
