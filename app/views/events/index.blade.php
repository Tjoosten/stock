@extends('layouts.master')

@section('content')
<h1>Event log</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li class="active">Event log</li>
</ol>

@if($logs->first())
<table class="table table-hover">
    <thead>
    <tr>
        <th>Datum</th>
        <th>Gebruiker</th>
        <th>Actie</th>
    </tr>
    </thead>
    <tbody>
    @foreach($logs as $log)
    <tr>
        <td>{{ $log->created_at }}</td>
        <td>{{ $log->user->username }}</td>
        <td>{{ $log->action }}</td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $logs->links() }}
@else
    {{ HTML::unavailable('Geen events gevonden') }}
@endif
@stop