@extends('dashboard/layout')

@section('title')
    Stock | {{ env('APP_NAME') }}
@endsection

@section('content')
<div class="d-flex flex-column bg-white pt-4">
    <div class="d-flex justify-content-between align-items-center pr-4 pl-4">
        <h3 class="header-title">المخزون</h3>
        <div class="d-flex justify-content-around">
            <div class="btn-group btn-top d-flex justify-content-end add-stock-btn btn-action-sm-box" role="group">
                <a  href="#"
                    class="btn btn-primary d-flex col border-none"
                    id="addNewStock"
                    data-link="{{ route('dashboard.stock.create') }}">
                    <span class="d-flex justify-content-center add-new-icon">
                        <i class="mdi mdi-plus d-flex align-items-center text-white"></i>
                    </span>
                    <span   class="add-new-text"
                            data-toggle="modal"
                            data-target="#addToStockModalCenter">
                        إضافة السلعة للمخزون
                    </span>
                </a>
            </div>
            <div class="btn-group btn-top d-flex justify-content-center mx-2 return-btn btn-action-sm-box" role="group">
                <a  href="#"
                    class="btn btn-primary d-flex col-12 border-none"
                    id="returnStock"
                    data-link="{{ route('dashboard.stock.return') }}">
                    <span class="d-flex justify-content-center add-new-icon">
                        <i class="mdi mdi-keyboard-backspace d-flex align-items-center text-white"></i>
                    </span>
                    <span   class="add-new-text"
                            data-toggle="modal"
                            data-target="#returnStockModalCenter">
                        Retour
                    </span>
                </a>
            </div>
            <div class="btn-group btn-top d-flex justify-content-end export-stock-btn btn-action-sm-box" role="group">
                <a  href="#"
                    class="btn btn-primary d-flex col-12 border-none"
                    id="exportStock"
                    data-link="{{ route('dashboard.stock.export') }}">
                    <span class="d-flex justify-content-center add-new-icon">
                        <i class="mdi mdi-export d-flex align-items-center text-white"></i>
                    </span>
                    <span   class="add-new-text"
                            data-toggle="modal"
                            data-target="#exportStockModalCenter">
                        تصدير السلعة من المخزون
                    </span>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end bg-grey bt1 bb1 p-2">
        <div class="ml-4 btn py-0">
            <a type="button">Retour</a>
        </div>
        <div class="ml-4 btn py-0">
            <span>المتبقي</span>
            <span class="quantity">{{ $nots['entree'] - $nots['sortie'] }}</span>
        </div>
        <div class="ml-4 btn py-0">
            <a type="button">
                <span>الخروج</span>
                <span class="quantity">{{ $nots['sortie'] }}</span>
            </a>
        </div>
        <div class="ml-4 btn py-0">
            <a type="button">
                <span>الدخول</span>
                <span class="quantity">{{ $nots['entree'] }}</span>
            </a>
        </div>
    </div>
</div>
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