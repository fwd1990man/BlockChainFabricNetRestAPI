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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css') }}" />
    <!-- <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css') }}"/> -->
    <!-- <link rel="stylesheet" href="https://jqueryui.com/jquery-wp-content/themes/jqueryui.com/style.css" /> -->
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container nav-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img alt="Logo Image" src="{{ asset('images/logo.png') }}" class="logo-img">
                </a>
                <span class="logo-text">{{ config('app.name', 'Laravel') }}</span>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @if(!Auth::check())
                            <li><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4 container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav">
                    <li class="nav-item {{Route::is('home')?'active':''}}">
                        <a class="nav-link" href="{{ url('/') }}">Dashboard</a>
                    </li>
                    @if(Request::segment(1)=='esnbcs')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/esnbcs') }}">Esnbcs</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/esnbcs') }}">Esnbcs</a>
                        </li>
                    @endif
                    @if(Request::segment(1)=='esnbc-subsets')
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/esnbc-subsets') }}">Esnbcs Subset</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/esnbc-subsets') }}">Esnbcs Subset</a>
                        </li>
                    @endif
                    @if(Auth::user() !== null)
                        @if(Auth::user()->is_admin == 1)
                            @if(Request::segment(1)=='admin')
                            <li class="nav-item 'active'">
                                <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/admin') }}">Admin</a>
                            </li>
                            @endif
                        @endif
                    @endisset
                </ul>
            </nav>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</body>
</html>
