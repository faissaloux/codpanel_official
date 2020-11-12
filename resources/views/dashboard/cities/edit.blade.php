@extends('dashboard/layout')

@section('title')
    Edit city | Codpanel
@endsection

@section('content')
<div class="d-flex justify-content-between p-2 bg-white p-4">
    <h3 class="header-title">تعديل  المدينة </h3>
</div>
<div class="page-inner mt-4">
    <div class="d-flex flex-column">
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="{{ route('dashboard.cities.update' , ['id' => $content->id ]) }}" method="POST">
                    @csrf
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم المدينة</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="اسم الموظفة"
                                                        aria-label="Username"
                                                        name="name"
                                                        value="{{$content->name}}"
                                                        required>
                                                <div class="input-group-prepend">
                                                    <span   class="input-group-text d-flex justify-content-center" 
                                                            id="basic-addon3">
                                                        <i class="fa fa-building"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">الرمز</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="reference"
                                                        aria-label="city's reference"
                                                        name="reference"
                                                        value="{{$content->reference}}"
                                                        required>
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center" 
                                                            id="basic-addon4">
                                                        <i class="fa fa-barcode"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <span class="ml-2">حفظ التغييرات</span>
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection