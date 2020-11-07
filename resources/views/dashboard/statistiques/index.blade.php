@extends('dashboard/layout')

@section('content')
<div class="d-flex flex-column bg-white pt-4">
    <div class="row align-items-center pr-4 pl-4">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right">الطلبات الملغية</h5>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">$1,181</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right">طلبات لا تجيب</h5>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">$1,181</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right">طلبات إعادة الإتصال</h5>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">$1,181</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div>
               </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card">
               <div class="card-body">
                  <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2 text-right">طلبات موزعة</h5>
                  <div class="d-flex justify-content-end align-items-center">
                     <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-medium">$1,181</h2>
                  </div>
                  <div class="d-flex align-items-center justify-content-end tx-gray-500 tx-11"><span class="tx-success mr-2 d-flex align-items-center"><i class="ti-arrow-up tx-8 mr-1 tx-8"></i>+1,551</span>since last day</div>
               </div>
            </div>
        </div>
    </div>
    <hr>
</div>
<div class="page-inner" style="background-color: #FFF">
    <div class="d-flex flex-column">
        <div class="row mb-2 d-flex justify-content-center">
            <div class="col-5 ml-5 p-2">
                <div class="header text-right">
                    <h4>إحصائيات المدن</h4>
                    <h3>250</h3>
                </div>
                <div class="body">
                    <div class="card-body pd-0">
                        <div class="table-responsive">
                           <table class="table table-primary table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th scope="col">المدينة</th>
                                    <th scope="col">عدد الطلبات</th>
                                    <th scope="col">موزعة</th>
                                    <th scope="col">نسبة %</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Agadir</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>Agadir</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>Agadir</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>Agadir</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 p-2">
                <div class="header text-right">
                    <h4>إحصائيات المنتوجات</h4>
                    <h3>250</h3>
                </div>
                <div class="body">
                    <div class="card-body pd-0">
                        <div class="table-responsive">
                           <table class="table table-primary table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th scope="col">المنتوج</th>
                                    <th scope="col">عدد الطلبات</th>
                                    <th scope="col">موزعة</th>
                                    <th scope="col">نسبة %</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>product</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>product</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>product</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>product</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2 d-flex justify-content-center">
            <div class="col-5 ml-5 p-2">
                <div class="header text-right">
                    <h4>إحصائيات عملاء الإتصال</h4>
                    <h3>250</h3>
                </div>
                <div class="body">
                    <div class="card-body pd-0">
                        <div class="table-responsive">
                           <table class="table table-primary table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th scope="col">عميل الإتصال</th>
                                    <th scope="col">عدد الطلبات</th>
                                    <th scope="col">موزعة</th>
                                    <th scope="col">نسبة %</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Employee</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>Employee</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>Employee</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>Employee</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5 p-2">
                <div class="header text-right">
                    <h4>إحصائيات مندوبي التوصيل</h4>
                    <h3>250</h3>
                </div>
                <div class="body">
                    <div class="card-body pd-0">
                        <div class="table-responsive">
                           <table class="table table-primary table-striped table-hover">
                              <thead>
                                 <tr>
                                    <th scope="col">مندوب التوصيل</th>
                                    <th scope="col">عدد الطلبات</th>
                                    <th scope="col">موزعة</th>
                                    <th scope="col">نسبة %</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>provider</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>provider</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>provider</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
                                 <tr>
                                    <td>provider</td>
                                    <td>452</td>
                                    <td>45</td>
                                    <td>60%</td>
                                 </tr>
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