@extends('layouts.master')

@section('content')
<h1>Historiek: {{ $product->name }}</h1>
    <ol class="breadcrumb">
        <li>
            {{ link_to_action('DashboardController@index', 'Dashboard') }}
        </li>
        <li>
            {{ link_to_action('CustomersController@index', 'Klanten') }}
        </li>
        <li>
            {{ link_to_action('StocksController@index', $stock->customer->name, $stock->customer->id) }}
        </li>
        <li class="active">Historiek</li>
    </ol>
@include('stocks._details')

<div class="clearfix"></div>
<h3>Events</h3>

<div class="containerblog col-md-6 col-md-offset-3">
    <div class="blogrol">
        {{ Generate::Log('registration', $stock->created_at, "<strong>Product Groep: </strong>" . $product->category->name . "</br><strong>Product: </strong>" . $product->name) }}

        @for($i = 0; $i < count($registrations); $i++)
            @if($i == count($registrations)-1)
                {{ Generate::Log($registrations[$i]['status'], $registrations[$i]['created_at'], $registrations[$i]['description'], action('RegistrationsController@edit', $registrations[$i]['id']), ['RegistrationsController@destroy', $registrations[$i]['id']]) }}
            @else
                {{ Generate::Log($registrations[$i]['status'], $registrations[$i]['created_at'], $registrations[$i]['description'], action('RegistrationsController@edit', $registrations[$i]['id'])) }}
            @endif
        @endfor
    </div>
</div>
<div class="clearfix"></div>
<h3>Tools <small>voor registratie van product</small></h3>
{{ Form::open(array('role' => 'form', 'action' => 'RegistrationsController@store')) }}
@include('registrations._form')
{{ Form::close() }}
@stop

@section('scripts')
<script>
    (function(){
        $('.setDescription').on('click', function(){
            $('#toFactory select').addClass('hidden');
            $('#serialNumber input').addClass('hidden');
            $('.description').removeClass('hidden');
        });

        $('#productMove').on('click', function(){
            $('#toFactory select').removeClass('hidden');
            $('#serialNumber input').addClass('hidden');
            $('.description').addClass('hidden');
        });

        $('#productChange').on('click', function(){
            $('#serialNumber input').removeClass('hidden');
            $('#toFactory select').addClass('hidden');
            $('.description').addClass('hidden');
        });
    })();
</script>
@stop