@extends('dashboard/layout')

@section('title')
    Products | {{ env('APP_NAME') }}
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center p-2 bg-white p-4">
    <h3 class="header-title">المنتجات</h3>
    <div class="btn-group btn-top d-flex justify-content-end btn-action-sm-box" role="group">
        <a href="{{route('dashboard.products.create')}}" class="btn btn-primary d-flex col-4 border-none">
            <span class="d-flex justify-content-center add-new-icon">
                <i class="mdi mdi-plus d-flex align-items-center text-white"></i>
            </span>
            <span class="add-new-text">
                إضافة منتج جديد
            </span>
        </a>
    </div>
</div>
<div class="page-inner mt-4">
    <div class="d-flex flex-column">
        <div class="col-12 mb-2 d-flex">
            <div class="dropdow">
                <button class="btn btn-secondary sort-container d-flex align-items-center"
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <i class="mdi mdi-sort text-white"></i>
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
            <div class="btn-container col-2">
                <button class="btn btn-secondary export-product-container d-flex align-items-center"
                        type="button"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                    <i class="mdi mdi-upload"></i>
                    <span class="mr-2">تصدير منتج</span>
                </button>
            </div>
        </div>
        <div class="col-12">
                
            <div class="card-body pd-0 tx-center load-table">
                <table class="table table-primary table-hover">

                <!-- spinner -->
                <center class="mt-2 ">
                    <div class="spinner-loader-container">
                        <div class="spinner-loader align-middle">
                            <div class="spinner-border mb-2 text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </center>
                <!-- End spinner -->

                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
                            <th scope="col" data-type="avatar"></th>
                            <th scope="col" class="arabic" data-type="reference">Reference</th>
                            <th scope="col" class="arabic" data-type="product">اسم المنتوج</th>
                            <th scope="col" class="arabic" data-type="prix_jmla">سعر الجملة</th>
                            <th scope="col" class="arabic">تعديل</th>
                        </tr>
                    </thead>
                    <tbody class="table-body-listing">
                        @foreach($products as $product)
                            <tr>
                                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                                <td data-type="image">
                                    @if(!empty ( $product->image ))  
                                        <div class="avatar mr-2 img-cont">
                                            <img src="/uploads/{{$product->image}}" class="rounded-circle" alt="">
                                        </div>
                                    @else
                                        <div class="avatar mr-2 img-cont">
                                            <span style="background-color: {{ $product->color() }}" class="avatar-initial rounded-circle">{{ Str::limit($product->name, 1 , "") }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td data-type="reference">
                                    <span>{{ $product->reference }}</span>
                                </td>
                                <td data-type="product">
                                    <span>{{ $product->name }}</span>
                                </td>
                                <td data-type="prix_jmla">
                                    <span>{{ $product->prix_jmla }}</span>
                                </td>
                                <td>
                                    <a  type="button"
                                        href="{{ route('dashboard.products.edit' , ['id' => $product->id ]) }}"
                                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit">
                                        تعديل
                                    </a>
                                    <a  type="button"
                                        href="{{ route('dashboard.products.delete' , ['id' => $product->id ]) }}"
                                        class="btn btn-danger btn-lg border-none loadactions rounded-custom text-white delete">
                                        حذف
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="justify-content-center paginate">
                        {!! $products->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>



</div>

@endsection