<table class="table table-primary table-hover tx-right">
    <thead>
        <tr>
            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
            <th scope="col" class="arabic" data-type="product">المنتوج [REF]</th>
            <th scope="col" class="arabic" data-type="enter">الدخول</th>
            <th scope="col" class="arabic" data-type="exit">الخروج</th>
            <th scope="col" class="arabic" data-type="last">المتبقي</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr height="50">
                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                <td data-type="product">
                    <span>{{ $product->name }}</span>
                </td>
                <td data-type="enter">
                    <span>{{ $product->enter }}</span>
                </td>
                <td data-type="exit">
                    <span>{{ $product->paid }}</span>
                </td>
                <td data-type="last">
                    <span>{{ $product->enter - $product->paid }}</span>
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