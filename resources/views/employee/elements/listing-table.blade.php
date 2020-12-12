<table class="table table-primary table-hover">
    <thead>
        <tr>
            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
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
                المنتوجات
            </th>
            <th scope="col" data-type="employee">عميل <br>الإتصال</th>
            <th scope="col" data-type="distributor">
                مندوب<br> التوصيل
            </th>
            <th scope="col">تعديل</th>
        </tr>
    </thead>
    <tbody class="table-body-listing">
        @foreach($lists as $list)
            <tr class="{{ 'list_'.$list->id }}" >
                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                <td data-type="requestId" class="tx-right">
                    {{ '#'.$list->id }}
                </td>
                <td data-type="requestDate" class="tx-right">
                    {{ $list->created_at }}
                </td>
                <td data-type="requestStatus" class="tx-right">
                    {{ $list->status }}
                </td>
                <td data-type="name">
                    {{ $list->name }}
                </td>
                <td data-type="phone">
                    <a href="tel: {{ $list->phone }}">{{ $list->phone }}</a>
                </td>
                <td data-type="products">
                    {{ $list->total() }}
                  </td>
                <td data-type="employee">
                    {{ $list->employee->name }}
                </td>
                <td data-type="distributor">
                    {{ $list->provider->name }}
                </td>
                <td>
                    <a type="button" 

                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white details showdetails"
                        data-link="{{ route('employee.load' , ['id' => $list->id ]) }}">

                        التفاصيل
                    </a>
                    <a  type="button"
                        href="javascript:;"
                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit editlist"
                        data-link="{{ route('employee.edit' , ['id' => $list->id ]) }}">
                        تعديل
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="justify-content-center paginate {{ $view ?? null ? '' : 'paginatepost'  }}">
        {!! $lists->links() !!}
    </ul>
</nav>