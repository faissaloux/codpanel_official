@extends('provider/layout')

@section('title')
    Edit user | {{ env('APP_NAME') }}
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center p-2 bg-white p-4">
    <h3 class="header-title">تعديل  المستخدم </h3>
    <a href="{{ route('provider.profile') }}" class="ml-2"><i class="fa fa-arrow-left"></i></a>
</div>
<div class="message">
    @if(session()->has('success'))
    <div class="flash successFlash">
        <p>{{ session()->get('success') }}</p>
    </div>
    @elseif(session()->has('failed'))
    <div class="flash failedFlash">
        <p>{{ session()->get('failed') }}</p>
    </div>
    @endif
</div>
<div class="page-inner mt-4">
    <div class="d-flex flex-column">
        <!-- موظفة -->
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="{{ route('provider.update' , ['id' => $content->id, 'role' => $content->role ]) }}" method="POST">
                    @csrf
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span   class="input-group-text d-flex justify-content-center" 
                                                            id="basic-addon3">
                                                        <i class="fa fa-users"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم الموظفة</span>
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
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">البريد الإلكتروني</span>
                                                <input  type="email"
                                                        class="form-control col-10"
                                                        placeholder="البريد الإلكتروني"
                                                        aria-label="Recipient's username"
                                                        name="email"
                                                        value="{{$content->email}}"
                                                        required>
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center" 
                                                            id="basic-addon4">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">كلمة المرور</span>
                                                <input  type="password"
                                                        class="form-control col-10"
                                                        placeholder="كلمة المرور"
                                                        aria-label="Recipient's password"
                                                        name="password">
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">رقم الهاتف</span>
                                                <input  type="number"
                                                        class="form-control col-10"
                                                        placeholder="رقم الهاتف"
                                                        aria-label="Recipient's password"
                                                        name="phone"
                                                        value="{{$content->phone}}"
                                                        required>
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-phone"></i>
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