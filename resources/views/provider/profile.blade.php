@extends('provider/layout')

@section('title')
   Profile | {{ env('APP_NAME') }}
@endsection

@section('content')

<div class="page-inner mt-4">
    <div class="d-flex flex-column">
        <div class="col-12 mb-2">
            <div class="card mg-b-30">
                <div class="card-header d-flex align-items-center justify-content-between">
                   <h6 class="tx-16 tx-semibold mg-b-0">الملف الشخصي</h6>
                   <a href="{{ route('provider.index') }}" class="ml-2"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="card-body tx-right">
                   <h6 class="my-3">المعلومات الشخصية</h6>
                   <div class="row mb-2 p-2">
                      <div class="col-md-2 tx-gray-500 tx-semibold">الاسم الكامل:</div>
                      <div class="col-md-9">{{ $provider->full_name }}</div>
                   </div>
                   <div class="row mb-2 p-2">
                      <div class="col-md-2 tx-gray-500 tx-semibold">الوظيفة:</div>
                   <div class="col-md-9">{{ $provider->role }}</div>
                   </div>
                   <h6 class="my-3">جهات الاتصال</h6>
                   <div class="row mb-2 p-2">
                      <div class="col-md-2 tx-gray-500 tx-semibold">البريد الإلكتروني:</div>
                        <div class="col-md-9"><a href="mailto: {{ $provider->email }}">{{ $provider->email }}</a></div>
                   </div>
                   <div class="row mb-2 p-2">
                      <div class="col-md-2 tx-gray-500 tx-semibold">الهاتف:</div>
                        <div class="col-md-9"><a href="tel:{{ $provider->phone }}">{{ $provider->phone }}</a></div>
                   </div>
                </div>
                <div class="card-body tx-right" >
                  <a href="{{ route('provider.profile.edit', ['role' => $provider->roleEn, 'id' => $provider->id]) }}"
                     class="btn btn-primary"
                  >
                     تعديل
                  </a>
                </div>
                <div class="card-footer text-center p-0">
                   <div class="row no-gutters row-bordered row-border-light">
                      <a href="#" class="d-flex col flex-column  py-3">
                         <div class="font-weight-bold">24</div>
                         <div class="text-muted small">posts</div>
                      </a>
                      <a href="#" class="d-flex col flex-column  py-3 bd-l bd-r">
                         <div class="font-weight-bold">51</div>
                         <div class="text-muted small">videos</div>
                      </a>
                      <a href="#" class="d-flex col flex-column  py-3">
                         <div class="font-weight-bold">215</div>
                         <div class="text-muted small">photos</div>
                      </a>
                   </div>
                </div>
             </div>
        </div>
    </div>
</div>

@endsection