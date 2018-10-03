<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cuentintoon!</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Stylesheet's and Scripts -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/cuentintoon.css')}}">
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
    <!-- Fonts -->
    <style>
      @import url('https://fonts.googleapis.com/css?family=Cherry+Swash:700|Gabriela');
    </style>
  </head>
  <body>

      <div class="container-fluid top-side">
        <div class="col">
          <img src="{{asset('rsc/logo.png')}}" id="logo-top" alt="center">
        </div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-ct">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <li></li>
                      <li class="nav-item">
                        <a class="nav-link iconhome" href="{{route('cuentos.index')}}">
                          <img src="{{asset('rsc/home32.png')}}" alt="home" class="home-icon">
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('cuentos.create')}}" data-toggle="tooltip" title="Crear Cuento">
                          <img src="{{asset('rsc/pencil32.png')}}" alt="create" class="link-navbar">
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="tooltip" title="Mis Cuentos">
                          <img src="{{asset('rsc/book32.png')}}" alt="miscuentos" class="link-navbar">
                        </a>
                      </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link iconhome" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link iconhome" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
      </div>
      <main class="container-fluid mid-side">
        @yield('content')
      </main>
    </div>
    <!-- Script para tooltips -->
    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>
  </body>
</html>
