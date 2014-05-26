<div class="row">
    <div class="col-md-6">
        <h3>Bedrijf</h3>
        <dl class="dl-horizontal">
            <dt>Bedrijf</dt>
            <dd>{{ $customer->name }}</dd>

            <dt>Adres</dt>
            <dd>{{ $customer->address }}</dd>

            <dt>Beschrijving</dt>
            <dd>{{ $customer->description }}</dd>

            <dt>BTW</dt>
            <dd>{{ $customer->btw }}</dd>
        </dl>
    </div>
    <div class="col-md-6">
        <h3>Product</h3>
        <dl class="dl-horizontal">
            <dt>Leverancier</dt>
            <dd>{{ $product->supplier->name }}</dd>

            <dt>Product Groep</dt>
            <dd>{{ $product->category->name or "Geen groep" }}</dd>

            <dt>Type</dt>
            <dd>{{ $product->name }}</dd>

            <dt>Artikel Nummer</dt>
            <dd>{{ $product->itemNumber }}</dd>
            <div class="clearfix"></div>
            <dt>S/N</dt>
            <dd>{{ $stock->serialNumber }}</dd>
        </dl>
    </div>
</div>