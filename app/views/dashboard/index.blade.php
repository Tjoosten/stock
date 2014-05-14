@extends('layouts.master')

@section('content')
    <h1>Dashboard</h1>

    <div class="row">
        {{ HTML::link_box('col-md-3', 'SuppliersController@index', "glyphicon-print", "Beheer Leveranciers", "Beheren van leveranciers en toevoegen van producten.") }}
        {{ HTML::link_box('col-md-3', 'CustomersController@index', "glyphicon-home", "Beheer Klanten", "Beheren van klanten en productlijsten per bedrijf opvragen.") }}
        {{ HTML::link_box('col-md-3', 'SearchController@index', "glyphicon-search", "Search", "Zoeken van gegevens.") }}
        {{ HTML::link_box('col-md-3', 'ExportsController@index', "glyphicon-download-alt", "Export", "Exporteren van gegevens naar Excel.") }}
    </div>
    <div class="clearfix"></div>
{{--
    <h2>Zoeken</h2>
    {{ Form::open() }}
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Text input">
        </div>
    {{ Form::close() }}

    <table class="table table-hover">
        <thead>
            <th>Type</th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td>Product</td>
                <td>VideoJet</td>
            </tr>
            <tr>
                <td>Company</td>
                <td>VideoJet</td>
            </tr>
        </tbody>
    </table>
--}}
@stop