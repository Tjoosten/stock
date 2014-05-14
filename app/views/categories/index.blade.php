@extends('layouts.master')

@section('content')
    <h1>Categories</h1>
    <ol class="breadcrumb">
        <li>
            {{ link_to_action('DashboardController@index', 'Dashboard') }}
        </li>
        <li>
            {{ link_to_action('SuppliersController@index', 'Leveranciers') }}
        </li>
        <li>
            {{ link_to_action('ProductsController@index', $supplier->name, $supplier->id) }}
        </li>
        <li class="active">Categories</li>
    </ol>

    <div class="row">
        {{-- Aanmaken Categorie --}}
        {{-- HTML::link_box(
        "col-md-3",
        "CategoriesController@create",
        "glyphicon-inbox",
        "Toevoegen Categorie",
        "Nieuwe categorie toevoegen",
        [$supplier->id])
        --}}
    </div>

    <div class="row">
        <div class="col-md-6">
            @if($categories->first())
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Actie</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            {{ link_to_action('CategoriesController@edit', 'Wijzigen', [$supplier->id, $category->id]) }}
                        </td>
                        <td>
                            @if(!$category->products->first())
                            <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $category->id }}"></span></a>
                            @include('categories._modal')
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                {{ HTML::unavailable('Er is nog geen categorie aangemaakt.') }}
            @endif
        </div>
        <div class="col-md-6">
            {{ Form::open(array('role' => 'form', 'action' => ['CategoriesController@store', $supplier->id])) }}
                @include('categories._form')
            {{ Form::close() }}
        </div>
    </div>
@stop