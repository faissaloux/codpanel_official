<!--================================-->
<!-- Details modal Start -->
<!--================================-->
<div    class="modal fade"
        id="detailsModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="detailsModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-dialog-centered"
            role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="detailsModalCenterTitle">تفاصيل الطلب</h5>
            <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body d-flex flex-column">
            

        </div>
        
        
        </div>
    </div>
</div>
<!--/ Details modal End -->

<!--================================-->
<!-- Details modal Start -->
<!--================================-->
<div    class="modal fade"
        id="listDetail"
        tabindex="-1"
        role="dialog"
        aria-labelledby="listDetailTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-dialog-centered"
            role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="listDetailTitle">معلومات العميل</h5>
            <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body d-flex flex-column">
            
        </div>
        
        
        </div>
    </div>
</div>
<!--/ Details modal End -->

<!--================================-->
<!-- History modal Start -->
<!--================================-->
<div    class="modal fade"
        id="historyModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="historyModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="historyModalCenterTitle">تاريخ الأحداث</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                
            </div>
        </div>
    </div>
</div>
<!--/ History modal End -->

<!--================================-->
<!-- Add new order modal Start -->
<!--================================-->
<div    class="modal fade"
        id="addOrderModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addOrderModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-lg modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrderModalCenterTitle">إضافة طلب جديد</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                
            </div>
        </div>
    </div>
</div>
<!--/ Add new order modal End -->

<!--================================-->
<!-- Import modal Start -->
<!--================================-->
<div    class="modal fade"
        id="importModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="importModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-lg modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importModalCenterTitle">استيراد</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
                <div class="modal-cont modal-top mb-3 float-right">
                    <div class="d-flex flex-column">
                        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex mb-2">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="fileInput">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                        <span class="fileName"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block">استيراد</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Import modal End -->

<!--================================-->
<!-- Export modal Start -->
<!--================================-->
<div    class="modal fade"
        id="exportModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exportModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-dialog-centered modal-large"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportModalCenterTitle">تصدير منتجات</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('file-export') }}" method="GET">
                <div class="modal-body d-flex flex-column">
                    <div class="float-right">
                        <div class="d-flex flex-column p-2">
                            <p class="tx-right">
                            يمكن لملف CSV هذا تحديث جميع معلومات المنتج باستثناء كميات المخزون. لتحديث كميات المخزون في مواقع متعددة ، استخدم ملف CSV للمخزون أو محرر المجموعة.                        </p>
                            <div class="d-flex flex-column mb-3">
                                <p class="row mb-2">
                                    <span class="col tx-right">تصدير</span>
                                </p>
                                <ul class="polaris-list pl-0 mb-0">
                                    <li>
                                        <label class="Polaris-Choice_j5gzq d-flex" for="PolarisRadioButton67">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input  id="PolarisRadioButton67"
                                                            name="PolarisChoiceList8"
                                                            type="radio"
                                                            class="Polaris-RadioButton__Input_30ock"
                                                            value="title asc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">الصفحة الحالية</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq d-flex" for="PolarisRadioButton68">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton68" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="title desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">جميع المنتجات</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq d-flex" for="PolarisRadioButton69">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton69" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="created_at asc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">المحدد: 0 منتجات</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq d-flex" for="PolarisRadioButton70">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton70" name="PolarisChoiceList8" type="radio" class="Polaris-RadioButton__Input_30ock" value="created_at desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">18 منتج مطابق لبحثك</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex flex-column">
                                <p class="row mb-2">
                                    <span class="col tx-right">تصدير ك</span>
                                </p>
                                <ul class="polaris-list pl-0 mb-0">
                                    <li>
                                        <label class="Polaris-Choice_j5gzq d-flex" for="PolarisRadioButton67">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton67" name="PolarisChoiceList7" type="radio" class="Polaris-RadioButton__Input_30ock" value="title asc" checked="">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">CSV لـ Excel أو Numbers أو برامج جداول البيانات الأخرى</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="Polaris-Choice_j5gzq d-flex" for="PolarisRadioButton68">
                                            <span class="Polaris-Choice__Control_1u8vs">
                                                <span class="Polaris-RadioButton_bsatr Polaris-RadioButton--newDesignLanguage_1rik8">
                                                    <input id="PolarisRadioButton68" name="PolarisChoiceList7" type="radio" class="Polaris-RadioButton__Input_30ock" value="title desc">
                                                    <span class="Polaris-RadioButton__Backdrop_1x2i2"></span>
                                                </span>
                                            </span>
                                            <span class="Polaris-Choice__Label_2vd36">ملف CSV عادي</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <span>تعرف على المزيد حول <a href="">تصدير المنتجات</a>.</span>
                    
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="submit" class="btn btn-success">تصدير المنتجات</button>
                    <button class="btn btn-default mr-2" data-dismiss="modal" aria-label="Close">إلغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--/ Export modal End -->

