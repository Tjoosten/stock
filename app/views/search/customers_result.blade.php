@extends('layouts.master')

@section('content')
<h2>Zoeken Klanten - Resultaat: {{ $keyword }}</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('SearchController@index', 'Zoeken') }}
    </li>
    <li class="active">Resultaat</li>
</ol>
{{ Form::open(array('role' => 'form', 'action' => 'SearchController@postSearchCompany')) }}
@include('search._form')
{{ Form::close() }}

@if(!$isEmpty)
<table class="table table-hover">
    <thead>
    <tr>
        <th>Naam</th>
        <th>Address</th>
        <th>Postcode</th>
        <th>Stad</th>
        <th>Land</th>
        <th>BTW</th>
        <th>Actie</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
    <tr>
        <td>{{ link_to_action('StocksController@index', $customer->name, $customer->id) }}</td>
        <td>{{ $customer->address }}</td>
        <td>{{ $customer->postalcode }}</td>
        <td>{{ $customer->city }}</td>
        <td>{{ $customer->country->country_code }}</td>
        <td>{{ $customer->btw }}</td>
        <td>
            {{ link_to_action('CustomersController@edit', 'Wijzigen', $customer->id) }}
        </td>
        <td>
            @if($customer->stocks->count() == 0)
            <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $customer->id }}"></span></a>
            @include('customers._modal')
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $customers->links() }}
@else
{{ HTML::unavailable('Geen resultaat gevonden') }}
@endif
<div class="clearfix"></div>
@stop