@extends('layouts.master')

@section('content')
<h1>Export</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li class="active">Export</li>
</ol>
{{ HTML::link_box('col-md-3', 'ExportsController@productExport', "glyphicon-print", "Export Producten", "Exporteren van producten naar Excel.") }}
{{ HTML::link_box('col-md-3', 'ExportsController@historyExport', "glyphicon-cloud", "Export Historiek", "Exporteren van historiek naar Excel.") }}
@stop