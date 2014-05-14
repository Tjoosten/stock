@extends('layouts.master')

@section('content')
<h1>Venootschappen</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li class="active">Venootschappen</li>
</ol>

<div class="row">
    <div class="col-md-6">
        @if($partnerships->first())
        <table class="table table-hover">
            <thead>
                <th>Venootschap</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($partnerships as $partnership)
                <tr>
                    <td>{{ $partnership->name }}</td>
                    <td>
                        {{ link_to_action('PartnershipsController@edit', 'Wijzigen', $partnership->id) }}
                    </td>
                    <td>
                        @if($partnership->customers->count() <= 0)
                        <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $partnership->id }}"></span></a>
                        @include('partnerships._modal')
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            {{ HTML::unavailable('Er is nog geen venootschap aangemaakt.') }}
        @endif
    </div>
    <div class="col-md-6">
        {{ Form::open(array('role' => 'form', 'action' => 'PartnershipsController@store')) }}
            @include('partnerships._form')
        {{ Form::close() }}
    </div>
</div>
@stop