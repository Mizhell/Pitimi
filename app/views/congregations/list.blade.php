@extends('layouts.default')

@section('content')

    <div class="container">
        @include('modules.messages')
    </div>

    <div class="container box">
        <h2>{{{ trans('messages.congregations') }}}</h2>
        @if (count($congregations))
        @else
            <div class="message warning">
                {{{ trans('messages.noCongregations') }}}
                <a href="{{{ route('congregations.create') }}}">{{{ trans('messages.createOne') }}}</a>
            </div>
        @endif
    </div>

@stop
