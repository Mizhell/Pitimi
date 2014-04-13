@extends('layouts.blank')

@section('content')

    <div id="login" class="box">
        <h2 class="box-header">{{{ Config::get('app.name') }}}</h2>
        @include('modules/messages')
        <p>{{{ Lang::get('messages.pleaseLogin') }}}</p>
        {{ Form::open(array('autocomplete' => 'off')) }}
            {{ Form::token() }}
            <div class="form-controls">
                {{ Form::label('username') }}
                {{ Form::text('username') }}
            </div>
            <div class="form-controls">
                {{ Form::label('password') }}
                {{ Form::password('password') }}
            </div>
            <div class="form-buttons">
                {{ Form::submit('Login', array('class' => 'primary')) }}
            </div>
        {{ Form::close() }}
    </div>

@stop
