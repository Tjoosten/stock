{{ Form::bt_text('name', null, null, array('class' => 'input-lg', 'placeholder' => 'Leveranciers naam', 'tabindex' => '1')) }}
{{ Form::bt_text('address', null, null, array('class' => 'input-lg', 'placeholder' => 'Adres', 'tabindex' => '2')) }}
<div class="row">
    <div class="col-xs-12 col-md-6">
        {{ Form::bt_text('city', null, null, array('class' => 'input-lg', 'placeholder' => 'City', 'tabindex' => '3')) }}
    </div>
    <div class="col-xs-12 col-md-6">
        {{ Form::bt_text('postal_code', null, null, array('class' => 'input-lg', 'placeholder' => 'Postal Code', 'tabindex' => '4')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::select('country_id', $countries, null, array('class' => 'form-control input-lg', 'tabindex' => '5')) }}
</div>
{{ Form::bt_button('Toevoegen', array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '6')) }}