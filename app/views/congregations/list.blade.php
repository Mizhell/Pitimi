@extends('layouts.default')

@section('content')

    <div class="container">
        @include('modules.messages')
    </div>

    <div class="container box">
        <h2>{{{ trans('messages.congregations') }}}</h2>
        @if (count($congregations))
        @else
            {{ HTML::warning(trans('messages.noCongregations')) }}
            <br>
            <a class="button primary" href="{{{ route('congregations.create') }}}">{{{ trans('messages.createOne') }}}</a>
        @endif
    </div>

@stop
