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
    <a class="navbar-brand" style="color:#FFFFFF" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" style="color:#FFFFFF" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" style="color:#FFFFFF" href="/">Freeads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF" href="/contact">Contact</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="/index">index</a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" style="color:#FFFFFF" href="/index">Adds</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
        
</nav>
</div>
