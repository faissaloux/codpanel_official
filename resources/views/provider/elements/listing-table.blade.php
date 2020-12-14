<table class="table table-primary table-hover">
    <thead>
        <tr>
            <th scope="col"><input type="checkbox"/></th>
            <th scope="col" data-type="requestId" class="toggle-col active">
                رقم
            </th>
            <th scope="col" data-type="requestDate" class="toggle-col active">
                تاريخ الإنشاء
            </th>
            <th scope="col" data-type="requestStatus" class="toggle-col active">
                حالة الطلب
            </th>
            <th scope="col" data-type="name" class="toggle-col active">
                الإسم
            </th>
            <th scope="col" data-type="phone" class="toggle-col active">
                الهاتف
            </th>
            <th scope="col" data-type="products" class="toggle-col active">
                مجموج المنتوجات
            </th>
            <th scope="col" data-type="employee" class="toggle-col active">عميل <br class="sm-break">الإتصال</th>
            <th scope="col" data-type="provider" class="toggle-col active">
                مندوب<br class="sm-break"> التوصيل
            </th>
            <th scope="col">التفاصيل</th>
        </tr>
    </thead>
    <tbody class="table-body-listing">
        @foreach($lists as $list)
            <tr class="{{ 'list_'.$list->id }}" >
                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                <td data-type="requestId" class="tx-right toggle-col active">
                    {{ '#'.$list->id }}
                </td>
                <td data-type="requestDate" class="tx-right toggle-col active">
                    {{ $list->created_at }}
                </td>
                <td data-type="requestStatus" class="tx-right toggle-col active">
                    {{ $list->status }}<br/>
                </td>
                <td data-type="name" class="toggle-col active">
                    {{ $list->name }}
                </td>
                <td data-type="phone" class="toggle-col active">
                    <a href="tel: {{ $list->phone }}">{{ $list->phone }}</a>
                </td>
                <td data-type="products" class="toggle-col active">
                    {{ $list->total() }} درهم
                  </td>
                <td data-type="employee" class="toggle-col active">
                    {{ $list->employee->name }}
                </td>
                <td data-type="provider" class="toggle-col active">
                    {{ $list->provider->name }}
                </td>
                <td class="active">
                    <a type="button" 

                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white details showdetails"
                        data-link="{{ route('provider.load' , ['id' => $list->id ]) }}">

                        التفاصيل
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