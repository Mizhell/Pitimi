@extends('layouts.default')

@section('content')

    <div class="container">
        @include('modules.messages')
    </div>

    <div class="container box">
        <h2>{{{ trans('messages.createCongregation') }}}</h2>
        {{ Form::open() }}
            <div class="form-row">
                {{ Form::label('name') }}
                {{ Form::text('name') }}
            </div>
        {{ Form::close() }}
    </div>

@stop
