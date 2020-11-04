@extends('dashboard/layout')
@section('content')
<div class="d-flex justify-content-between p-2 bg-white p-4">
    <h3 class="header-title">إضافة مستخدم جديد</h3>
</div>
<div class="page-inner mt-4">
    <div class="d-flex flex-column">
        <!-- موظفة -->
        <h1 class="tx-right">موظفة</h1>
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="{{ route('dashboard.users.store') }}" method="POST">
                    @csrf
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم الموظفة</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="اسم الموظفة"
                                                        aria-label="Username"
                                                        name="name"
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
                                                        name="password"
                                                        required>
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
                                                        required>
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="role" value="employee">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <span class="ml-2">إنشاء المستخدم</span>
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- مرسل الطلبات -->
        <h1 class="tx-right">مرسل الطلبات</h1>
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="/user/create" method="GET">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم المستخدم</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="اسم المستخدم"
                                                        aria-label="Username"
                                                        aria-describedby="basic-addon3">
                                                <div class="input-group-prepend">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon3">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">البريد الإلكتروني</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="البريد الإلكتروني"
                                                        aria-label="Recipient's username"
                                                        aria-describedby="basic-addon4">
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
                                                        aria-describedby="basic-addon4">
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">عمولة المرسلة</span>
                                                <input  type="number"
                                                        class="form-control col-10"
                                                        placeholder="يسمح بإدخال الأرقام فقط ، والسعر بالدرهم المغربي"
                                                        aria-label="Recipient's password"
                                                        aria-describedby="basic-addon4">
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">رقم الهاتف</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="رقم الهاتف"
                                                        aria-label="Recipient's password"
                                                        aria-describedby="basic-addon4">
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
                                    <span class="ml-2">إنشاء المستخدم</span>
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- مدير -->
        <h1 class="tx-right">مدير</h1>
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="/user/create" method="GET">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم المستخدم</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="اسم المستخدم"
                                                        aria-label="Username"
                                                        aria-describedby="basic-addon3">
                                                <div class="input-group-prepend">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon3">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">البريد الإلكتروني</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="البريد الإلكتروني"
                                                        aria-label="Recipient's username"
                                                        aria-describedby="basic-addon4">
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
                                                        aria-describedby="basic-addon4">
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">رقم الهاتف</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="رقم الهاتف"
                                                        aria-label="Recipient's password"
                                                        aria-describedby="basic-addon4">
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
                                    <span class="ml-2">إنشاء المستخدم</span>
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- مظيفة بيانات -->
        <h1 class="tx-right">مظيفة بيانات</h1>
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="/user/create" method="GET">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم المستخدم</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="اسم المستخدم"
                                                        aria-label="Username"
                                                        aria-describedby="basic-addon3">
                                                <div class="input-group-prepend">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon3">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">البريد الإلكتروني</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="البريد الإلكتروني"
                                                        aria-label="Recipient's username"
                                                        aria-describedby="basic-addon4">
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
                                                        aria-describedby="basic-addon4">
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <span class="ml-2">إنشاء المستخدم</span>
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- لجنة المتابعة -->
        <h1 class="tx-right">لجنة المتابعة</h1>
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="/user/create" method="GET">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم الموظفة</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="اسم الموظفة"
                                                        aria-label="Username"
                                                        aria-describedby="basic-addon3">
                                                <div class="input-group-prepend">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon3">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">البريد الإلكتروني</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="البريد الإلكتروني"
                                                        aria-label="Recipient's username"
                                                        aria-describedby="basic-addon4">
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
                                                        aria-describedby="basic-addon4">
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">رقم الهاتف</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="رقم الهاتف"
                                                        aria-label="Recipient's password"
                                                        aria-describedby="basic-addon4">
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
                                    <span class="ml-2">إنشاء المستخدم</span>
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- المخزون -->
        <h1 class="tx-right">المخزون</h1>
        <div class="col-12 mb-2">
            <div class="form mb-4">
                <form action="/user/create" method="GET">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col">
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">اسم المستخدم</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="اسم المستخدم"
                                                        aria-label="Username"
                                                        aria-describedby="basic-addon3">
                                                <div class="input-group-prepend">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon3">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">البريد الإلكتروني</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="البريد الإلكتروني"
                                                        aria-label="Recipient's username"
                                                        aria-describedby="basic-addon4">
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
                                                        aria-describedby="basic-addon4">
                                                <div class="input-group-append">
                                                    <span   class="input-group-text d-flex justify-content-center"
                                                            id="basic-addon4">
                                                        <i class="fa fa-key"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="col-2 tx-right">رقم الهاتف</span>
                                                <input  type="text"
                                                        class="form-control col-10"
                                                        placeholder="رقم الهاتف"
                                                        aria-label="Recipient's password"
                                                        aria-describedby="basic-addon4">
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
                                    <span class="ml-2">إنشاء المستخدم</span>
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