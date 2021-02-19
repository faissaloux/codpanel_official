@extends('dashboard/layout')

@section('title')
    Stock | {{ env('APP_NAME') }}
@endsection

@section('content')

@include('dashboard.stock.inc.header')

<div class="page-inner">
    <div class="d-flex flex-column">
        <div class="col-12 mt-3">
            <!-- spinner -->
            <center class="mt-2 ">
                <div class="spinner-loader-container d-table">
                    <div class="spinner-loader d-table-cell align-middle">
                        <div class="spinner-border mb-2 text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </center>
            <!-- End spinner -->

            <div class="card-body pd-0 tx-center load-table">
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
                                    <span>{{ $product['product_name'] }}</span>
                                </td>
                                <td data-type="enter">
                                    <span>{{ $product['total_entree'] }}</span>
                                </td>
                                <td data-type="exit">
                                    <span>{{ $product['total_sortie'] }}</span>
                                </td>
                                <td data-type="last">
                                    <span>{{ $product['rest'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="justify-content-center paginate">
                        {{-- {!! $products->links() !!} --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection