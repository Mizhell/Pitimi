@extends('layouts.default')

@section('content')

    <div class="container">
        @include('modules.messages')
    </div>

    <div class="container box page-congregations">
        <h2>{{{ trans('messages.createCongregation') }}}</h2>
        {{ Form::open(array('class' => '')) }}
            <div class="form-controls">
                {{ Form::label('name') }}
                {{ Form::text('name') }}
            </div>
            <div class="form-controls">
                {{ Form::label('address') }}
                {{ Form::text('address') }}
            </div>
            <div class="form-controls">
                {{ Form::label('pm_day_of_week') }}
                {{ Form::select('pm_day_of_week', $weekdays) }}
            </div>
            <div class="form-buttons">
                {{ Form::submit('create', array('class' => 'primary')) }}
                <a href="{{ route('home') }}" class="button">Cancel</a>
            </div>
        {{ Form::close() }}
    </div>

@stop
