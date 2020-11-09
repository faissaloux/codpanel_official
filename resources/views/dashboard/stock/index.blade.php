@extends('dashboard/layout')

@section('content')
<div class="d-flex flex-column bg-white pt-4">
    <div class="d-flex justify-content-between align-items-center pr-4 pl-4">
        <h3 class="header-title">المخزون</h3>
        <div class="d-flex justify-content-around">
            <div class="btn-group btn-top d-flex justify-content-end add-stock-btn btn-action-sm-box" role="group">
                <a href="#" class="btn btn-primary d-flex col border-none">
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
                <a href="#" class="btn btn-primary d-flex col-12 border-none">
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
                <a href="#" class="btn btn-primary d-flex col-12 border-none">
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
            <a type="button">المتبقي</a>
        </div>
        <div class="ml-4 btn py-0">
            <a type="button">
                <span>الخروج</span>
                <span class="quantity">0</span>
            </a>
        </div>
        <div class="ml-4 btn py-0">
            <a type="button">
                <span>الدخول</span>
                <span class="quantity">0</span>
            </a>
        </div>
    </div>
</div>
<div class="page-inner">
    <div class="d-flex flex-column">
        <div class="col-12 mt-3">
            <div class="card-body pd-0 tx-center">
                <table class="table table-primary tx-right">
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
                        <tr height="50">
                            <th scope="row"><input type="checkbox"/></th>
                            <td data-type="product">
                                <span>آخــر صــيـحـات القبعة والمـعـطـف السـاخــن NOIR</span>
                            </td>
                            <td data-type="enter">
                                <span>711</span>
                            </td>
                            <td data-type="exit">
                                <span>697
                            </td>
                            <td data-type="last">
                                <span>14
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection