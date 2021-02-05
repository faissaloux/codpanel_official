@extends('dashboard/layout')

@section('title')
   Statistiques | {{ env('APP_NAME') }}
@endsection

@section('content')
<div class="d-flex flex-column bg-white pt-4">
    <div class="row align-items-center pr-4 pl-4 mb-3 reset-mb-sm">
        <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
            <div class="card">
               <div class="card-body">
                  <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">الطلبات الملغية</p>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $canceled }}</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                     منذ اليوم الماضي
                     <span class="tx-success mr-2 d-flex align-items-center">
                        +1,551
                        <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                     </span>
                  </div>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
            <div class="card">
               <div class="card-body">
                  <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">طلبات لا تجيب</p>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $unanswered }}</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                     منذ اليوم الماضي
                     <span class="tx-success mr-2 d-flex align-items-center">
                        +1,551
                        <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                     </span>
                  </div>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
            <div class="card">
               <div class="card-body">
                  <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">طلبات إعادة الإتصال</p>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $recall }}</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                     منذ اليوم الماضي
                     <span class="tx-success mr-2 d-flex align-items-center">
                        +1,551
                        <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                     </span>
                  </div>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
            <div class="card">
               <div class="card-body">
                  <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">طلبات موزعة</p>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $delivred }}</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                     منذ اليوم الماضي
                     <span class="tx-success mr-2 d-flex align-items-center">
                        +1,551
                        <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                     </span>
                  </div>
               </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center pr-4 pl-4">
      <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
          <div class="card">
             <div class="card-body">
                <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">عملاء الإتصال</p>
                <div class="d-flex justify-content-end align-items-center">
                  <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $employees->count() ?? 0 }}</h2>
                </div>
                <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                   منذ اليوم الماضي
                   <span class="tx-success mr-2 d-flex align-items-center">
                      +1,551
                      <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                   </span>
                </div>
             </div>
          </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
          <div class="card">
             <div class="card-body">
                <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">مندوب التوصيل</p>
                <div class="d-flex justify-content-end align-items-center">
                  <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $providers->count() ?? 0 }}</h2>
                </div>
                <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                   منذ اليوم الماضي
                   <span class="tx-success mr-2 d-flex align-items-center">
                      +1,551
                      <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                   </span>
                </div>
             </div>
          </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
          <div class="card">
             <div class="card-body">
                <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">المدن</p>
                <div class="d-flex justify-content-end align-items-center">
                  <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $cities->count() ?? 0 }}</h2>
                </div>
                <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                   منذ اليوم الماضي
                   <span class="tx-success mr-2 d-flex align-items-center">
                      +1,551
                      <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                   </span>
                </div>
             </div>
          </div>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3 mb-sm">
          <div class="card">
             <div class="card-body">
                <p class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right stat-title">المنتوجات</p>
                <div class="d-flex justify-content-end align-items-center">
                  <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">{{ $products->count() ?? 0 }}</h2>
                </div>
                <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11">
                   منذ اليوم الماضي
                   <span class="tx-success mr-2 d-flex align-items-center">
                      +1,551
                      <i class="ti-arrow-up tx-8 mr-1 tx-8"></i>
                   </span>
                </div>
             </div>
          </div>
      </div>
  </div>
    <hr>
