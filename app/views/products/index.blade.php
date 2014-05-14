@extends('layouts.master')

@section('content')
<h1>Leverancier: {{ $supplier->name }}</h1>

<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('SuppliersController@index', 'Leveranciers') }}
    </li>
    <li class="active">{{ $supplier->name }}</li>
</ol>

<div class="row">
    {{-- Aanmaken Product --}}
    {{ HTML::link_box(
    "col-md-3",
    "ProductsController@create",
    "glyphicon-plus",
    "Product toevoegen",
    "Product van het gamma toevoegen",
    [$supplier->id])
    }}

    {{-- Aanmaken Categorie --}}
    {{ HTML::link_box(
    "col-md-3",
    "CategoriesController@index",
    "glyphicon-inbox",
    "Beheer Categorieen",
    "Leverancier met verschillende categorieen",
    [$supplier->id])
    }}
</div>

<h2>Producten</h2>
@if($supplier->products->first())
<table class="table table-hover">
    <thead>
    <tr>
        <th>Product Naam</th>
        <th>Productgroep</th>
        <th>Artikel Code</th>
        <th>Standaard garantie</th>
        <th>Tariff Code</th>
        <th>Action</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name or "Leeg" }}</td>
                <td>{{ $product->itemNumber }}</td>
                <td>{{ $product->defaultWarranty }}</td>
                <td>{{ $product->tariffCode }}</td>
                <td>
                    {{ link_to_action('ProductsController@edit', 'Wijzigen', [$supplier->id, $product->id]) }}
                </td>
                <td>
                    @if($product->stocks->count() == 0)
                        <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $product->id }}"></span></a>
                        @include('products._modal')
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
<p>Geen producten gevonden.</p>
@endif
@stop