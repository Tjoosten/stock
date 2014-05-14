{{ Form::bt_text('name', null, null, array('class' => 'input-lg', 'placeholder' => 'Product naam', 'tabindex' => '1')) }}
{{ Form::bt_text('itemNumber', null, null, array('class' => 'input-lg', 'placeholder' => 'Artikel Number', 'tabindex' => '2')) }}

<div class="form-group">
    <div class="row">
        <div class="col-md-2">
            {{ Form::label('category_id', 'Product groep:') }}
        </div>
        <div class="col-md-10">
            {{ Form::select('category_id', $dropdown, null, array('class' => 'form-control input-lg', 'tabindex' => '3')) }}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-2">
            {{ Form::label('defaultWarranty', 'Standaard garantie') }}
        </div>
        <div class="col-md-10">
            {{ Form::input('number', 'defaultWarranty', Request::is('*/create') ? 0 : null, ['class' => 'form-control input-lg', 'tabindex' => '4']) }}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-2">
            {{ Form::label('tarrifCode', 'Tariff code') }}
        </div>
        <div class="col-md-10">
            {{ Form::text('tariffCode', null, ['class' => 'form-control input-lg', 'placeholder' => 'Tariff code', 'tabindex' => '5']) }}
        </div>
    </div>
</div>

{{ Form::bt_button(Request::is('*/create') ? 'Toevoegen' : 'Wijzigen', array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '6')) }}