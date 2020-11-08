<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'FreeAdds')}}</title>

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
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" style="color:#FFFFFF; font-size:40px" href="/">GameHub</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" style="color:#FFFFFF" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
           
            <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF" href="/about">About Us</a>
            </li>
        
      <li>
        
  <button class="border border-primary btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <strong> Categories</strong>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/adds/category_console">Games Console</a>
    <a class="dropdown-item" href="/adds/category_games/">Video Games</a>
    <a class="dropdown-item" href="/adds/category_accessories/">Accessories</a>
  </div>

</li>
</ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto mr-5">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:#FFFFFF" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:#FFFFFF" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="border border-primary btn btn-dark nav-item dropdown border border-primary">
                                <a id="navbarDropdown" style="color:#FFFFFF;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <strong> {{ Auth::user()->username }}</strong>
                                </a>

                            <a class="dropdown-item" style="color:#000000" href="{{ route('profile.user', Auth::user()->id) }}">
                            <strong>{{ __('Profile') }}</strong>
                            </a>

                            <form id="profile-form" action="{{ route('home') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                
                            <a class="dropdown-item" style="color:#000000" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                <strong> {{ __('Logout') }}</strong>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>
