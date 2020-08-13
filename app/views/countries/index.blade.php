@extends('layouts.master')

@section('content')
<h1>Landen</h1>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li class="active">Land</li>
</ol>

<div class="row">
    <div class="col-md-6">
        @if($countries->first())
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Landcode</th>
                <th>Actie</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($countries as $country)
            <tr>
                <td>
                    {{ $country->name }}
                </td>
                <td>
                    {{ $country->country_code }}
                </td>
                <td>
                    {{ link_to_action('CountriesController@edit', 'Wijzigen', $country->id) }}
                </td>
                <td>
                    @if($country->suppliers->count() <= 0 and $country->customers->count() <= 0)
                        <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $country->id }}"></span></a>
                        @include('countries._modal')
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@stop
