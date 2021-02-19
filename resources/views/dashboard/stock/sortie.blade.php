@extends('dashboard/layout')

@section('title')
    Stock | {{ env('APP_NAME') }}
@endsection

@section('content')

@include('dashboard.stock.inc.header')

<div class="content-wrapper p-4">

    <div class="content">
        @if( count($HistorySortie) > 0 )
            <div class="panel panel-flat">
                <div class="panel-body text-center">
                    <div class="table-responsive tablodyali">
                        <table class="table table-primary table-striped datatable sortietable" >
                            <thead>
                                <tr>
                                    <th><b> التاريخ </b></th>
                                    <th><b> المنتوج [REF] </b></th>
                                    <th><b> ملاحظة </b></th>
                                    <th><b> الكمية </b></th>
                                    <th style="width:150px;"><b> تأكيد  </b></th>
                                    <th><b> رؤية التفاصيل  </b></th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach( $HistorySortie as $item )
                                    <tr>
                                        <td >N-A</td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>N-A</td>
                                        <td>{{ $item->sum_quantity }}</td>
                                        <td style="width:150px;">{{ $item->sum_valid }} </td>
                                        <td><a  id='loadSortieProductHistory' href="javascript:;" data-product='{{ $item->product->id }}'><i data-feather="eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        <style>
            table.table.table-bordered tr td {
                padding: 3px;
            }
            table.table.table-bordered tr th {
                padding: 3px;
            }
            .entreetable {
                text-align: start;
            }

            .sortietable {
                text-align: start;
            }
        </style>
        
        @if( count($sortie) )
            <div class="panel panel-flat">
                <div class="panel-body text-center">
                    <div class="table-responsive tablodyali">
                        <div class="panel panel-flat">
                            <table class="table table-primary table-striped datatable userstable" >
                                <thead>
                                    <tr>
                                        <th><b> التاريخ </b></th>
                                        <th><b> المنتوج [REF] </b></th>
                                        <th><b> المدينة + الكمية </b></th>
                                        <th><b> الحالة  </b></th>
                                        <th><b> تأكيد  </b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $sortie as $srt )
                                        <tr>
                                            <td>{{ $srt->created_at }}</td>
                                            <td>{{ $srt->product->name }}</td>
                                            <td>
                                                <table class="table table-bordered">
                                                    <th>المدينة</th>
                                                    <th>الكمية</th>
                                                    @foreach($srt->ListQuantities as $listQuantity)
                                                        <tr>
                                                            <td> {{ \App\Cities::find($listQuantity['cityID'])->name }} </td>
                                                            <td> {{ $listQuantity['quantity'] }} </td>
                                                        </tr>
                                                @endforeach
                                                </table>
                                            </td>
                                            <td>
                                                @if( empty($srt->statue) )
                                                    غير مفعل
                                                @else
                                                    تم التفعيل
                                                @endif
                                            </td>
                                            <td>
                                            @if( empty($srt->statue) )
                                                <a  href="javascript:;"
                                                    id='loadProductsList' 
                                                    data-SortieProductID="{{ $srt->product->id }}"
                                                    data-SortieListID="{{ $srt->id }}" 
                                                    data-listProduct='{{ $srt->id }}'
                                                    data-toggle="modal"
                                                    data-target="#editSortieStockModalCenter"
                                                    class="btn btn-primary">تعديل وموافقة
                                                </a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection