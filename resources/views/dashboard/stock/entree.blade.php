@extends('dashboard/layout')

@section('title')
    Stock | {{ env('APP_NAME') }}
@endsection

@section('content')

    @include('dashboard.stock.inc.header')

    <style>

        .adminswitch .toggle{
            width: 40px;
            height: 25px;
        }

        .adminswitch .toggle::after{
            width: 17px;
            height: 18px
        }

        .adminswitch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .adminswitch .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .adminswitch .slider::before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: #fff;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .adminswitch .slider.round {
            border-radius: 34px;
        }
    </style>
    <div class="content-wrapper p-4">

        <div class="content">
            @if( count($HistoryEntree) > 0 )
                <div class="panel panel-flat">
                    <table class="table table-primary entreetable text-right">
                        <thead>
                            <tr>
                                <th><b> التاريخ </b></th>
                                <th><b> المنتوج  </b></th>
                                <th><b> ملاحظة </b></th>
                                <th><b> الكمية </b></th>
                                <th style="width:300px;"><b> تأكيد  </b></th>
                                <th><b> رؤية التفاصيل  </b></th>
                            </tr>
                        </thead>
                        <tbody>  
                    
                                
                        @foreach($HistoryEntree as $item)
                            <tr>
                                <td >N-A</td>
                                <td>{{ $item->product->name }}</td>
                                <td>N-A</td>
                                <td>{{ $item->sum_quantity }}</td>
                                <td style="width:300px;">{{ $item->sum_valid}} </td>
                                <td><a href="javascript:;" data-product='{{ $item->product->id }}'><i data-feather="eye"></</i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if( count($stocks) > 0 )
                <div class="panel panel-flat">
                    <table class="table table-primary entreetable text-right" >
                        <thead>
                            <tr>
                                <th><b> التاريخ </b></th>
                                <th><b> المنتوج [REF] </b></th>
                                <th><b> ملاحظة </b></th>
                                <th><b> الكمية </b></th>
                                <th style="width:150px;"><b> تأكيد  </b></th>
                                <th><b> الحالة  </b></th>
                            </tr>
                        </thead>
                        <tbody>  
                
                        @foreach( $stocks as $stock )
                            <tr id="item-{{ $stock->id }}">
                                <td >{{ $stock->created_at }}</td>
                                <td>{{ $stock->product->name }}</td>
                                <td>{{ $stock->note }}</td>
                                <td>{{ $stock->quantity }}</td>
                                <td style="width:150px;">
                                    @if( $stock->statue ==  '1' )
                                        {{ $stock->valid }}
                                    @else
                                        <input  type="number" class="form-control validChange" data-valid='{{ $stock->id }}'>
                                    @endif                           
                                </td>
                                <td>
                                    <label class="adminswitch">
                                        <input  type="checkbox"
                                                name='active'
                                                data-entree='{{ $stock->id }}'
                                                class="activate_me toggle"
                                                value="active"
                                                @if( $stock->statue == '1' ) checked @endif
                                        />
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                            
                            
                            
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection