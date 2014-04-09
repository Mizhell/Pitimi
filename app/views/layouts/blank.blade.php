<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@if (isset($title)) {{{ $title . ' - ' . Config::get('app.name') }}} @else {{{ Config::get('app.name') }}} @endif</title>
    @section('head')
    @stop
    @include('layouts.partials.head')
</head>
<body>
    @yield('content')
</body>
</html> 