@if(Request::is('*/edit'))
    <div class="form-group">
        {{ Form::select('supplier_id', ['' => 'Kies Leverancier'] + $supplier, null, array('class' => 'form-control input-lg', 'tabindex' => '1', 'id' => 'supplier_picker', 'disabled')) }}
    </div>
    <div class="form-group">
        {{ Form::select('product_id', [], null, ['class' => 'form-control input-lg', 'tabindex' => '2', 'id' => 'products_picker', 'disabled']) }}
    </div>
@else
    <div class="form-group">
        {{ Form::select('supplier_id', ['' => 'Kies Leverancier'] + $supplier, null, array('class' => 'form-control input-lg', 'tabindex' => '1', 'id' => 'supplier_picker')) }}
    </div>
    <div class="form-group">
        {{ Form::select('product_id', [], null, ['class' => 'form-control input-lg', 'tabindex' => '2', 'id' => 'products_picker']) }}
    </div>
@endif

{{ Form::bt_text('serialNumber', null, null, array('class' => 'input-lg', 'placeholder' => 'Serial nummer', 'tabindex' => '2')) }}

<div class="form-group">
    <div class="row">
        <div class="col-md-2">
            {{ Form::label('warranty', 'Product garantie') }}
        </div>
        <div class="col-md-10">
            {{ Form::input('number', 'warranty', Request::is('*/create') ? 0 : null, ['class' => 'form-control input-lg', 'tabindex' => '3']) }}
        </div>
    </div>
</div>

{{ Form::bt_button(Request::is('*/create') ? 'Toevoegen' : 'Wijzigen', array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '4')) }}