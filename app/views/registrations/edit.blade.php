@extends('layouts.master')

@section('content')
    <h2>Bewerken van registratie log</h2>
    <ol class="breadcrumb">
        <li>
            {{ link_to_action('DashboardController@index', 'Dashboard') }}
        </li>
        <li>
            {{ link_to_action('StocksController@index', $registration->stock->customer->name, [$registration->stock->customer->id]) }}
        </li>
        <li>
            {{ link_to_action('StocksController@show', $registration->stock->product->name, [$registration->stock->customer->id, $registration->stock->id]) }}
        </li>
        <li class="active">Bewerk log</li>
    </ol>
    {{ Form::model($registration, array('role' => 'form', 'method' => 'PUT', 'action' => ['RegistrationsController@update', $registration->id])) }}
        <div class="form-group">
            {{ Form::input('date', 'created_at', $date, ['class' => 'form-control input-lg description', 'placeholder' => 'Datum', 'rows' => '1']) }}
        </div>
        <div class="form-group">
            {{ Form::textarea('description', null, ['class' => 'form-control input-lg description', 'placeholder' => 'Beschrijving', 'rows' => '2']) }}
        </div>
        {{ Form::bt_button("Update", array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '2')) }}
        {{ Form::hidden('status', $registration->status) }}
    {{ Form::close() }}
@endsection