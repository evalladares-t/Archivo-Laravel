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
                            <div class="top-right links">
                                <a href="{{ url('/home') }}">Regresar</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>     
    <div class="page-header header-filter" style="background-image: url('{{'img/resource/login.jpg'}}'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <div class="card card-login">
                    <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Iniciar sesión</h4>
                            <div class="social-line">
                            <img style="width:60px;"src="{{url('img/resource/user.png')}}">  
                            </div>
                        </div>
                            <p class="description text-center">Ingresar sus datos</p>
                            <div class="card-body">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input id="name_user" type="text" class="form-control" name="name_user" required value="{{ old('name_user') }}" autofocus placeholder="Usuario" >
                                    @error('name_user')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                    <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>        
                </div>          
            </div>      
        </div>      
    </div>
</body>
</html>
