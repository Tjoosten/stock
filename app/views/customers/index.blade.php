@extends('layouts.master')

@section('content')
<h2>Klanten</h2>
<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li class="active">Klanten</li>
</ol>

<div class="row">
    {{-- Create Customer --}}
    {{ HTML::link_box('col-md-3', 'CustomersController@create', "glyphicon-user", "Klant Toevoegen", "Als er een nieuwe klant bijkomt met elk zijn toestellen.") }}
    {{-- Country Management --}}
    {{ HTML::link_box('col-md-3', 'CountriesController@index', "glyphicon-plane", "Beheer Landen", "Als men een land wilt toevoegen") }}
    {{-- Partnership Management --}}
    {{ HTML::link_box('col-md-3', 'PartnershipsController@index', "glyphicon-flag", "Beheer Venootschappen", "toevoegen van venootschap") }}
</div>
<div class="clearfix"></div>
<hr/>

{{ Form::open(array('role' => 'form', 'action' => 'SearchController@postSearchCompany')) }}
    @include('search._form')
{{ Form::close() }}

<table class="table table-hover">
    <thead>
        <tr>
            <th>
                {{ sort_by('CustomersController@index', 'name', 'Naam') }}
            </th>
            <th>
                {{ sort_by('CustomersController@index', 'address', 'Adres') }}
            </th>
            <th>
                {{ sort_by('CustomersController@index', 'postalcode', 'Postcode') }}
            </th>
            <th>
                {{ sort_by('CustomersController@index', 'city', 'Stad') }}
            </th>
            <th>
                Land
            </th>
            <th>
                {{ sort_by('CustomersController@index', 'btw', 'BTW') }}
            </th>
            <th>Actie</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>
                    @if(isset($customer->partnership->name))
                        {{ link_to_action('StocksController@index', $customer->name . ' ' .$customer->partnership->name, $customer->id) }}
                    @else
                        {{ link_to_action('StocksController@index', $customer->name, $customer->id) }}
                    @endif
                </td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->postalcode }}</td>
                <td>{{ $customer->city }}</td>
                <td>{{ $customer->country->country_code }}</td>
                <td>{{ $customer->btw }}</td>
                <td>
                    {{ link_to_action('CustomersController@edit', 'Wijzigen', $customer->id) }}
                </td>
                <td>
                    @if($customer->stocks->count() == 0)
                        <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $customer->id }}"></span></a>
                        @include('customers._modal')
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $customers->links() }}
@stop