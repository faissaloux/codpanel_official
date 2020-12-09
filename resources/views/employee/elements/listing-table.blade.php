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
            قيد المعالجة<br/>
        </td>
        <td data-type="name">
            {{ $list->name }}
        </td>
        <td data-type="phone">
            <a href="tel: {{ $list->tel }}">{{ $list->tel }}</a>
        </td>
        <td data-type="products">
            <table class="list_products">
                <tbody>
                    <tr>
                        <td> 1 </td>
                        <td> x كيطمات رائعة </td>
                    </tr>
                    <tr>
                        <td colspan="2">المجموع : 249 درهم</td>
                    </tr>
                </tbody>
            </table>
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