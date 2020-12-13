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
                           <h5 class="tx-20 tx-sm-18 tx-md-20  tx-medium tx-rubik mg-b-0">$51,958<small>.50</small></h5>
                        </div>
                        <div class="small ft-right">
                           <span class="tx-success ml-auto d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+2,012</span>
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
                           <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-gray-500 mg-b-5">صافي الأرباح</h6>
                           <h5 class="tx-20 tx-sm-18 tx-md-20  tx-medium tx-rubik mg-b-0">$31,608<small>.50</small></h5>
                        </div>
                        <div class="small ft-right">
                           <span class="tx-success ml-auto d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+3,258</span>
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
                           <h6 class="tx-sans tx-uppercase tx-10 tx-spacing-1 tx-gray-500 mg-b-5">الضرائب المحتجزة</h6>
                           <h5 class="tx-20 tx-sm-18 tx-md-20  tx-medium tx-rubik mg-b-0">$24,769<small>.50</small></h5>
                        </div>
                        <div class="small ft-right">
                           <span class="tx-danger ml-auto d-flex align-items-center"><i class="ti-arrow-down tx-8 mr-1 tx-8"></i>-1,241</span>
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
                           <tr>
                              <td class="tx-13">05/04/2019</td>
                              <td class="text-right tx-teal">2,369</td>
                              <td class="text-right tx-pink">$258,963</td>
                           </tr>
                           <tr>
                              <td class="tx-13">01/05/2019</td>
                              <td class="text-right tx-teal">1,950</td>
                              <td class="text-right tx-pink">$123,654</td>
                           </tr>
                           <tr>
                              <td class="tx-13">02/05/2019</td>
                              <td class="text-right tx-teal">1,198</td>
                              <td class="text-right tx-pink">$369,852</td>
                           </tr>
                           <tr>
                              <td class="tx-13">12/06/2019</td>
                              <td class="text-right tx-teal">1,456</td>
                              <td class="text-right tx-pink">$789,125</td>
                           </tr>
                           <tr>
                              <td class="tx-13">20/06/2019</td>
                              <td class="text-right tx-teal">1,198</td>
                              <td class="text-right tx-pink">$357,489</td>
                           </tr>
                           <tr>
                              <td class="tx-13">02/06/2019</td>
                              <td class="text-right tx-teal">1,458</td>
                              <td class="text-right tx-pink">$541,478</td>
                           </tr>
                           <tr>
                              <td class="tx-13">01/07/2019</td>
                              <td class="text-right tx-teal">1,257</td>
                              <td class="text-right tx-pink">$951,357</td>
                           </tr>
                           <tr>
                              <td class="tx-13">02/07/2019</td>
                              <td class="text-right tx-teal">1,147</td>
                              <td class="text-right tx-pink">$124,452</td>
                           </tr>
                           <tr>
                              <td class="tx-13">04/08/2019</td>
                              <td class="text-right tx-teal">1,478</td>
                              <td class="text-right tx-pink">$145,452</td>
                           </tr>
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
                           <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                              <table class="table table-primary table-striped table-hover text-right">
                                  <thead>
                                     <tr class="stats-table-row">
                                        <th scope="col">المدينة</th>
                                        <th scope="col">عدد الطلبات</th>
                                        <th scope="col">موزعة</th>
                                        <th scope="col">نسبة %</th>
                                     </tr>
                                  </thead>
                                  <tbody class="stat-table-body">
                                     @foreach($cities as $city)
                                       <tr>
                                          <td>{{ $city->name }}</td>
                                          <td>{{ $city->provider->lists->count() }}</td>
                                          <td>{{ $city->provider->delivredLists->count() }}</td>
                                          <td>% {{ \Statistiques::percentage($city->provider->delivredLists->count() , $city->provider->lists->count()) }}</td>
                                       </tr>
                                     @endforeach
                                  </tbody>
                               </table>
                            </div>
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
                           <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                              <table class="table table-primary table-striped table-hover text-right">
                                  <thead>
                                     <tr class="stats-table-row">
                                        <th scope="col">المنتوج</th>
                                        <th scope="col">عدد الطلبات</th>
                                        <th scope="col">موزعة</th>
                                        <th scope="col">نسبة %</th>
                                     </tr>
                                  </thead>
                                  <tbody class="stat-table-body">
                                    @foreach ($products as $product)
                                       <tr>
                                          <td>{{ $product->name }}</td>
                                          <td>{{ $product->items->count() }}</td>
                                          <td>{{ $product->delivred }}</td>
                                          <td>% {{ \Statistiques::percentage($product->delivred, $product->items->count()) }}</td>
                                       </tr>
                                    @endforeach
                                  </tbody>
                               </table>
                            </div>
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
                           <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                              <table class="table table-primary table-striped table-hover text-right">
                                 <thead>
                                    <tr class="stats-table-row">
                                       <th scope="col">عميل الإتصال</th>
                                       <th scope="col">عدد الطلبات</th>
                                       <th scope="col">موزعة</th>
                                       <th scope="col">نسبة %</th>
                                    </tr>
                                 </thead>
                                 <tbody class="stat-table-body">
                                    @foreach ($employees as $employee)
                                       <tr>
                                          <td>{{ $employee->name }}</td>
                                          <td>{{ $employee->lists->count() }}</td>
                                          <td>{{ $employee->delivredLists->count() }}</td>
                                          <td>% {{ \Statistiques::percentage($employee->delivredLists->count(), $employee->lists->count()) }}</td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
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
                            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                               <table class="table table-primary table-striped table-hover text-right">
                                  <thead class="table-head">
                                     <tr class="stats-table-row">
                                        <th scope="col">مندوب التوصيل</th>
                                        <th scope="col">عدد الطلبات</th>
                                        <th scope="col">موزعة</th>
                                        <th scope="col">نسبة %</th>
                                     </tr>
                                  </thead>
                                  <tbody class="stat-table-body">
                                    @foreach ($providers as $provider)
                                    <tr>
                                       <td>{{ $provider->name }}</td>
                                       <td>{{ $provider->lists->count() }}</td>
                                       <td>{{ $provider->delivredLists->count() }}</td>
                                       <td>% {{ \Statistiques::percentage($provider->delivredLists->count(), $provider->lists->count()) }}</td>
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
</div>
@endsection