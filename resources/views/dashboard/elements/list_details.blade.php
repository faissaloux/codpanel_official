<div class="modal-cont modal-top mb-3 float-right">
    <div class="d-flex flex-column">
        <p class="row">
            <span class="col-3 text-right">اسم العميل</span>
        <span class="col text-right">{{ $list->name }}</span>
        </p>
        <p class="row">
            <span class="col-3 text-right">رقم الهاتف</span>
            <span class="col text-right">{{ $list->tel }}</span>
        </p>
        <p class="row">
            <span class="col-3 text-right">العنوان</span>
            <span class="col text-right">{{ $list->adress }}</span>
        </p>
        <p class="row">
            <span class="col-3 text-right">المدينة</span>
            <span class="col text-right">{{ $list->city }}</span>
        </p>
        <p class="row">
            <span class="col-3 text-right">المصدر</span>
            <span class="col text-right">{{ $list->source }}</span>
        </p>
        <p class="row">
            <span class="col-3 text-right">المنتوج</span>
            <span class="col text-right">{{ $list->items }}</span>
        </p>
        <p class="row">
            <span class="col-3 text-right">الكمية</span>
            <span class="col text-right">{{ $list->quantity }}</span>
        </p>
        <p class="row">
            <span class="col-3 text-right">الثمن</span>
            <span class="col text-right">{{ $list->price }}</span>
        </p>
        <p class="row">
            <span class="col text-right">الملاحظة</span>
            <span class="col">{{ $list->statue }}</span>
        </p>
    </div>
    <div class="col-md-12 col-lg-12 text-right">
        <div class="card mg-b-30">
            <div class="card-body pd-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>المنتوج</th>
                            <th>الكمية</th>
                            <th>الثمن</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kit Voiture X6</td>
                            <td>1</td>
                            <td>199.99</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<div class="col-md-12 col-lg-12 text-center chnage_statue" data-id="{{ $list->id }}" data-link="{{ route('dashboard.listing.statue' , ['id' => $list->id ]) }}">
        <a href="javascript:;" data-type="unanswered" class="btn btn-primary rounded ">لا يجيب</a>
        <a href="javascript:;" data-type="recall" class="btn btn-primary rounded ">إعادة الإتصال</a>
        <a href="javascript:;" data-type="canceled" class="btn btn-primary rounded ">ملغى</a>
        <a href="javascript:;" data-type="confirmed" class="btn btn-primary rounded ">تأكيد</a>
    </div>
</div>