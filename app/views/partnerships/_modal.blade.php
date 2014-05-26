{{ Form::open(array('action' => array('PartnershipsController@destroy', $partnership->id), 'method' => 'delete')) }}
<div class="modal fade delete-{{ $partnership->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verwijderen: {{ $partnership->name }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    Het vennootschap {{ $partnership->name }} wordt verwijdert uit het systeem.
                </p>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                {{ Form::bt_button('Verwijder Vennootschap', array('class' => 'btn-danger btn-block')) }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ Form::close() }}