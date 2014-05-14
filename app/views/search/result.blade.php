@extends('layouts.master')

@section('content')
<h2>Resultaat: {{ $keyword }}</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('SearchController@index', 'Zoeken') }}
    </li>
    <li class="active">Resultaat</li>
</ol>
{{ Form::open(array('role' => 'form', 'action' => 'SearchController@postSearch')) }}
    @include('search._form')
{{ Form::close() }}

@if(!$isEmpty)
<table class="table table-hover">
    <thead>
        <tr>
            <th>Categorie</th>
            <th>Naam</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $supplier)
            <tr>
                <td><span class="label label-default">Leverancier</span></td>
                <td>
                    {{ link_to_action('ProductsController@index', $supplier->name, $supplier->id) }}
                </td>
                <td>{{ $supplier->city }}</td>
                <td>{{ $supplier->country->country_code }}</td>
            </tr>
        @endforeach
        @foreach($customers as $customer)
            <tr>
                <td><span class="label label-primary">Klant</span></td>
                <td>
                    {{ link_to_action('StocksController@index', $customer->name, $customer->id) }}
                </td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->btw }}</td>
            </tr>
        @endforeach
        @foreach($products as $product)
        <tr>
            <td><span class="label label-success">Product</span></td>
            <td>
                {{ $product->name }}
            </td>
            <td>{{ $product->category->name or "" }}</td>
            <td>
                {{ link_to_action('ProductsController@index', $product->supplier->name, $product->supplier->id) }}
            </td>
        </tr>
        @endforeach
        @foreach($stocks as $stock)
        <tr>
            <td><span class="label label-warning">Geplaatst product</span></td>
            <td>
                {{ link_to_action('StocksController@show', $stock->product->category->name . ' ' . $stock->product->name, [$stock->customer->id, $stock->id]) }}
            </td>
            <td>{{ $stock->serialNumber }}</td>
            <td>{{ $stock->customer->name or "" }}</td>
        </tr>
        @endforeach
        @foreach($stockProduct as $stock)
            @if(isset($stock->customer->id) and isset($stock->product->id))
                <tr>
                    <td><span class="label label-warning">Geplaatst product</span></td>
                    <td>
                        {{ link_to_action('StocksController@show', $stock->product->category->name . ' ' . $stock->product->name, [$stock->customer->id, $stock->id]) }}
                    </td>
                    <td>{{ $stock->serialNumber }}</td>
                    <td>{{ $stock->customer->name or "" }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
@else
    {{ HTML::unavailable('Geen resultaat gevonden') }}
@endif
<div class="clearfix"></div>
@stop