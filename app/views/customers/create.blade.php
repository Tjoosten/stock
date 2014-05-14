@extends('layouts.master')

@section('content')
<h2>Aanmaken nieuwe klant</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('CustomersController@index', 'Klanten') }}
    </li>
    <li class="active">Create</li>
</ol>
{{ Form::open(array('role' => 'form', 'action' => 'CustomersController@store')) }}
@include('customers._form')
{{ Form::close() }}

<div class="pull-right">
    {{ link_to_action('CustomersController@index', 'Terugkeren naar dashboard') }}
</div>
<div class="clearfix"></div>
@stop