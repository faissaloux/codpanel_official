<table class="table table-primary table-hover">
    <thead>
        <tr>
            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
            <th scope="col" class="arabic" data-type="city">المدينة</th>
            <th scope="col" class="arabic" data-type="reference">الرمز</th>
            <th scope="col" class="arabic" data-type="provider">الموزع</th>
            <th scope="col" class="arabic">تعديل</th>
        </tr>
    </thead>
    <tbody class="table-body-listing">
        @foreach($cities as $city)
            <tr>
                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                <td data-type="city">
                    <span>{{ $city->name }}</span>
                </td>
                <td data-type="reference">
                    <span>{{ $city->reference }}</span>
                </td>
                <td data-type="provider">
                    <span>{{ $city->provider->name }}</span>
                </td>
                <td>
                    <a  type="button"
                        data-link="{{ route('dashboard.cities.edit' , ['id' => $city->id ]) }}"
                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit editcitymodal">
                        تعديل
                    </a>
                    <a  type="button"
                        href="{{ route('dashboard.cities.delete' , ['id' => $city->id ]) }}"
                        class="btn btn-danger btn-lg border-none loadactions rounded-custom text-white delete">
                        حذف
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<nav aria-label="Page navigation example">
    <ul class="justify-content-center paginate">
        {!! $cities->links() !!}
    </ul>
</nav>