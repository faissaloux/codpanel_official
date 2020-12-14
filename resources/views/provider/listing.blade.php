@extends('provider.layout')

@section('content')
    <div class="page-inner mt-4">

        <ul class="nav nav-tabs type-list" id="myTab" role="tablist">
            <li class="nav-item">
                <a  class="nav-link active status-click"
                    id="all-tab"
                    data-toggle="tab"
                    data-type="all"                
                    href="javascript:;">
                    <i class="mdi mdi-home"></i>
                    <span class="col">الكل</span>
                    <span class="quantity col">{{$lists['result']->al}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link status-click"
                    id="confirmation-tab"
                    data-toggle="tab"
                    data-type="confirmed"
                    href="javascript:;">
                    <i class="mdi mdi-check"></i>
                    <span class="col">التأكيد</span>
                    <span class="quantity col">{{$lists['result']->confirmed}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link status-click"
                    id="canceled-tab"
                    data-toggle="tab"
                    data-type="canceled"
                    href="javascript:;">
                    <i class="mdi mdi-close"></i>
                    <span class="col">ألغيت</span>
                    <span class="quantity col">{{$lists['result']->canceled}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link status-click"
                    id="unanswred-tab"
                    data-toggle="tab"
                    data-type="unanswered"
                    href="javascript:;">
                    <i class="mdi mdi-phone-hangup"></i>
                    <span class="col">دون إجابة</span>
                    <span class="quantity col">{{$lists['result']->unanswered}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link status-click"
                    id="confirmation-tab"
                    data-toggle="tab"
                    data-type="delivred"
                    href="javascript:;">
                    <i class="mdi mdi-check"></i>
                    <span class="col">تم الشحن</span>
                    <span class="quantity col">{{$lists['result']->delivred}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link status-click"
                    id="recall-tab"
                    data-toggle="tab"
                    data-type="recall"
                    href="javascript:;">
                    <i class="mdi mdi-phone-in-talk"></i>
                    <span class="col">اعد الاتصال</span>
                    <span class="quantity col">{{$lists['result']->recall}}</span>
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active pd-15" id="all" role="tabpanel" aria-labelledby="all-tab">
                <!-- all goes here -->
            </div>
            <div class="tab-pane fade pd-15" id="new" role="tabpanel" aria-labelledby="new-tab">
                <!-- new goes here -->
            </div>
            <div class="tab-pane fade pd-15" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
                <!-- Canceled goes here -->
            </div>
            <div class="tab-pane fade pd-15" id="unanswered" role="tabpanel" aria-labelledby="unanswered-tab">
                <!-- Unanswered goes here -->
            </div>
            <div class="tab-pane fade pd-15" id="confirmation" role="tabpanel" aria-labelledby="confirmation-tab">
                <!-- Confirmation goes here -->
            </div>
            <div class="tab-pane fade pd-15" id="recall" role="tabpanel" aria-labelledby="recall-tab">
                <!-- Recall goes here -->
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between">
                <div class="col-6 pl-0">
                    <div class="d-flex align-items-center limit-container">
                        <div class="btn-reload btn btn-default-custom mr-2">
                            <i class="mdi mdi-reload"></i>
                        </div>
                        <div class="btn-filter btn btn-default-custom mr-2">
                            <i class="mdi mdi-filter-variant"></i>
                        </div>
                        <div class="limit-container-right btn btn-default-custom col-2 pr-0 mr-2 d-flex align-items-center">
                            <span class="m-2 col text-right">حد:</span>
                            <select name="" id="" class="p-0 pagination-select">
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="150">150</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                        </div>
                        <div class="dropdown mr-2">
                            <button class="btn btn-default-custom sort-container d-flex align-items-center"
                                    type="button"
                                    id="dropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                <i class="mdi mdi-sort text-dark"></i>
                                <span class="mr-2">فرز</span>
                            </button>
                            <div    class="dropdown-menu sort-dropdown mt-2"
                                    aria-labelledby="dropdownMenuButton">
                                <div class="polaris-header tx-right pr-3 pb-2">
                                    <span>فرز عن طريق</span>
                                </div>
                                <ul class="Polaris-ChoiceList__Choices_15o76 polaris-list tx-right pr-3 mb-0">
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton67">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton67" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="title asc" checked="">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">إسم المنتج أ-ي</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton68">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton68" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="title desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">إسم المنتج ي-أ</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton69">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton69" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="created_at asc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">تم الإنشاء (الأقدم أولاً)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton70">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton70" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="created_at desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">تم الإنشاء (الأحدث أولاً)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton71">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton71" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="updated_at asc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">تم التحديث (الأقدم أولاً)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton72">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton72" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="updated_at desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">تم التحديث (الأحدث أولاً)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton73">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton73" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="inventory_total asc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">المخزون المنخفض</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton74">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton74" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="inventory_total desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">مخزون مرتفع</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton75">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton75" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="product_type asc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">نوع المنتج أ-ي</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton76">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                            <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                <input id="PolarisRadioButton76" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="product_type desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">نوع المنتج ي-أ</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton77">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton77" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="vendor asc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">البائع أ-ي</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq" for="PolarisRadioButton78">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton78" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="vendor desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">البائع ي-أ</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-flex align-items-center btn-container show-columns-container mr-2">
                            <button class="btn btn-default-custom show-columns-container d-flex align-items-center px-2"
                                    type="button"
                                    id="showColumnsdropdownMenuButton"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                <i data-feather="eye-off" class="show-columns-icon"></i>
                                <span class="mr-2">عرض الأعمدة</span>
                            </button>
                            <div    class="dropdown-menu show-columns-dropdown mt-2"
                                    aria-labelledby="showColumnsdropdownMenuButton">
                                <div class="columns-container">
                                    <ul class="Polaris-ChoiceList__Choices_15o76 polaris-list tx-right px-2 mb-0">
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="requestId">
                                                <div>
                                                    <i data-feather="info" class="show-columns-item-icon"></i>
                                                    <span class="Polaris-Choice__Label_2vd36">رقم</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="requestId" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="requestDate">
                                                <div>
                                                    <i data-feather="info" class="show-columns-item-icon"></i>
                                                    <span class="Polaris-Choice__Label_2vd36">تاريخ الإنشاء</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="requestDate" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="requestStatus">
                                                <div>
                                                    <i data-feather="info" class="show-columns-item-icon"></i>
                                                    <span class="Polaris-Choice__Label_2vd36">حالة الطلب</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="requestStatus" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="name">
                                                <div>
                                                    <i data-feather="user" class="show-columns-item-icon"></i>
                                                    <span class="Polaris-Choice__Label_2vd36">الإسم</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="name" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="phone">
                                                <div>
                                                    <i data-feather="phone" class="show-columns-item-icon"></i>
                                                    <span class="Polaris-Choice__Label_2vd36">الهاتف</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="phone" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="products">
                                                <div>
                                                    <i data-feather="info" class="show-columns-item-icon"></i>
                                                    <span class="Polaris-Choice__Label_2vd36">المنتوجات</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="products" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="employee">
                                                <div>
                                                    <i data-feather="headphones" class="show-columns-item-icon"></i>    
                                                    <span class="Polaris-Choice__Label_2vd36">عميل الإتصال</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="employee" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="provider">
                                                <div>
                                                    <i data-feather="truck" class="show-columns-item-icon"></i> 
                                                    <span class="Polaris-Choice__Label_2vd36">مندوب التوصيل</span>
                                                </div>
                                                <span class="Polaris-Choice__Control_1u8vs">
                                                    <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                        <input type="checkbox" name="provider" class="toggle show-col active">
                                                    </span>
                                                </span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="show-columns-dropdown-footer pt-2 px-2">
                                    <div class="d-flex justify-content-between" style="cursor: auto">
                                        <button class="active-all-cols">إظهار الكل</button>
                                        <button class="inactive-all-cols">إخفاء الكل</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown mr-2">
                            <button id="dashboardDate" class="btn btn-default dropdown-toggle mr-2 d-none d-md-block pd-y-8-force"></button>
                        </div>
                    </div>
                </div>
                <div class="col-6 pr-0">
                    <div class="d-flex justify-content-end">
                        <div class="btn-container ml-2">
                            <a  class="btn-import table-top-btn btn btn-default-custom d-flex align-items-center"
                                data-toggle="modal"
                                data-target="#exportModalCenter">
                                <i class="mdi mdi-download"></i>
                                <span class="mr-2">تصدير</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="search-form-panel pt-4 mb-4">
            <form action="/sinistres/search" id='sinistres-search' method="GET">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-10">
                                        <input  type="text"
                                                class="form-control"
                                                name="q"
                                                placeholder="إسم أو هاتف أو عنوان">
                                    </div>
                                    <div class="form-group d-flex col-md-2">
                                        <button class="btn btn-success btn-block">
                                            <b>بحث</b>&nbsp;&nbsp;<i data-feather="search"></i>
                                        </button>
                                        <div class="mr-2 btn-show-deep-search show-deep-search">
                                            <i class="mdi mdi-filter-variant"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="deep-search">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group ">
                                                <label for="city_selector" class="float-right">
                                                    <b>المدينة</b>
                                                </label>
                                                <select class="selectpicker form-control" name="city_selector" data-style="btn-default" data-live-search="true">
                                                    <option></option>
                                                    @foreach ($lists['cities'] as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="product" class="float-right">
                                                    <b>المنتوج</b>
                                                </label>
                                                <select class="selectpicker form-control" name="product" data-style="btn-default" data-live-search="true">
                                                    <option></option>
                                                    @foreach ($lists['products'] as $product)
                                                        <option value="{{$product->id}}">{{$product->id}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

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

            <table class="table table-primary table-hover">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox"/></th>
                        <th scope="col" data-type="requestId" class="toggle-col active">
                            رقم
                        </th>
                        <th scope="col" data-type="requestDate" class="toggle-col active">
                            تاريخ الإنشاء
                        </th>
                        <th scope="col" data-type="requestStatus" class="toggle-col active">
                            حالة الطلب
                        </th>
                        <th scope="col" data-type="name" class="toggle-col active">
                            الإسم
                        </th>
                        <th scope="col" data-type="phone" class="toggle-col active">
                            الهاتف
                        </th>
                        <th scope="col" data-type="products" class="toggle-col active">
                            مجموج المنتوجات
                        </th>
                        <th scope="col" data-type="employee" class="toggle-col active">عميل <br class="sm-break">الإتصال</th>
                        <th scope="col" data-type="provider" class="toggle-col active">
                            مندوب<br class="sm-break"> التوصيل
                        </th>
                        <th scope="col">التفاصيل</th>
                    </tr>
                </thead>
                <tbody class="table-body-listing">
                    @foreach($lists['lists'] as $list)
                        <tr class="{{ 'list_'.$list->id }}" >
                            <th scope="row" class="active"><input type="checkbox" class="hoverRow"/></th>
                            <td data-type="requestId" class="tx-right toggle-col active">
                                {{ '#'.$list->id }}
                            </td>
                            <td data-type="requestDate" class="tx-right toggle-col active">
                                {{ $list->created_at }}
                            </td>
                            <td data-type="requestStatus" class="tx-right toggle-col active">
                                {{ $list->status }}<br/>
                            </td>
                            <td data-type="name" class="toggle-col active">
                                {{ $list->name }}
                            </td>
                            <td data-type="phone" class="toggle-col active">
                                <a href="tel: {{ $list->phone }}">{{ $list->phone }}</a>
                            </td>
                            <td data-type="products" class="toggle-col active">
                                {{ $list->total() }} درهم
                              </td>
                            <td data-type="employee" class="toggle-col active">
                                {{ $list->employee->name }}
                            </td>
                            <td data-type="provider" class="toggle-col active">
                                {{ $list->provider->name }}
                            </td>
                            <td class="active">
                                <a type="button" 

                                    class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white details showdetails"
                                    data-link="{{ route('provider.load' , ['id' => $list->id ]) }}">

                                    التفاصيل
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="justify-content-center paginate">
                    {!! $lists['lists']->links() !!}
                </ul>
            </nav>
        </div>
        
    </div>
@endsection