@extends('layouts.master')

@section('content')
<h1>Klant: {{ $customer->name }}</h1>

<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('CustomersController@index', 'Klanten') }}
    </li>
    <li class="active">{{ $customer->name }}</li>
</ol>

<h2>Informatie</h2>
<dl class="dl-horizontal">
    <dt>Bedrijf</dt>
    <dd>{{ $customer->name }}</dd>

    <dt>Address</dt>
    <dd>{{ $customer->address }}</dd>

    <dt>Beschrijving</dt>
    <dd>{{ $customer->description }}</dd>
    <div class="clearfix"></div>
    <dt>BTW</dt>
    <dd>{{ $customer->btw }}</dd>
</dl>
<div class="clearfix"></div>
<h3>Tools</h3>
<div class="row">
    {{ HTML::link_box(
    "col-md-3",
    "StocksController@create",
    "glyphicon-plus",
    "Toevoegen Product",
    "Voor klant een product toevoegen met historiek",
    [$customer->id])
    }}
</div>
@if($productsStock)
    <h3>Producten in stock</h3>
@else
    <h3>Producten</h3>
@endif
@if($products->first())
{{-- Checkbox --}}
{{ Form::open(array('role' => 'form', 'action' => 'RegistrationsController@store')) }}
    <table class="table table-hover">
        <thead>
        <tr>
            <th>
                {{ Form::checkbox('selectAll', 'isselected', null, ['id' => 'SelectAll']) }}
            </th>
            <th>Type</th>
            <th>Product Groep</th>
            <th>Leverancier</th>
            <th>S/N</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td class="checker">
                    {{ Form::checkbox('stock_id[]', $product->id) }}
                </td>
                <td>
                    {{ link_to_action('StocksController@show', $product->product->name, [$customer->id, $product->id]) }}
                </td>
                <td>{{ $product->product->category->name or "" }}</td>
                <td>
                    {{ link_to_action('ProductsController@index', $product->product->supplier->name, $product->product->supplier->id) }}
                </td>
                <td>{{ $product->serialNumber }}</td>
                <td>
                    @if($product->last_registration)
                        {{ Generate::getStatus($product->last_registration->status) }}
                    @else
                        {{ Generate::getStatus(0) }}
                    @endif
                </td>
                <td>
                    {{ link_to_action('StocksController@edit', 'Wijzig', [$customer->id, $product->id]) }}
                </td>
                <td>
                    @if($product->registrations->count() == 0)
                        <a href="{{ action('StocksController@destroy', [$customer->id, $product->id]) }}" data-method="delete" data-confirm="Are you sure?"><span class="glyphicon glyphicon-trash"></span></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
{{ HTML::unavailable('Er zijn nog geen producten gekoppeld aan deze klant.') }}
@endif

    @if($productsStock)
    <h3>Producten van klanten in stock</h3>
    <table class="table table-hover">
        <thead>
            <th>Type</th>
            <th>Product Groep</th>
            <th>Leverancier</th>
            <th>S/N</th>
            <th>Klant</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($productsStock as $ps)
                @if($ps->stock)
                <tr>
                    <td>
                        {{ link_to_action('StocksController@show', $ps->stock->product->name, [$ps->stock->customer->id, $ps->stock->id]) }}
                    </td>
                    <td>{{ $ps->stock->product->category->name }}</td>
                    <td>{{ $ps->stock->product->supplier->name }}</td>
                    <td>{{ $ps->stock->serialNumber }}</td>
                    <td>{{ $ps->stock->customer->name }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    @endif
@if($products->first())
    <h3>Tools</h3>

    <div class="form-group" id="radioGroup" data-toggle="buttons">
        <div class="btn-group setDescription">
            <label class="btn btn-codivex">
                {{ Form::radio('status', '1') }} Checkin
            </label>
            <label class="btn btn-codivex">
                {{ Form::radio('status', '2') }} Checkout klant
            </label>
            <label class="btn btn-codivex">
                {{ Form::radio('status', '8') }} Checkout leverancier
            </label>
            <label class="btn btn-codivex">
                {{ Form::radio('status', '7') }} Forward
            </label>
            <label class="btn btn-codivex">
                {{ Form::radio('status', '3') }} Herstelling
            </label>
            <label class="btn btn-codivex">
                {{ Form::radio('status', '6') }} Opmerking
            </label>
        </div>
        <div class="btn-group">
            <label class="btn btn-codivex" id="productMove">
                {{ Form::radio('status', '5') }} Overname
            </label>
        </div>
    </div>

    <div class="form-group" id="toFactory">
        {{ Form::select('toFactory', ['' => 'Kies klant'] + $customers, null, ['class' => 'form-control input-lg hidden']) }}
    </div>
    <div class="form-group">
        {{ Form::textarea('description', null, ['class' => 'form-control input-lg description', 'placeholder' => 'Beschrijving', 'rows' => '2']) }}
    </div>
    {{ Form::hidden('customer_id', $customer->id) }}
    {{ Form::bt_button("Register", array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '4')) }}
{{ Form::close() }}
@endif
@stop

@section('scripts')
<script>
    (function(){
        var sw = !$('#SelectAll').prop('checked');
        $('#SelectAll').on('click', function(){
            $('.checker').find('input[type=checkbox]').prop('checked', sw);
            sw = !sw;
        });

        $('.setDescription').on('click', function(){
            $('#toFactory select').addClass('hidden');
            $('.description').removeClass('hidden');
        });

        $('#productMove').on('click', function(){
            $('#toFactory select').removeClass('hidden');
            $('.description').addClass('hidden');
        });
    })();
</script>
@stop