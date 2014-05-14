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
        {{ link_to_action('ProductsController@show', $product->supplier->name, $product->supplier->id) }}
    </li>
    <li class="active">Edit</li>
</ol>

{{ Form::model($product, array('role' => 'form', 'method' => 'PUT', 'action' => ['ProductsController@update', $product->supplier->id, $product->id])) }}
@include('products._form')
{{ Form::close() }}

<div class="pull-right">
    {{ link_to_action('ProductsController@index', 'Terugkeren naar Leveranciers', $product->supplier->id) }}
</div>
<div class="clearfix"></div>
@stop