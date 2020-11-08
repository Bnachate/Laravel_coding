<!doctype html>
<html lang="en">
<head>
    <title>{{config('app.name', 'Gamehub')}}</title>
    <!-- Fonts -->
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('App/public/css/app.css') }}" rel="stylesheet" media="all">
    <title>{{config('app.name', 'GameHub')}}</title>
</head>
<body>
@include('Inc.navbar')
<div class="container bg">
<form action="{{route('search.ad')}}" method=GET class="form-inline d-flex md-form form-sm ml-5">
        <i class="fas fa-search" aria-hidden="true"></i>
            <input type="text" class="form-control form-control-sm ml-0 w-50 mt-4" name="s" placeholder="Rechercher" value="{{isset($s) ? $s : '' }}">
        </i>
        <div class="form-group">
            <button class="btn btn-outline-secondary mt-4 ml-3 form-inline d-flex" type="submit">Rechercher</button>
        </div>
</form>
@include('Inc.errorsuccess')
@yield('content')
</div>
</body>
</html>