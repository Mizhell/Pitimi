@extends('layouts.blank')

@section('content')

    <div id="login" class="box">
        <h2 class="box-header">{{{ Config::get('app.name') }}}</h2>
        <p>{{{ Lang::get('messages.pleaseLogin') }}}</p>
        {{ Form::open(array('autocomplete' => 'off')) }}
            {{ Form::token() }}
            <div class="form-row">
                {{ Form::label('username') }}
                {{ Form::text('username') }}
            </div>
            <div class="form-row">
                {{ Form::label('password') }}
                {{ Form::password('password') }}
            </div>
            <div class="form-row">
                {{ Form::submit('Login', array('class' => 'button button-primary')) }}
            </div>
        {{ Form::close() }}
    </div>

@stop