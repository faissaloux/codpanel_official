<table class="table table-primary table-hover">
    <thead>
        <tr>
            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
            <th scope="col" data-type="avatar"></th>
            <th scope="col" class="arabic" data-type="reference">Reference</th>
            <th scope="col" class="arabic" data-type="product">اسم المنتوج</th>
            <th scope="col" class="arabic" data-type="prix_jmla">سعر الجملة</th>
            <th scope="col" class="arabic">تعديل</th>
        </tr>
    </thead>
    <tbody class="table-body-listing">
        @foreach($products as $product)
            <tr>
                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                <td data-type="image">
                    @if(!empty ( $product->image ))  
                        <div class="avatar mr-2 img-cont">
                            <img src="/uploads/{{$product->image}}" class="rounded-circle" alt="">
                        </div>
                    @else
                        <div class="avatar mr-2 img-cont">
                            <span style="background-color: {{ $product->color() }}" class="avatar-initial rounded-circle">{{ Str::limit($product->name, 1 , "") }}</span>
                        </div>
                    @endif
                </td>
                <td data-type="reference">
                    <span>{{ $product->reference }}</span>
                </td>
                <td data-type="product">
                    <span>{{ $product->name }}</span>
                </td>
                <td data-type="prix_jmla">
                    <span>{{ $product->prix_jmla }}</span>
                </td>
                <td>
                    <a  type="button"
                        href="{{ route('dashboard.products.edit' , ['id' => $product->id ]) }}"
                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit">
                        تعديل
                    </a>
                    <a  type="button"
                        href="{{ route('dashboard.products.delete' , ['id' => $product->id ]) }}"
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
        {!! $products->links() !!}
    </ul>
</nav>