@extends('layouts.master')

@section('content')
    <h2>Aanmaken nieuwe leverancier</h2>
    <ol class="breadcrumb">
        <li>
            {{ link_to_action('DashboardController@index', 'Dashboard') }}
        </li>
        <li>
            {{ link_to_action('SuppliersController@index', 'Leveranciers') }}
        </li>
        <li class="active">Create</li>
    </ol>
    {{ Form::open(array('role' => 'form', 'action' => 'SuppliersController@store')) }}
        @include('suppliers._form')
    {{ Form::close() }}

    <div class="pull-right">
        {{ link_to_action('SuppliersController@index', 'Terugkeren naar dashboard') }}
    </div>
    <div class="clearfix"></div>
@stop