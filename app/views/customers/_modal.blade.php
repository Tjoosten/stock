{{ Form::open(array('action' => array('CustomersController@destroy', $customer->id), 'method' => 'delete')) }}
<div class="modal fade delete-{{ $customer->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verwijderen: {{ $customer->name }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    U staat op het punt de volgende klant te verwijderen.
                </p>
                <dl class="dl-horizontal">
                    <dt>Leverancier</dt>
                    <dd>{{ $customer->name }}</dd>

                    <dt>Address</dt>
                    <dd>{{ $customer->address }}</dd>

                    <dt></dt>
                    <dd>{{ $customer->postal_code . ' ' . $customer->city }}</dd>
                </dl>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                {{ Form::bt_button('Verwijder Klant', array('class' => 'btn-danger btn-block')) }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ Form::close() }}