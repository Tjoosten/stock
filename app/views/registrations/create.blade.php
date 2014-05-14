@extends('layouts.master')

@section('content')
<h1>Registratie - {{ $title }}</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('RegistrationsController@index', 'Registratie') }}
    </li>
    <li class="active">{{ $product->name }}</li>
</ol>

@include('stocks._details')

<h3>Formulier</h3>
<p><strong>Actie:</strong> {{ $title }}</p>

{{ Form::open(array('role' => 'form', 'action' => 'RegistrationsController@store')) }}
    @include('registrations._form')
{{ Form::close() }}

<div class="pull-right">
    {{ link_to_action('StocksController@show', 'Toon product historiek', [$customer->id, $stock->id]) }}
</div>
<div class="clearfix"></div>
@stop