@extends('layouts.default')

@section('content')

    <div class="container">
        @include('modules.messages')
    </div>

    <div class="container box">
        <h2>{{{ trans('messages.congregations') }}}</h2>
        @if (count($congregations))
            <table>
                <thead>
                    <tr>
                        <th>{{ trans('messages.id') }}</th>
                        <th>{{ trans('messages.name') }}</th>
                        <th>{{ trans('messages.address') }}</th>
                        <th>{{ trans('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($congregations as $c)
                        <tr>
                            <td>{{{ $c->id }}}</td>
                            <td>{{{ $c->name }}}</td>
                            <td>{{{ $c->address }}}</td>
                            <td>(no actions yet)</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    {{ $congregations->links() }}
                </tfoot>
            </table>
        @else
            {{ HTML::warning(trans('messages.noCongregations')) }}
            <p>
                <a class="button primary" href="{{{ route('congregations.create') }}}">{{{ trans('messages.createOne') }}}</a>
            </p>
        @endif
    </div>

@stop
