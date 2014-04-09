@extends('layouts.blank')

@section('content')

    <h1>Hello World!</h1>

    <p>Salut Monde!</p>

    {{{ App::environment() }}}

@stop