</div>
<div class="page-inner" style="background-color: #FFF">
    <div class="row">
        <div class="col-xl-4 pt-2">
            <div class="card mg-b-30 text-right">
               <div class="row">
                  <div class="col-sm-4 col-md-4 col-lg-4 col-xl-12">
                     <div class="media pd-t-20 pd-x-20">
                        <div class="wd-40 ht-40 bg-primary tx-white mg-l-10 mg-md-l-10 d-flex align-items-center justify-content-center rounded">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg> 
                        </div>
                        <div class="media-body">
                           <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-gray-500 mg-b-5">الأرباح الإجمالية</h6>
                           <h5 class="tx-20 tx-sm-18 tx-md-20  tx-medium tx-rubik mg-b-0">${{ $total_benefits[0] }}<small>.{{ $total_benefits[1] }}</small></h5>
                        </div>
                        <div class="small ft-right">
                           <span class="{{ $total_benefits_diff > 0 ? 'tx-success':'tx-danger'}} ml-auto d-flex align-items-center">
                              <i class="{{ $total_benefits_diff > 0 ? 'ti-arrow-up':'ti-arrow-down'}} tx-8 mr-1 tx-8"></i>
                              @if($total_benefits_diff > 0) + @endif {{ $total_benefits_diff }}
                           </span>
                           <p class="tx-10 tx-gray-500">منذ اخر شهر</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-4 col-xl-12">
                     <div class="media pd-y-20 pd-x-20">
                        <div class="wd-40 ht-40 bg-warning tx-white mg-l-10 mg-md-l-10 d-flex align-items-center justify-content-center rounded">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg> 
                        </div>
                        <div class="media-body">
                           <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-gray-500 mg-b-5">مجموع المدن</h6>
                           <h5 class="tx-20 tx-sm-18 tx-md-20  tx-medium tx-rubik mg-b-0">{{ $cities->count() }}</h5>
                        </div>
                        <div class="small ft-right">
                           <span class="{{ $cities_diff > 0 ? 'tx-success':'tx-danger'}} ml-auto d-flex align-items-center">
                              <i class="{{ $cities_diff > 0 ? 'ti-arrow-up':'ti-arrow-down'}} tx-8 mr-1 tx-8"></i>
                              @if($cities_diff > 0) + @endif {{ $cities_diff }}
                           </span>
                           <p class="tx-10 tx-gray-500">منذ اخر شهر</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4 col-md-4 col-lg-4 col-xl-12">
                     <div class="media pd-b-20 pd-x-20 pd-md-t-20 pd-xl-t-0">
                        <div class="wd-40 ht-40 bg-pink tx-white mg-l-10 mg-md-l-10 d-flex align-items-center justify-content-center rounded">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg> 
                        </div>
                        <div class="media-body">
                           <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-gray-500 mg-b-5">مجموع المنتجات</h6>
                           <h5 class="tx-20 tx-sm-18 tx-md-20  tx-medium tx-rubik mg-b-0">{{ $products->count() }}</h5>
                        </div>
                        <div class="small ft-right">
                           <span class="{{ $products_diff > 0 ? 'tx-success':'tx-danger'}} ml-auto d-flex align-items-center">
                              <i class="{{ $products_diff > 0 ? 'ti-arrow-up':'ti-arrow-down'}} tx-8 mr-1 tx-8"></i>
                              @if($products_diff > 0) + @endif {{ $products_diff }}
                           </span>
                           <p class="tx-10 tx-gray-500">منذ اخر شهر</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body pd-0">
                  <div class="table-responsive">
                     <table class="table table-hover tx-12 mb-0">
                        <thead class="tx-10 tx-uppercase">
                           <tr>
                              <th class="wd-40">التاريخ</th>
                              <th class="wd-25 text-right">الطلبات</th>
                              <th class="wd-35 text-right">أرباح</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($stats as $stat)
                              <tr>
                                 <td class="tx-13">{{ $stat->created_at->toDateString() }}</td>
                                 <td class="text-right tx-teal">{{ $stat->orders }}</td>
                                 <td class="text-right tx-pink">${{ $stat->amount }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <!-- table-responsive -->
               </div>
            </div>
         </div>
        <div class="d-flex flex-column col-xl-8">
            <div class="row mb-2 d-flex justify-content-center">
                <div class="col p-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                               <div>
                                  <h6 class="card-header-title tx-13 mb-0">إحصائيات المدن</h6>
                               </div>
                            </div>
                         </div>
                        <div class="card-body pd-0">
                              <table class="table table-primary table-striped table-hover text-right mb-0">
                                  <thead>
                                     <tr class="stats-table-row d-flex">
                                        <th class="col-5">المدينة</th>
                                        <th class="col-3">عدد الطلبات</th>
                                        <th class="col">موزعة</th>
                                        <th class="col">نسبة %</th>
                                     </tr>
                                  </thead>
                                  <tbody class="stat-table-body">
                                     @foreach($cities as $city)
                                       <tr class="d-flex">
                                          <td class="col-5">{{ $city->name }}</td>
                                          <td class="col-3">{{ $city->provider->lists->count() }}</td>
                                          <td class="col">{{ $city->provider->delivredLists->count() }}</td>
                                          <td class="col">% {{ \Statistiques::percentage($city->provider->delivredLists->count() , $city->provider->lists->count()) }}</td>
                                       </tr>
                                     @endforeach
                                  </tbody>
                               </table>
                            
                        </div>
                    </div>
                </div>
                <div class="col p-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                               <div>
                                  <h6 class="card-header-title tx-13 mb-0">إحصائيات المنتوجات</h6>
                               </div>
                            </div>
                        </div>
                        <div class="card-body pd-0">
                           <table class="table table-primary table-striped table-hover text-right mb-0">
                                 <thead>
                                    <tr class="stats-table-row d-flex">
                                       <th class="col-5">المنتوج</th>
                                       <th class="col-3">عدد الطلبات</th>
                                       <th class="col">موزعة</th>
                                       <th class="col">نسبة %</th>
                                    </tr>
                                 </thead>
                                 <tbody class="stat-table-body">
                                 @foreach ($products as $product)
                                    <tr class="d-flex">
                                       <td class="col-5">{{ $product->name }}</td>
                                       <td class="col-3">{{ $product->items->count() }}</td>
                                       <td class="col">{{ $product->delivred }}</td>
                                       <td class="col">% {{ \Statistiques::percentage($product->delivred, $product->items->count()) }}</td>
                                    </tr>
                                 @endforeach
                                 </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2 d-flex justify-content-center">
                <div class="col p-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                               <div>
                                  <h6 class="card-header-title tx-13 mb-0">إحصائيات عملاء الإتصال</h6>
                               </div>
                            </div>
                        </div>
                        <div class="card-body pd-0">
                           <table class="table table-primary table-striped table-hover text-right mb-0">
                              <thead>
                                 <tr class="stats-table-row d-flex">
                                    <th class="col-5">عميل الإتصال</th>
                                    <th class="col-3">عدد الطلبات</th>
                                    <th class="col">موزعة</th>
                                    <th class="col">نسبة %</th>
                                 </tr>
                              </thead>
                              <tbody class="stat-table-body">
                                 @foreach ($employees as $employee)
                                    <tr class="d-flex">
                                       <td class="col-5">{{ $employee->name }}</td>
                                       <td class="col-3">{{ $employee->lists->count() }}</td>
                                       <td class="col">{{ $employee->delivredLists->count() }}</td>
                                       <td class="col">% {{ \Statistiques::percentage($employee->delivredLists->count(), $employee->lists->count()) }}</td>
                                    </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                    </div>
                </div>
                <div class="col p-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                               <div>
                                  <h6 class="card-header-title tx-13 mb-0">إحصائيات مندوبي التوصيل</h6>
                               </div>
                            </div>
                        </div>
                        <div class="card-body pd-0">
                           <table class="table table-primary table-striped table-hover text-right mb-0">
                              <thead class="table-head">
                                 <tr class="stats-table-row d-flex">
                                    <th class="col-5">مندوب التوصيل</th>
                                    <th class="col-3">عدد الطلبات</th>
                                    <th class="col">موزعة</th>
                                    <th class="col">نسبة %</th>
                                 </tr>
                              </thead>
                              <tbody class="stat-table-body">
                              @foreach ($providers as $provider)
                              <tr class="d-flex">
                                 <td class="col-5">{{ $provider->name }}</td>
                                 <td class="col-3">{{ $provider->lists->count() }}</td>
                                 <td class="col">{{ $provider->delivredLists->count() }}</td>
                                 <td class="col">% {{ \Statistiques::percentage($provider->delivredLists->count(), $provider->lists->count()) }}</td>
                              </tr>
                              @endforeach
                              </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection