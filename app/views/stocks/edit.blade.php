@extends('layouts.master')

@section('content')
<h2>{{ $customer->name }}: Product toevoegen</h2>

<ol class="breadcrumb">
    <li>
        {{ link_to_action('DashboardController@index', 'Dashboard') }}
    </li>
    <li>
        {{ link_to_action('CustomersController@index', 'Klanten') }}
    </li>
    <li>
        {{ link_to_action('StocksController@index', $customer->name, $customer->id) }}
    </li>
    <li class="active">Edit</li>
</ol>

{{ Form::model($product, array('role' => 'form', 'method' => 'PUT', 'action' => ['StocksController@update', $customer->id, $product->id])) }}
@include('stocks._form')
{{ Form::close() }}

<div class="pull-right">
    {{ link_to_action('StocksController@index', 'Terugkeren naar Klanten', $customer->id) }}
</div>
<div class="clearfix"></div>
@stop

@section('scripts')
<script>
    (function(){
        querySupplier();
        //changeWarranty();

        $("#supplier_picker").change(function(){
            querySupplier();
        });

        $('#products_picker').change(function(){
            changeWarranty();
        });

        function querySupplier()
        {
            var supp_id = $("#supplier_picker").val();
            $.post("{{ action('ApiController@postProducts') }}", { supplier_id: supp_id })
                .success(function(data){
                    $('#products_picker').html('');
                    $.each(data.products, function(key, value){
                        $('#products_picker').append($("<option></option>")
                            .attr("value",value.id)
                            .attr("data-warranty", value.warranty)
                            .text(value.type));
                    });

                    @if($product->product_id)
                    $('#products_picker').val("{{ $product->product_id }}");
                    @endif

                    //changeWarranty();
                })
                .fail(function(){
                    $('#products_picker').html('');
                });
        }

        function changeWarranty(){
            var product = $('#products_picker option:selected').data('warranty');
            $('#warranty').val(product);
        }
    })()
</script>
@stop