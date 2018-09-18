<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Cuentintoon!</title>
    <style>
      @import url('https://fonts.googleapis.com/css?family=Bungee|Bungee+Inline|Lily+Script+One');
    </style>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Fredoka+One');
    </style>
    <style>
      @import url('https://fonts.googleapis.com/css?family=Comfortaa|Delius+Unicase');
    </style>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>

  <body>

    <header>

      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="container">
              <a class="navbar-brand iconhome" style="color:yellowgreen;font-family: 'Lily Script One', cursive;" href="{{ url('/') }}">
                  <img class="logopequeño" src="{{asset('img/logoCT.png')}}" alt="logo">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto">
                    <li></li>
                    <li class="nav-item">
                      <a class="nav-link iconhome" href="{{route('cuentos.index')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link iconhome" href="{{route('cuentos.create')}}">Crear cuento</a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link iconhome">Mis cuentos</a>
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

    </header>

    <div class="container.fluid">
      <header class="row">
          <img class="mx-auto d-block logoCT" src="{{asset('img/logoCT.png')}}" alt="logo">
      </header>

      <main class="py-4">
        @yield('content')
      </main>

    </div>

  </body>
</html>
