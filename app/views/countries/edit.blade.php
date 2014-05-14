@extends('layouts.master')

@section('content')
<h1>Land</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('CountriesController@index', 'Landen') }}
    </li>
    <li class="active">Edit</li>
</ol>

{{ Form::model($country, array('role' => 'form', 'method' => 'PUT', 'action' => ['CountriesController@update', $country->id])) }}
@include('countries._form')
{{ Form::close() }}
@stop