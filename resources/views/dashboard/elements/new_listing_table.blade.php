<table class="table table-primary table-hover">
    <thead>
        <tr>
            <th scope="col">
                <div class="mg-l-15 d-flex custom-control custom-checkbox">
                    <input type="checkbox" class="show-actions-menu custom-control-input" id="checkAll">
                    <label class="custom-control-label" for="checkAll"></label>
                </div>
            </th>
            <th scope="col" data-type="requestId">
                رقم
            </th>
            <th scope="col" data-type="requestDate">
                تاريخ الإنشاء
            </th>
            <th scope="col" data-type="requestStatus">
                حالة الطلب
            </th>
            <th scope="col" data-type="name">
                الإسم
            </th>
            <th scope="col" data-type="phone">
                الهاتف
            </th>
            <th scope="col" data-type="products">
                مجموج المنتوجات
            </th>
            <th scope="col" data-type="employee">عميل الإتصال</th>
            <th scope="col" data-type="distributor">
                مندوب التوصيل
            </th>
            <th scope="col">تعديل</th>
        </tr>
    </thead>
    <tbody class="table-body-listing">
        @foreach($lists as $list)
            <tr class="{{ 'list_'.$list->id }}" >
                <th scope="row">
                    <div class="mg-l-15 d-flex custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input check" data-item="{{ $list->id }}" id="{{'customCheck1'.$list->id}}">
                        <label class="custom-control-label" for="{{'customCheck1'.$list->id}}"></label>
                    </div>
                </th>
                <td data-type="requestId" class="tx-right">
                    {{ '#'.$list->id }}
                </td>
                <td data-type="requestDate" class="tx-right">
                    {{ $list->created_at }}
                </td>
                <td data-type="requestStatus" class="tx-right">
                    {{ $list->status }}<br/>
                </td>
                <td data-type="name">
                    {{ $list->name }}
                </td>
                <td data-type="phone">
                    <a href="tel: {{ $list->phone }}">{{ $list->phone }}</a>
                </td>
                <td data-type="products">
                    {{ $list->total() }} درهم
                </td>
                <td data-type="employee">
                    {{ $list->employee->name }}
                </td>
                <td data-type="distributor">
                    {{ $list->provider->name }}
                </td>
                <td>
                    <a type="button" 

                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white details showhistory"
                        data-link="{{ route('dashboard.listing.history' , ['id' => $list->id ]) }}">

                        الأحداث
                    </a>
                    <a type="button" 

                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white details showdetails"
                        data-link="{{ route('dashboard.listing.load' , ['id' => $list->id ]) }}">

                        التفاصيل
                    </a>
                    <a  type="button"
                        href="javascript:;"
                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit editlist"
                        data-link="{{ route('dashboard.listing.edit' , ['id' => $list->id ]) }}">
                        تعديل
                    </a>
                    <a  type="button"
                        href="javascript:;"
                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white delete deleteList"
                        data-id="{{ $list->id }}"
                        data-link="{{ route('dashboard.listing.delete' , ['id' => $list->id ]) }}">
                        حذف
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="justify-content-center paginate">
        {!! $lists->links() !!}
    </ul>
</nav>