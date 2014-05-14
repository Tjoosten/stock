@extends('layouts.master')

@section('content')
<h2>Zoeken</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li class="active">Zoeken</li>
</ol>

{{ Form::open(array('role' => 'form', 'action' => 'SearchController@postSearch')) }}
    @include('search._form')
{{ Form::close() }}

@stop