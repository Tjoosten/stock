@extends('layouts.master')

@section('content')
<h2>Bewerken leverancier: {{ $supplier->name }}</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('SuppliersController@index', 'Leveranciers') }}
    </li>
    <li class="active">Edit</li>
</ol>
{{ Form::model($supplier, array('role' => 'form', 'method' => 'PUT', 'action' => ['SuppliersController@update', $supplier->id])) }}
@include('suppliers._form')
{{ Form::close() }}

<div class="pull-right">
    {{ link_to_action('SuppliersController@index', 'Terugkeren naar dashboard') }}
</div>
<div class="clearfix"></div>
@stop