@extends('dashboard/layout')

@section('title')
    Reception | {{ env('APP_NAME') }}
@endsection

@section('content')
<div class="d-flex flex-column bg-white pt-4">
    <div class="d-flex justify-content-between align-items-center pr-4 pl-4">
        <div class="d-flex">
            <h3 class="header-title">عمليات المخزون</h3>
        </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end bg-grey bt1 bb1 p-2">
        <div class="dropdown dropdown-city">
            <button class="dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown" 
                    aria-haspopup="true"
                    aria-expanded="false">
                حسب المدينة
            </button>
            <div    class="dropdown-menu by-city-dropdown tx-right"
                    aria-labelledby="dropdownMenuButton">
                @foreach($cities as $city)
                    <a class="dropdown-item" href="?city={{ $city->id }}">{{ $city->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="page-inner">
    <div class="d-flex flex-column">
        <div class="col-12">
            <div class="card-body pd-0 pt-4 tx-center">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
                            <th scope="col" class="latin" data-type="reference">الرمز</th>
                            <th scope="col" class="latin" data-type="productname">
                                المنتوج
                            </th>
                            <th scope="col" class="latin" data-type="retour">المرتجعات</th>
                            <th scope="col" class="latin" data-type="received">المرسلة</th>
                            <th scope="col" class="latin" data-type="real">الحقيقي</th>
                            <th scope="col" class="latin" data-type="delivered">تم شحنه</th>
                            <th scope="col" class="latin" data-type="physicalStock">
                                المخزون<br class="sm-break">
                                الحالي
                            </th>
                            <th scope="col" class="latin" data-type="theoreticalStock">
                                المخزون<br class="sm-break">
                                الإفتراضي
                            </th>
                            <th scope="col" class="latin" data-type="currentStock">
                                Stock<br class="sm-break">
                                en<br class="sm-break">
                                cours
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reception as $key => $list)
                            <tr height="50">
                                <td colspan="10" class="city">
                                    {{ $key }}
                                </td>
                            </tr>
                            @foreach($list as $item)
                                @if(    $item['retour'      ] !== 0 ||
                                        $item['real'        ] !== 0 ||
                                        $item['livre'       ] !== 0 ||
                                        $item['recue'       ] !== 0 ||
                                        $item['theorique'   ] !== 0 ||
                                        $item['encours'     ] !== 0
                                    )
                                    <tr height="50">
                                        <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                                        <td data-type="reference">
                                            <span>{{ $item['product_ref'] }}</span>
                                        </td>
                                        <td data-type="productname">
                                            <span>{{ $item['product_name'] }}</span>
                                        </td>
                                        <td data-type="retour">
                                            <span>{{ $item['retour'] }}</span>
                                        </td>
                                        <td data-type="received">
                                            <span>{{ $item['recue'] }}</span>
                                        </td>
                                        <td data-type="real">
                                            <span>{{ $item['real'] }}</span>
                                        </td>
                                        <td data-type="delivered">
                                            <span>{{ $item['livre'] }}</span>
                                        </td>
                                        <td data-type="physicalStock">
                                            <span class="{{ $item['physique']   < 0 ? 'badge badge-danger' : '' }}">{{ $item['physique'] }}</span>
                                        </td>
                                        <td data-type="theoreticalStock">
                                            <span class="{{ $item['theorique']  < 0 ? 'badge badge-danger' : '' }}">{{ $item['theorique'] }}</span>
                                        </td>
                                        <td data-type="currentStock">
                                            <span>{{ $item['encours'] }}</span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection