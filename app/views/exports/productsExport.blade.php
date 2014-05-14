
    <table class="table table-hover">
        <thead>
        <th>Leverancier</th>
        <th>Productgroep</th>
        <th>Type</th>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{{ $d->supplier->name }}}</td>
                <td>{{{ $d->category->name }}}</td>
                <td>{{{ $d->name }}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>