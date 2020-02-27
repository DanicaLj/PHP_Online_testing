<!doctype html>
<link  rel="stylesheet" href="css/style.css" >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QUIZ</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
            .btn{
                width: 170px;
                height: 80px;
                font-size: 25px;
                padding: 20px;
                font-style: bold;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <h1>Da li ste spremni za dobru ocenu?!</h1>
                       <div class="button-box"> <a href="{{ url('/home') }}"><button type="button" class="btn btn-danger">DA</button></a></div>
                    @else
                        <a href="{{ route('login') }}"><button type="button" class="btn btn-info">Uloguj se</button></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"><button type="button" class="btn btn-warning">Registracija</button></a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html>