<!--================================-->
<!-- Add new city modal Start -->
<!--================================-->
<div    class="modal fade"
        id="addCityModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addCityModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCityModalCenterTitle">إضافة مدينة جديدة</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-content add-new-city-modal">
                <div class="modal-body d-flex flex-column">

                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Add new city modal End -->

<!--================================-->
<!-- cancel reason modal Start -->
<!--================================-->
<div    class="modal fade"
        id="cancelReasonModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="cancelReasonCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelReasonCenterTitle">سبب الإلغاء</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-content add-new-city-modal">
                <div class="modal-body d-flex flex-column">
                    <form id="cancelReason" action="javascript:;" method="POST">
                        @csrf
                        <div class="d-flex flex-column">
                            <div class="form-group">
                                <textarea rows="3" id="cancelreasontext" class="form-control" placeholder="سبب الإلغاء" style="margin-top: 0px; margin-bottom: 0px; height: 100px;"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <p class="row col p-0">
                                <a type="submit" class="btn btn-success btn-block">حفظ سبب الإلغاء</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ cancel reason modal End -->


<!--================================-->
<!-- recall time modal Start -->
<!--================================-->
<div    class="modal fade"
        id="recalltimemodal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="recalltimeCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recalltimeCenterTitle">تاريخ إعادة الإتصال</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-content add-new-city-modal">
                <div class="modal-body d-flex flex-column">
                    <form id="recalltime" action="javascript:;" method="POST">
                        @csrf
                        <div class="d-flex flex-column">
                            <div class="form-group">
                                <input id="recall_date" type="date" class="form-control hasDatepicker">
                            </div>
                            <div class="form-group">
                                <input id="recall_time" type="time" class="form-control hasDatepicker">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <p class="row col p-0">
                                <a type="submit" class="btn btn-success btn-block">حفظ تاريخ إعادة الإتصال</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ recall time modal End -->

<!--================================-->
<!-- Add to stock modal Start -->
<!--================================-->
<div    class="modal fade"
        id="addToStockModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="addToStockModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-lg modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addToStockModalCenterTitle">إضافة السلعة للمخزون</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
            </div>
        </div>
    </div>
</div>
<!--/ Add to stock modal End -->

<!--================================-->
<!-- Return stock modal Start -->
<!--================================-->
<div    class="modal fade"
        id="returnStockModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="returnStockModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-lg modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="returnStockModalCenterTitle">العودة للمخزون</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
            </div>
        </div>
    </div>
</div>
<!--/ Return stock modal End -->

<!--================================-->
<!-- Export stock modal Start -->
<!--================================-->
<div    class="modal fade"
        id="exportStockModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exportStockModalCenterTitle"
        aria-hidden="true">
    <div    class="modal-dialog modal-lg modal-dialog-centered"
            role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportStockModalCenterTitle">تصدير السلعة من المخزون</h5>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex flex-column">
            </div>
        </div>
    </div>
</div>
<!--/ Export stock modal End -->

<!--================================-->
<!-- Edit sortie stock modal Start -->
<!--================================-->
<div    class="modal fade"
        id="editSortieStockModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="editSortieStockModalCenterTitle"
        aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body"> 
              
                <form   class="form-horizontal text-right"
                        id='confirm_stock_form'
                        method='post'
                        action="{{ route('dashboard.stock.validateSortieList') }}"
                        autocomplete="off">
                    @csrf
                    <span>الكمية المتوفرة من هدا المنتوج  <i class="foundStock"></i>   </span>
                       <input type="hidden" value="" class='dontvalidate' name="ProductID" id='SortieProductID' />
                       <input type="hidden" value="" class='dontvalidate' name="SortieListID" id='SortieListID' />
                       <input type="hidden" value=""  class='dontvalidate' id='currentStockAvailable' />
                        <fieldset class="content-group" id="leeetch">
                                <div class="form-group">
                                    <div class="col-lg-11">
                                       
                                        </div>
                                </div>
                
                                <div id="loadedSortielist">
                                    
                                </div>
                                
                        </fieldset>
                        <div class="text-right">
                            <button type="submit" class="btn btn-block btn-success" id="confirm_stock">
                             تعديل وموافقة المخزون 
                                <i class="icon-arrow-left13 position-right"></i>
                            </button>
                        </div>
        
                </form>
              
            </div>
        </div>
    </div>
</div>
<!--/ Edit sortie stock modal End -->


<!--================================-->
<!-- Details modal Start -->
<!--================================-->
    <div class="modal fade" id="DetailsModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body"> 
                
                </div>
            </div>
        </div>
    </div>
<!--/ Details modal End -->