@extends('layouts.master')

@section('content')
<h2>Leveranciers</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li class="active">Leveranciers</li>
</ol>

<div class="row">
    {{-- Add Supplier --}}
    {{ HTML::link_box('col-md-3', 'SuppliersController@create', "glyphicon-print", "Leveranciers Toevoegen", "Als er een nieuwe leverancier met zijn eigen gamma bijkomt.") }}
    {{-- Country Management --}}
    {{ HTML::link_box('col-md-3', 'CountriesController@index', "glyphicon-plane", "Beheer Landen", "Als men een land wilt toevoegen") }}
</div>
<div class="clearfix"></div>
<hr/>

@if($suppliers->first())
<table class="table table-hover">
    <thead>
    <tr>
        <th>Leverancier</th>
        <th>Adres</th>
        <th>Stad</th>
        <th>Post Code</th>
        <th>Land</th>
        <th>Actie</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($suppliers as $supplier)
    <tr>
        <td>
            {{ link_to_action('ProductsController@index', $supplier->name, $supplier->id) }}
        </td>
        <td>{{ $supplier->address }}</td>
        <td>{{ $supplier->city }}</td>
        <td>{{ $supplier->postal_code }}</td>
        <td>{{ $supplier->country->country_code }}</td>
        <td>
            {{ link_to_action('SuppliersController@edit', 'Bewerk', $supplier->id) }}
        </td>
        <td>
            @if($supplier->products->count() == 0)
            <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $supplier->id }}"></span></a>
            @include('suppliers._modal')
            @endif
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@else
<h3>Leeg</h3>
<p>Momenteel is er nog geen leverancier aanwezig in de database.</p>
@endif
@stop