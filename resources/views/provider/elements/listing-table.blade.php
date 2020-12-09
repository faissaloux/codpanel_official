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
        {{ $list->status }}<br/>
    </td>
    <td data-type="name">
        {{ $list->name }}
    </td>
    <td data-type="phone">
        <a href="tel: 06########">{{ $list->tel }}</a>
    </td>
    <td data-type="products">
        <table class="list_products">
            <tbody>
                <tr>
                    <td> x {{ $list->quantity }} </td>
                    <td> {{ $list->product }} </td>
                </tr>
                <tr>
                    <td colspan="2">المجموع : {{ $list->price }}</td>
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
            data-link="{{ route('provider.load' , ['id' => $list->id ]) }}">

            التفاصيل
        </a>
    </td>
</tr>
@endforeach