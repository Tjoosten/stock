{{ Form::open(array('action' => array('CountriesController@destroy', $country->id), 'method' => 'delete')) }}
<div class="modal fade delete-{{ $country->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verwijderen: {{ $country->name }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    Het land {{ $country->name }} wordt verwijdert uit het systeem.
                </p>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                {{ Form::bt_button('Verwijder Land', array('class' => 'btn-danger btn-block')) }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ Form::close() }}