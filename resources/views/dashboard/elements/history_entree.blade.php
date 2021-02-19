<table class="table table-striped datatable entreetable text-right">
    <thead>
        <tr>
            <th><b> التاريخ </b></th>
            <th><b> المنتوج </b></th>
            <th><b> ملاحظة </b></th>
            <th><b> الكمية </b></th>
            <th><b> تأكيد  </b></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->note }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->valid }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
