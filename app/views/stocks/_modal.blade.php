{{ Form::open(array('action' => array('StocksController@destroy', $customer->id, $product->id), 'method' => 'delete')) }}
<div class="modal fade delete-{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verwijderen: {{ $product->name }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    U staat op het punt het volgende product te verwijderen.
                </p>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                {{ Form::bt_button('Verwijder Product', array('class' => 'btn-danger btn-block')) }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ Form::close() }}