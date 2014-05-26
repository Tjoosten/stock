@extends('layouts.master')

@section('content')
<h1>Vennootschap</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('PartnershipsController@index', 'Vennootschap') }}
    </li>
    <li class="active">Edit</li>
</ol>

{{ Form::model($partnerschip, array('role' => 'form', 'method' => 'PUT', 'action' => ['PartnershipsController@update', $partnerschip->id])) }}
@include('partnerships._form')
{{ Form::close() }}
@stop