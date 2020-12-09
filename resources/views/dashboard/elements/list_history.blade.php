<div class="d-flex align-items-center float-right">
    <div class="col-md-12 col-lg-12 text-right">
        <div class="card mg-b-30">
            <div class="card-body pd-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>تاريخ</th>
                            <th>العملية</th>
                            <th>من طرف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $ht)
                        <tr>
                            <td>{{ $ht->displayHistory()->date  }}</td>
                            <td>{{ $ht->displayHistory()->message }}</td>
                            <td>{{ $ht->displayHistory()->by }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>