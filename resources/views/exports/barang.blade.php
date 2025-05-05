<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barang as $invoice)
        <tr>
            <td>{{ $invoice->name }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
