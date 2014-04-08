<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{{ $title or '' }}}</title>
    @section('head')
    @show
</head>
<body>
    @yield('content')
</body>
</html> 