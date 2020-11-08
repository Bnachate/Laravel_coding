
<!doctype html>
<html lang="en">
<head>
    <title>{{config('app.name', 'GameHub')}}</title>
    <!-- Fonts -->
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('App/public/css/app.css') }}" rel="stylesheet" media="all">
    <title>{{config('app.name', 'GameHub')}}</title>
</head>
<body>
@include('Inc.navbar')

</form>
@include('Inc.errorsuccess')
@yield('content')
</div>
</body>
</html>