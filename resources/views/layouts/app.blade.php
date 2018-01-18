<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
  <!--  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-light navbar-toggleable-md bg-inverse navbar-inverse">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Blog Post App
                    <!--@{{ config('app.name', 'Laravel') }} -->
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('about') }}" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contacts') }}" class="nav-link">Contacts</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    @guest
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @else
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a href="#"  class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item">
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @endguest
                </ul>

                </ul>
            </div>
        </nav>




        @yield('content')
    </div>
    <footer id="main-footer" class="bg-inverse text-white mt-5 p-4" style="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="lead text-center"> Copyright &copy; 2018 Pasha</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
@yield('scripts')
</body>
</html>
