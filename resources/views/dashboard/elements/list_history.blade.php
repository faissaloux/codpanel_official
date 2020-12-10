<div class="d-flex align-items-center float-right">
    <div class="col-md-12 col-lg-12 text-right">
        @if (!empty($history))
        <div class="card mg-b-30">
            <div class="card-body pd-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>تاريخ</th>
                            <th>العملية</th>
                            <th>من طرف</th>
                            <th>الدور</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($history as $item)
                            <tr>
                                <td>{{ $item->date   }}</td>
                                <td>{{ $item->message }}</td>
                                <td>{{ $item->by  }}</td>
                                <td>{{ $item->role  }}</td>
                            </tr>
                            @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="text-center">قائمة الأحداث فارغة</div>
        @endif
    </div>
</div>