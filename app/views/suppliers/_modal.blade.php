{{ Form::open(array('action' => array('SuppliersController@destroy', $supplier->id), 'method' => 'delete')) }}
    <div class="modal fade delete-{{ $supplier->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Verwijderen: {{ $supplier->name }}</h4>
                </div>
                <div class="modal-body">
                    <p>
                        U staat op het punt de volgende leverancier te verwijderen.
                        Bevestig de keuze door in het tekst veld "<strong>DELETE</strong>" te typen.
                    </p>
                    <dl class="dl-horizontal">
                        <dt>Leverancier</dt>
                        <dd>{{ $supplier->name }}</dd>

                        <dt>Adres</dt>
                        <dd>{{ $supplier->address }}</dd>

                        <dt></dt>
                        <dd>{{ $supplier->postal_code . ' ' . $supplier->city }}</dd>

                        <dt>Land</dt>
                        <dd>{{ $supplier->country->name }}</dd>
                    </dl>
                    <div class="form-group">
                        {{ Form::label('deleteConfirmation', 'Bevestigen:', ['class' => 'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('deleteConfirmation', null, ['class' => 'form-control', 'tabindex' => '1']) }}
                            <span class="help-block">Opgelet: Hoofdletter gevoelig.</span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    {{ Form::bt_button('Verwijder Leverancier', array('class' => 'btn-danger btn-block')) }}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
{{ Form::close() }}