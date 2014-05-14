@extends('layouts.master')

@section('content')
<h2>Bewerken klant</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('CustomersController@index', 'Klanten') }}
    </li>
    <li>
        {{-- NOG WIJZIGEN NAAR PRODUCT LOG --}}
        {{ link_to_action('CustomersController@index', $customer->name) }}
    </li>
    <li class="active">Edit</li>
</ol>
{{ Form::model($customer, array('role' => 'form', 'method' => 'PUT', 'action' => ['CustomersController@update', $customer->id])) }}
@include('customers._form')
{{ Form::close() }}

<div class="pull-right">
    {{ link_to_action('CustomersController@index', 'Terugkeren naar dashboard') }}
</div>
<div class="clearfix"></div>
@stop