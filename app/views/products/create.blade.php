@extends('layouts.master')

@section('content')
<h2>Product toevoegen</h2>

<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('SuppliersController@index', 'Leveranciers') }}
    </li>
    <li>
        {{ link_to_action('ProductsController@show', $supplier->name, $supplier->id) }}
    </li>
    <li class="active">Create</li>
</ol>

{{ Form::open(array('role' => 'form', 'action' => ['ProductsController@store', $supplier->id])) }}
@include('products._form')
{{ Form::close() }}

<div class="pull-right">
    {{ link_to_action('ProductsController@index', 'Terugkeren naar Leveranciers', $supplier->id) }}
</div>
<div class="clearfix"></div>
@stop