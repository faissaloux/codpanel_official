@extends('dashboard/layout')

@section('title')
    Stock | {{ env('APP_NAME') }}
@endsection

@section('content')

<div class="d-flex flex-column bg-white pt-4">
    <div class="d-flex justify-content-between align-items-center pr-4 pl-4">
        <h3 class="header-title">المستودع</h3>
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

<!-- Main content -->
<div class="content-wrapper p-4">

<!-- Content area -->
    <div class="content">

    <div class="panel panel-flat">

                <div class="panel-body text-center">

                    <div class="table-responsive tablodyali">
                    
                    
                        <table class="table table-striped datatable sortietable" >
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
        
            @if( !empty($sortie) )
                <div class="panel panel-flat">

                    <div class="panel-body text-center">

                        <div class="table-responsive tablodyali">
                        
                        <div class="panel panel-flat">
                            <table class="table table-striped datatable userstable" >
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