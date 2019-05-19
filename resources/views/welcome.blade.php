<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CECIM 2019</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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
                font-size: 84px;
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
        </style>
                <style>
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: white;
                color: white;
                text-align: center;
            }
            .footer p{
                font-size:14px;
                font-weight: 900;
                color:darkgrey;
            }
            .footer a{
                font-size:14px;
                font-weight: 900;
                color:darkgrey;
            }
</style>
    </head>
    <body oncontextmenu="return false" onkeydown="return false">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ url('/login') }}">Iniciar</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="https://admin.cecim2019.com/logo/logo_cecim.png" alt="CECIM 2019 LOGO" style="width:90%;height:auto;"><br />
                    CECIM 2019 <br /><span>ADMIN</span>
                </div>

                <div class="links">
                    <a href="https://cecim2019.com" target="_blank">Sitio Web</a>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>Desarrollo: <a href="http://luismachadoportafolio.com.co" target="_blank">LHPM</a></p>
        </div>
    </body>
</html>
