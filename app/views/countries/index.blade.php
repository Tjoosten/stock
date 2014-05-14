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
        @else
        {{ HTML::unavailable('Er is nog geen land aangemaakt.') }}
        @endif
    </div>
    <div class="col-md-6">
        {{ Form::open(array('role' => 'form', 'action' => 'CountriesController@store')) }}
            @include('countries._dropdown')
            {{ Form::bt_button('Toevoegen', array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '2')) }}
            {{ Form::hidden('name', null, ['id' => 'countryName']) }}
        {{ Form::close() }}
    </div>
</div>
@stop

@section('scripts')
    <script>
        (function(){
            updateHidden();

            $('#country_code').change(function(){
                updateHidden();
            });

            function updateHidden()
            {
                $('#countryName').val($('#country_code option:selected').text());
                console.log($('#countryName').text());
            }
        })();
    </script>
@stop