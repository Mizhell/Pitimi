<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{{ $title or '' }}}</title>
    @section('head')
    @stop
    @include('layouts.partials.head')
</head>
<body>
    @yield('content')
</body>
</html> 