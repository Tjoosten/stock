<div class="row">
    <div class="col-md-10">
        {{ Form::bt_text('search', null, null, array('class' => 'input-lg', 'placeholder' => 'Search', 'tabindex' => '1')) }}
    </div>
    <div class="col-md-2">
        {{ Form::bt_button('Zoek', array('class' => 'btn-pack btn-block btn-lg', 'tabindex' => '2')) }}
    </div>
</div>