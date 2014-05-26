<h2>Klant Gegevens</h2>
<div class="row">
    <div class="col-md-8">
        {{ Form::bt_text('name', null, null, array('class' => 'input-lg', 'placeholder' => 'Klant naam', 'tabindex' => '1')) }}
    </div>
    <div class="col-md-2">
        {{ Form::select('partnership_id', ['default' => 'Vennootschap'] + $partnerships, null, array('class' => 'form-control input-lg', 'tabindex' => '2')) }}
    </div>
    <div class="col-md-2">
        {{ Form::bt_text('customerNumber', null, null, array('class' => 'input-lg', 'placeholder' => 'Klant nummer', 'tabindex' => '3')) }}
    </div>
</div>

<h2>Adres Gegevens</h2>
<div class="row">
    <div class="col-md-8">
        {{ Form::bt_text('address', null, null, array('class' => 'input-lg', 'placeholder' => 'Straat', 'tabindex' => '4')) }}
    </div>
    <div class="col-md-2">
        {{ Form::bt_text('housenumber', null, null, array('class' => 'input-lg', 'placeholder' => 'Huisnummer', 'tabindex' => '5')) }}
    </div>
    <div class="col-md-2">
        {{ Form::bt_text('busnumber', null, null, array('class' => 'input-lg', 'placeholder' => 'Busnummer', 'tabindex' => '6')) }}
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {{ Form::bt_text('city', null, null, array('class' => 'input-lg', 'placeholder' => 'Stad', 'tabindex' => '7')) }}
    </div>
    <div class="col-md-4">
        {{ Form::bt_text('postalcode', null, null, array('class' => 'input-lg', 'placeholder' => 'Postcode', 'tabindex' => '8')) }}
    </div>
</div>

<div class="form-group">
    {{ Form::select('country_id', $countries, null, array('class' => 'form-control input-lg', 'tabindex' => '9')) }}
</div>

<h2>Betaal gegevens</h2>
{{ Form::bt_text('btw', null, null, array('class' => 'input-lg', 'placeholder' => 'BTW', 'tabindex' => '10')) }}

<h2>Bedrijf Beschrijving <small>optioneel</small></h2>
<div class="form-group">
    {{ Form::textarea('description', null, ['class' => 'form-control input-lg', 'placeholder' => 'Beschrijving', 'tabindex' => '10', 'rows' => '2', 'tabindex' => '11']) }}
</div>
{{ Form::bt_button(Request::is('*/create')? 'Toevoegen' : 'Wijzigen', array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '12')) }}