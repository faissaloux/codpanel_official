@extends('dashboard/layout')

@section('title')
   Settings | {{ env('APP_NAME') }}
@endsection

@section('content')
<div class="col-xl">
    <div class="form-layout d-flex justify-content-center col-12">
       <form    id="login-form"
                action="{{ route('dashboard.update') }}"
                method="post"
                class="col-6 mt-4">
            @csrf
            <div class="row">
                <label class="col-sm-3 form-control-label text-right">الحقل الأول: <span class="tx-danger">*</span></label>
                <div class="col-sm">
                    <input type="text" name="firstField" class="form-control" placeholder="الحقل الأول">
                </div>
            </div>
            <!-- row -->
            <div class="row mg-t-20">
                <label class="col-sm-3 form-control-label text-right">الحقل الثاني: <span class="tx-danger">*</span></label>
                <div class="col-sm">
                    <input type="text" name="lastField" class="form-control" placeholder="الحقل الثاني">
                </div>
            </div>
            <div class="form-layout-footer mg-t-30">
                <button class="btn btn-primary">تأكيد</button>
            </div>
            <!-- form-layout-footer -->
        </form>
    </div>
    <!-- form-layout -->
 </div>
@endsection