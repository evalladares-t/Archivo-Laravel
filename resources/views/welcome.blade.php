<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="{{url('materialkit/css/material-kit.css?v=2.0.6')}}" rel="stylesheet" />
</head>
<body>
    <div class="flex-center position-ref full-height">
        <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
                <img src="{{url('img/resource/LogoVes.png')}}">    
                <a class="navbar-brand" href="{{url('/')}}">Archivo Central </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        @if (Route::has('login'))
                            <div class="top-right links">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>
                                @else
                                <a href="{{ route('login') }}">Login</a>
                            @endauth
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        </nav>     
    <div  class="page-header header-filter" data-parallax="true" style="background-image: url('img/resource/welcome.jpg');position:relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center">
                        <h1>Municipalidad de Villa el Salvador</h1>
                        <h4 class="title text-center">"Año de la Universalización de la Salud."</h4>
                    </div>
                </div>        
            </div>
        </div>                                      
        
    </div>        
</body>

</html>



