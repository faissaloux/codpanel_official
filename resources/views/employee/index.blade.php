@section('title')
    Listing | {{ env('APP_NAME') }}
@endsection


<!DOCTYPE html>
<html lang="zxx">
   
    <head>
        @include('dashboard.inc.head')
    </head>
    <body dir="rtl" class="employees-listing-page" data-auth-id="{{ $auth->id }}" data-auth-type="{{ $auth->role }}" data-limit="20" data-product="" data-employee="" data-provider=""  data-search="" data-city="" data-orderby="" data-from="" data-to="" data-handler="employee" data-type="">
        @include('dashboard.inc.actions')
        <!--================================-->
        <!-- Page Container Start -->
        <!--================================-->
        <div class="page-container">

            <!--================================-->
            <!-- Page Content Start -->
            <!--================================-->
            <div class="page-content get-down" style="margin-right: 0; width: 100%;">
                <!--================================-->
                <!-- Page Header Start -->
                <!--================================-->
                <div class="page-header">
                    <nav class="navbar navbar-default d-flex justify-content-end">
                        <div class="header-right">
                            <ul class="list-inline justify-content-end">
                                <li class="list-inline-item dropdown">
                                    <a  href="#"
                                        role="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">                    
                                        @if(!empty ( $auth->image ))  
                                        <img src="/uploads/{{ $auth->image}}"
                                        class="img-fluid wd-30 ht-30 rounded-circle"
                                        alt="">
                                        @else
                                        <div class="avatar mr-2"><span style="background-color: {{ System::color() }}" class="avatar-initial rounded-circle">{{ Str::limit($auth->name, 1 , "") }}</span></div>
                                        @endif
                
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                                        <div class="user-profile-area d-flex flex-column tx-right">
                                            <a href="{{route('dashboard.profile')}}" class="dropdown-item m-auto">
                                                <i data-feather="settings" class="wd-16 mr-2"></i>
                                                إعدادات حسابي
                                            </a>
                                            <a href="{{route('logout')}}" class="dropdown-item m-auto">
                                                <i data-feather="power" class="wd-16 mr-2"></i>
                                                تسجيل الخروج
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Page Header End -->
                <!--================================-->
                <!-- Page Inner Start -->
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
                                <span class="quantity col">42</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link status-click"
                                id="new-tab"
                                data-toggle="tab"
                                data-type="new"
                                href="javascript:;">
                                <i class="mdi mdi-hanger"></i>
                                <span class="col">جديد</span>
                                <span class="quantity col">22</span>
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
                                <span class="quantity col">3</span>
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
                                <span class="quantity col">6</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  class="nav-link status-click"
                                id="confirmation-tab"
                                data-toggle="tab"
                                data-type="confirmation"
                                href="javascript:;">
                                <i class="mdi mdi-check"></i>
                                <span class="col">التأكيد</span>
                                <span class="quantity col">10</span>
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
                                <span class="quantity col">8</span>
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
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton67">
                                                            <div>
                                                                <i data-feather="info" class="show-columns-item-icon"></i>
                                                                <span class="Polaris-Choice__Label_2vd36">رقم</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton67">
                                                            <div>
                                                                <i data-feather="info" class="show-columns-item-icon"></i>
                                                                <span class="Polaris-Choice__Label_2vd36">تاريخ الإنشاء</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton67">
                                                            <div>
                                                                <i data-feather="info" class="show-columns-item-icon"></i>
                                                                <span class="Polaris-Choice__Label_2vd36">حالة الطلب</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton68">
                                                            <div>
                                                                <i data-feather="user" class="show-columns-item-icon"></i>
                                                                <span class="Polaris-Choice__Label_2vd36">الإسم</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton68">
                                                            <div>
                                                                <i data-feather="phone" class="show-columns-item-icon"></i>
                                                                <span class="Polaris-Choice__Label_2vd36">الهاتف</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton69">
                                                            <div>
                                                                <i data-feather="info" class="show-columns-item-icon"></i>
                                                                <span class="Polaris-Choice__Label_2vd36">المنتوجات</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton70">
                                                            <div>
                                                                <i data-feather="headphones" class="show-columns-item-icon"></i>    
                                                                <span class="Polaris-Choice__Label_2vd36">عميل الإتصال</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton70">
                                                            <div>
                                                                <i data-feather="truck" class="show-columns-item-icon"></i> 
                                                                <span class="Polaris-Choice__Label_2vd36">مندوب التوصيل</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="Polaris-Choice_j5gzq d-flex justify-content-between" for="PolarisRadioButton71">
                                                            <div>
                                                                <i data-feather="phone-call" class="show-columns-item-icon"></i> 
                                                                <span class="Polaris-Choice__Label_2vd36">محاولات الإتصال</span>
                                                            </div>
                                                            <span class="Polaris-Choice__Control_1u8vs">
                                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                                    <input type="checkbox" class="toggle">
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="show-columns-dropdown-footer pt-2 px-2">
                                                <div class="d-flex justify-content-between" style="cursor: auto">
                                                    <button>إظهار الكل</button>
                                                    <button>إخفاء الكل</button>
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
                                            data-target="#importModalCenter">
                                            <i class="mdi mdi-download"></i>
                                            <span class="mr-2">استيراد</span>
                                        </a>
                                    </div>
                                    <div class="btn-container">
                                        <a  class="btn-add-order table-top-btn btn btn-default-custom d-flex align-items-center"
                                            id="addnewlist"
                                            data-link="{{ route('dashboard.listing.create') }}">
                                            <i class="mdi mdi-plus"></i>
                                            <span class="mr-2">أضف طلب</span>
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
                                                                @foreach ($cities as $city)
                                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group ">
                                                            <label for="employee_selector" class="float-right" >
                                                                <b>عميل الإتصال</b>
                                                            </label>
                                                            <select class="selectpicker form-control" name="employee_selector" data-style="btn-default" data-live-search="true">
                                                                <option></option>
                                                                @foreach ($employees as $employee)
                                                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="provider" class="float-right">
                                                                <b>مندوب التوصيل</b>
                                                            </label>
                                                            <select class="selectpicker form-control" name="provider" data-style="btn-default" data-live-search="true">
                                                                <option></option>
                                                                @foreach ($providers as $provider)
                                                                    <option value="{{$provider->id}}">{{$provider->id}}</option>
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
                                                                @foreach ($products as $product)
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
                        
                    <div class="card-body pd-0 tx-center">
                        
                
                        <table class="table table-primary table-hover">
                            <thead>
                                <tr>
                                    <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
                                    <th scope="col" data-type="requestId">
                                        رقم
                                    </th>
                                    <th scope="col" data-type="requestDate">
                                        تاريخ الإنشاء
                                    </th>
                                    <th scope="col" data-type="requestStatus">
                                        حالة الطلب
                                    </th>
                                    <th scope="col" data-type="name">
                                        الإسم
                                    </th>
                                    <th scope="col" data-type="phone">
                                        الهاتف
                                    </th>
                                    <th scope="col" data-type="products">
                                        المنتوجات
                                    </th>
                                    <th scope="col" data-type="employee">عميل <br>الإتصال</th>
                                    <th scope="col" data-type="distributor">
                                        مندوب<br> التوصيل
                                    </th>
                                    <th scope="col">تعديل</th>
                                </tr>
                            </thead>
                            <tbody class="table-body-listing">
                                @foreach($lists as $list)
                                    <tr class="{{ 'list_'.$list->id }}" >
                                        <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                                        <td data-type="requestId" class="tx-right">
                                            {{ '#'.$list->id }}
                                        </td>
                                        <td data-type="requestDate" class="tx-right">
                                            {{ $list->created_at }}
                                        </td>
                                        <td data-type="requestStatus" class="tx-right">
                                            قيد المعالجة<br/>
                                        </td>
                                        <td data-type="name">
                                            {{ $list->name }}
                                        </td>
                                        <td data-type="phone">
                                            <a href="tel: 06########">{{ $list->tel }}</a>
                                        </td>
                                        <td data-type="products">
                                            <table class="list_products">
                                                <tbody>
                                                    <tr>
                                                        <td> 1 </td>
                                                        <td> x كيطمات رائعة </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">المجموع : 249 درهم</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td data-type="employee">
                                            {{ $list->employee->name }}
                                        </td>
                                        <td data-type="distributor">
                                            {{ $list->provider->name }}
                                        </td>
                                        <td>
                                            <a type="button" 
                
                                                class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white details showdetails"
                                                data-link="{{ route('dashboard.listing.load' , ['id' => $list->id ]) }}">
                
                                                التفاصيل
                                            </a>
                                            <a  type="button"
                                                href="javascript:;"
                                                class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit editlist"
                                                data-link="{{ route('dashboard.listing.edit' , ['id' => $list->id ]) }}">
                                                تعديل
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">السابق</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#">التالي</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--/ Page Inner End --> 
            <!--================================-->	
            </div>
            <!--/ Page Content End -->
        </div> 
        <!--/ Page Container End -->
        <!--================================-->

        <!--================================-->
        <!-- Scroll To Top Start-->
        <!--================================-->	
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!--/ Scroll To Top End -->
        <!--================================-->

        
        @include('dashboard.inc.modals')

        <!--================================-->
        <!-- Footer Script -->
        <!--================================-->
        <script src="../../assets/js/all.js"></script>
        <script src="../../assets/js/custom.js"></script>
        @if(\Session::has('success'))
            <?=
                "<script>
                    var msg   = '".\Session::get('success')."';
                    var title = 'success';
                    var type  = 'success';

                    toastr[type](msg, title, {
                        positionClass:     'toast-bottom-left',
                        closeButton:       true,
                        progressBar:       true,
                        preventDuplicates: true,
                        newestOnTop:       true,
                        rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                    });
                </script>";
            ?>
        @endif

        @if(\Session::has('failed'))
            <?=
                "<script>
                    var msg   = '".\Session::get('failed')."';
                    var title = 'failed';
                    var type  = 'error';

                    toastr[type](msg, title, {
                        positionClass:     'toast-bottom-left',
                        closeButton:       true,
                        progressBar:       true,
                        preventDuplicates: true,
                        newestOnTop:       true,
                        rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                    });
                </script>";
            ?>
        @endif

        <script>


            $('.modal').on('shown.bs.modal', function(e) {
                $(function () {
                    $('.selectpicker').selectpicker();
                });
            });
            //////default success

            function statue_toast(type,msg){

                var title = type;

                toastr[type](msg, title, {
                    positionClass:     'toast-bottom-left',
                    closeButton:       true,
                    progressBar:       true,
                    preventDuplicates: true,
                    newestOnTop:       true,
                    rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                });
            }

            //////default error

            function default_error(){
                var msg   = 'something went wrong please try again!';
                var title = 'oops !';
                var type  = 'warning';

                toastr[type](msg, title, {
                    positionClass:     'toast-bottom-left',
                    closeButton:       true,
                    progressBar:       true,
                    preventDuplicates: true,
                    newestOnTop:       true,
                    rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                });
            }

            //////login

            $('#loginform').submit(function(e){

                var token   = $('meta[name="csrf-token"]').attr('content');
                var link = $(this).attr('data-link');
                var email = $(this).find("[name = 'email']");
                var password = $(this).find("[name = 'password']");

                var formData = new FormData();
                formData.append('_token', token);
                formData.append('email', email);
                formData.append('password', password);


                $.ajax({
                    url: link,
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    data: formData,
                    cache:false,
                    dataType: "JSON",
                        beforeSend:function(){
                        $("#overlay").fadeIn(300); 
                    },
                    success: function(response) {
                        alert(response);
                    },
                    error : function(response){
                        default_error();
                    }
                });

            });

            ///////////load list details

            $('.showdetails').click(function(e){

                var token   = $('meta[name="csrf-token"]').attr('content');
                var link = $(this).attr('data-link');

                var formData = new FormData();
                formData.append('_token', token);


                $.ajax({
                    url: link,
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    data: formData,
                    cache:false,
                    dataType: "HTML",
                        beforeSend:function(){
                    },
                    success: function(response) {
                        $('body #detailsModalCenter').modal('show');
                        $('body #detailsModalCenter .modal-body').html(response);
                    },
                    error : function(response){
                        default_error();
                    }
                });

            });

            //////// change status

            $('.modal').on('shown.bs.modal', function(e) {
                $('.chnage_statue a').click(function(e){

                    var token   = $('meta[name="csrf-token"]').attr('content');
                    var link = $('.chnage_statue').attr('data-link');
                    var statue = $(this).attr('data-type');
                    var list_id = $('.chnage_statue').attr('data-id');

                    var formData = new FormData();
                    formData.append('_token', token);
                    formData.append('statue', statue);


                    $.ajax({
                        url: link,
                        type: 'POST',
                        processData: false, // important
                        contentType: false, // important
                        data: formData,
                        cache:false,
                        dataType: "HTML",
                        beforeSend:function(){
                        },
                        success: function(response) {
                            statue_success();
                            $('body .list_'+list_id).remove();
                            $('body #detailsModalCenter').modal('hide');          
                        },
                        error : function(response){
                            default_error();
                        }
                    });

                });
            });

            ///////show moda addneworder

            $('#addnewlist').click(function(e){

                var token   = $('meta[name="csrf-token"]').attr('content');
                var link = $(this).attr('data-link');


                var formData = new FormData();
                formData.append('_token', token);


                $.ajax({
                    url: link,
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    data: formData,
                    cache:false,
                    dataType: "HTML",
                        beforeSend:function(){
                    },
                    success: function(response) {
                        $('body #addOrderModalCenter').modal('show');
                        $('body #addOrderModalCenter .modal-body').html(response);
                    },
                    error : function(response){
                        default_error();
                    }
                });

            });


            ///add new list_id
            $('.modal').on('shown.bs.modal', function(e) {
                $('#addnewlisting').submit(function(event){  

                    //CreateOrder(event);

                    var link = $(this).attr('data-link');

                    var datastring = $(this).serialize();


                    $.ajax({
                        url: link,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: datastring,
                        dataType: "JSON",
                            beforeSend:function(){
                        },
                        success: function(response) {
                            $('body #addOrderModalCenter').modal('hide');
                            
                            $.each(response, function(key, value) { 
                                statue_toast("success",value)
                            });

                            $('body #addnewlisting')[0].reset();
                        },
                        error : function(response){
                            default_error();
                        }
                    });

                });
            });

            ///////show moda addneworder

            $('#addnewcity').click(function(e){

                var token   = $('meta[name="csrf-token"]').attr('content');
                var link = $(this).attr('data-link');


                var formData = new FormData();
                formData.append('_token', token);


                $.ajax({
                    url: link,
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    data: formData,
                    cache:false,
                    dataType: "HTML",
                    beforeSend:function(){
                    },
                    success: function(response) {
                        $('body #addCityModalCenter').modal('show');
                        $('body #addCityModalCenter .modal-body').html(response);
                    },
                    error : function(response){
                        default_error();
                    }
                });

            });

            ///////show moda editorder

            $('.editlist').click(function(e){

                var token   = $('meta[name="csrf-token"]').attr('content');
                var link = $(this).attr('data-link');


                var formData = new FormData();
                formData.append('_token', token);


                $.ajax({
                    url: link,
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    data: formData,
                    cache:false,
                    dataType: "HTML",
                        beforeSend:function(){
                    },
                    success: function(response) {
                        $('body #addOrderModalCenter').modal('show');
                        $('body #addOrderModalCenter .modal-body').html(response);
                    },
                    error : function(response){
                        default_error();
                    }
                });

            });

            ///add new cities
            $('.modal').on('shown.bs.modal', function(e) {
                $('#addnewcities').submit(function(event){  

                //CreateOrder(event);

                var link = $(this).attr('data-link');

                var datastring = $(this).serialize();


                    $.ajax({
                        url: link,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: datastring,
                        dataType: "JSON",
                        beforeSend:function(){
                        },
                        success: function(response) {
                            $('body #addCityModalCenter').modal('hide');
                            
                                $.each(response, function(key, value) { 
                                    statue_toast("success",value)
                                });

                            $('body #addnewcities')[0].reset();
                        },
                        error : function(response){
                            default_error();
                            return false;
                        }
                    });

                });
            });

            ///////show moda editcity

            $('.editcitymodal').click(function(e){

                var token   = $('meta[name="csrf-token"]').attr('content');
                var link = $(this).attr('data-link');


                var formData = new FormData();
                formData.append('_token', token);


                $.ajax({
                    url: link,
                    type: 'POST',
                    processData: false, // important
                    contentType: false, // important
                    data: formData,
                    cache:false,
                    dataType: "HTML",
                    beforeSend:function(){
                    },
                    success: function(response) {
                        $('body #addCityModalCenter').modal('show');
                        $('body #addCityModalCenter .modal-body').html(response);
                    },
                    error : function(response){
                        default_error();
                    }
                });

            });

            ///add new cities
            $('.modal').on('shown.bs.modal', function(e) {
                $('#updatecities').submit(function(event){  

                ////CreateOrder(event);

                var link = $(this).attr('data-link');

                var datastring = $(this).serialize();


                    $.ajax({
                        url: link,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        data: datastring,
                        dataType: "JSON",
                        beforeSend:function(){
                        },
                        success: function(response) {
                        $('body #addCityModalCenter').modal('hide');
                        
                            $.each(response, function(key, value) { 
                            statue_toast("success",value)
                        });

                        $('body #updatecities')[0].reset();
                        },
                        error : function(response){
                        default_error();
                        return false;
                        }
                    });

                });
            });

        </script>
        
    </body>

</html>