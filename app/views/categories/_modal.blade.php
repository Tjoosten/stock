{{ Form::open(array('action' => array('CategoriesController@destroy', $supplier->id, $category->id), 'method' => 'delete')) }}
<div class="modal fade delete-{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Verwijderen: {{ $category->name }}</h4>
            </div>
            <div class="modal-body">
                <p>
                    De category word uit het systeem verwijdert.
                </p>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                {{ Form::bt_button('Verwijder category', array('class' => 'btn-danger btn-block')) }}
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{ Form::close() }}