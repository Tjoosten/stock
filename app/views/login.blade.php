@extends('layouts.master')

@section('content')
<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <h2>Please sign in</h2>

    {{ Form::open(array('route' => 'sessions.store', 'role' => 'form')) }}
    {{ Form::bt_text('username', null, null, array('class' => 'input-lg', 'placeholder' => 'Username')) }}
    {{ Form::bt_password("password", null, array('class' => 'input-lg', 'placeholder' => 'Password')) }}
    {{ Form::submit('Login', array('class' => 'btn btn-pack btn-block btn-lg', 'tabindex' => '3')) }}
    {{ Form::close() }}
</div>
@stop