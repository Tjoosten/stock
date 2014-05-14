@extends('layouts.master')

@section('content')
<h1>Categories</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('SuppliersController@index', 'Leveranciers') }}
    </li>
    <li>
        {{ link_to_action('ProductsController@index', $category->supplier->name, $category->supplier->id) }}
    </li>
    <li>
        {{ link_to_action('CategoriesController@index', 'Categories', $category->supplier->id) }}
    </li>
    <li class="active">Edit</li>
</ol>

{{ Form::model($category, array('role' => 'form', 'method' => 'PUT', 'action' => ['CategoriesController@update', $category->supplier->id, $category->id])) }}
@include('categories._form')
{{ Form::close() }}
@stop