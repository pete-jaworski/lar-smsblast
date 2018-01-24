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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" >
 

    <!-- JS -->
    <script src="{{ asset('js/jQuery3-2-1.js') }}"></script>
   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i> Zaloguj się
                                </a>
                            </li>
                        @else
                        
                            <li>
                                <a href="{{ route('gate.index') }}">
                                    <i class="fa fa-commenting-o" aria-hidden="true"></i> Bramka SMS
                                </a>
                            </li>
 
                            
                            @if (Auth::user()->isAdmin())  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-file-o" aria-hidden="true"></i> Zadania <span class="caret"></span>
                                </a>                            
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('tasks.index') }}">
                                            <i class="fa fa-file-o" aria-hidden="true"></i> Zadania
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tasks.current') }}">
                                            <i class="fa fa-calendar-times-o" aria-hidden="true"></i> Dzisiejsze zadania
                                        </a>
                                    </li>                                    
                                    <li>
                                        <a href="{{ route('tasks.create') }}"> 
                                            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj Zadanie
                                        </a>
                                    </li>
                                </ul>
                            </li>                                
                            @endif                          
                        
                        
                                
                            @if (Auth::user()->isAdmin())  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-user-o" aria-hidden="true"></i> Użytkownicy<span class="caret"></span>
                                </a>                            
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('users.index') }}">
                                            <i class="fa fa-user-o" aria-hidden="true"></i> Użytkownicy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj Użytkownika
                                        </a>
                                    </li>
                                </ul>
                            </li>                                
                            @endif                        
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                   <i class="fa fa-address-card-o" aria-hidden="true"></i> {{ Auth::user()->name }}<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @include('includes.flash')
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
