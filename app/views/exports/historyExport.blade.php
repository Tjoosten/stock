<table>
    <thead>
        <th>Supplier</th>
        <th>Product Group</th>
        <th>Type</th>
        <th>S/N</th>
        <th>Transaction</th>
        <th>Date transaction</th>
        <th>Status</th>
        <th>End customer</th>
        <th>End customer location</th>
        <th>Remark</th>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{{ $d->stock->product->supplier->name }}}</td>
                <td>{{{ $d->stock->product->category->name }}}</td>
                <td>{{{ $d->stock->product->name }}}</td>
                <td>{{{ $d->stock->serialNumber }}}</td>
                <td>
                    @if($d->status == "1" or $d->status == "3")
                        IN
                    @else
                        UIT
                    @endif
                </td>
                <td>{{{ $d->created_at }}}</td>
                <td>{{{ Generate::getStatus($d->status) }}}</td>
                <td>{{{ $d->stock->customer->name }}}</td>
                <td>{{{ $d->stock->customer->address }}}</td>
                <td>{{{ $d->description }}}</td>
            </tr>
        @endforeach
    </tbody>
</table>