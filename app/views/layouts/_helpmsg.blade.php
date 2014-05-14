@if(Session::get('success'))
<div class="alert alert-success fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Succes:</strong> {{ Session::get('success') }}
</div>
@endif

@if(Session::get('errors'))
<div class="alert alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <ul>
        @foreach ($errors->all('<li>:message</li>') as $error)
        {{ $error }}
        @endforeach
    </ul>
</div>
@endif