@extends('dashboard/layout')
@section('content')

<div class="d-flex justify-content-between align-items-center p-2 bg-white p-4">
    <h3 class="header-title">الأعضاء</h3>
    <div class="btn-group btn-top d-flex justify-content-end btn-action-sm-box" role="group">
        <a href="{{route('dashboard.users.create')}}" class="btn btn-primary d-flex col-4 border-none">
            <span class="d-flex justify-content-center add-new-icon">
                <i class="mdi mdi-plus d-flex align-items-center text-white"></i>
            </span>
            <span class="add-new-text">
                إضافة عضو جديد
            </span>
        </a>
    </div>
</div>
<div class="page-inner mt-4">
    <div class="d-flex">
        <div class="col-12">
            <div class="card-body pd-0 tx-center">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" class="show-actions-menu"/></th>
                            <th scope="col" class="arabic" data-type="reference">الصورة</th>
                            <th scope="col" class="arabic" data-type="reference">اسم<br class="sm-break"> المستخدم</th>
                            <th scope="col" class="arabic" data-type="email">الإميل</th>
                            <th scope="col" class="arabic" data-type="registration">تاريخ<br class="sm-break"> التسجيل</th>
                            <th scope="col" class="arabic" data-type="job">الوظيفة</th>
                            <th scope="col" class="arabic" data-type="phone">رقم الهاتف</th>
                            <th scope="col" class="arabic">تعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                            <td data-type="reference">
                                <span>{{$user->name}}</span>
                            </td>
                            <td data-type="avatar">
                                @if(!empty ( $user->image ))  
                                <div class="avatar mr-2"><img src="/uploads/{{$user->image}}" class="rounded-circle" alt=""></div>
                                @else
                            <div class="avatar mr-2"><span style="background-color: {{ $user->color() }}" class="avatar-initial rounded-circle">{{ Str::limit($user->name, 1 , "") }}</span></div>
                                @endif
                            </td>
                            <td data-type="email">
                                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                            </td>
                            <td data-type="registration">
                                <span>منذ<br class="sm-break"> أسبوعين</span>
                            </td>
                            <td data-type="job">
                                <span @if($user->role == "admin"){ class="bg-success text-white p-1" }
                                    @elseif($user->role == "employee"){ class="bg-primary text-white p-1" }
                                    @elseif($user->role == "provider"){ class="bg-warning text-white p-1" } @endif >{{$user->role}}</span>
                            </td>
                            <td data-type="phone">
                                <a href="tel:{{$user->phone}}">{{$user->phone}}</a>
                            </td>
                            <td>
                                <a  type="button" href="{{route('dashboard.users.edit' , ['id' => $user->id ])}}"
                                    class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit">
                                    تعديل
                                </a>
                                <a  type="button"
                                    href="{{ route('dashboard.users.delete' , ['id' => $user->id ]) }}"
                                    class="btn btn-danger btn-lg border-none loadactions rounded-custom text-white delete">
                                    حذف
                                </a> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection