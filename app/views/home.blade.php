@extends('layouts.default')

@section('content')

    <div class="container box">
        <h2>{{{ trans('messages.welcome') }}}</h2>
        <p>{{{ Config::get('app.description') }}}</p>
    </div>

@stop
