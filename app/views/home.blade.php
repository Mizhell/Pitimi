@extends('layouts.default')

@section('content')

    <div class="container">

        <h1>Hello World!</h1>

        <p>Salut Monde!</p>

        {{{ App::environment() }}}

    </div>

@stop
