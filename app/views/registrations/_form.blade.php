{{-- Form::hidden('stock_id[]', $stock->id) --}}
{{ Form::checkbox('stock_id[]', $stock->id, true, ['class' => 'hidden']) }}
{{ Form::hidden('customer_id', $customer->id) }}

<div class="form-group" id="radioGroup" data-toggle="buttons">
    <div class="btn-group setDescription">
        <label class="btn btn-codivex">
            {{ Form::radio('status', '1') }} Checkin
        </label>
        <label class="btn btn-codivex">
            {{ Form::radio('status', '3') }} Checkin herstelling
        </label>
        <label class="btn btn-codivex">
            {{ Form::radio('status', '2') }} Checkout klant
        </label>
        <label class="btn btn-codivex">
            {{ Form::radio('status', '8') }} Checkout leverancier
        </label>
        {{--<label class="btn btn-codivex">
            {{ Form::radio('status', '7') }} Forward
        </label>--}}
        <label class="btn btn-codivex">
            {{ Form::radio('status', '6') }} Opmerking
        </label>
    </div>
    <div class="btn-group">
        <label class="btn btn-codivex" id="productChange">
            {{ Form::radio('status', '4') }} Product vervanging
        </label>
        <label class="btn btn-codivex" id="productMove">
            {{ Form::radio('status', '5') }} Overname
        </label>
    </div>
</div>

<div class="form-group" id="toFactory">
    {{ Form::select('toFactory', ['' => 'Kies klant'] + $customers, null, ['class' => 'form-control input-lg hidden']) }}
</div>

<div class="form-group" id="serialNumber">
    {{ Form::text('serialNumber', $stock->serialNumber, array('class' => 'form-control input-lg hidden', 'placeholder' => 'Serial number')) }}
</div>

<div class="form-group">
    {{ Form::textarea('description', null, ['class' => 'form-control input-lg description', 'placeholder' => 'Beschrijving', 'rows' => '2']) }}
</div>

{{ Form::bt_button("Register", array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '4')) }}