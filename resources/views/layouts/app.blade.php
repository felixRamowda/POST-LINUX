<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="{{asset('images/linux1.png')}}", class="img-fluid" alt="" width="40" height="40">
                   Laravel-Linux
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"


                   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">

                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">

                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        <!-- hacemos la configuracion para cuando no somos invitados y ya estamos logeados: -->
                            @else
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}" class="nav-link">
                                Articulos-Publicados
                                </a>
                            </li>
                           <!-------------------------------bonton login-------------------------------- -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <!--Seccion de la imagen de abatar-->
                            <div class="" >
                                <li class="nav-item">
                                    <img class="rounded-circle img-fluid mx-4 mb10 " src="{{asset('images/usuario2.png')}}" alt="" >
                                </li>
                            </div>



                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    <!-- EJEMPLO: Esta seccion se encarga de mostrar la imagen de linux
    dependiendo si estamos loggeados o no usando "guest"
     en este momento esta funcion esta comentariada-->

        @guest <!--inicio del guest-->
@if (Route::has('register'))
    <main class="py-4">
            @yield('content')
        <div class="mx-auto" style="width: 400px; height=450px;"></div>
    </main>
@endif
    @else
        <main class="py-4">
            @yield('content')
        <div class="mx-auto" style="width: 400px; height=450px;">

          <!--
         <img src="{{asset('images/linux1.png')}}", alt="image-linux " width="300" height="350">
          -->
        </div>
        </main>
    @endguest <!-- fin del guest -->


    </div>
</body>
</html>
