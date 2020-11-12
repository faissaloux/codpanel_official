@extends('dashboard/layout')

@section('title')
    Cities | {{ env('APP_NAME') }}
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center p-2 bg-white p-4">
    <h3 class="header-title">المدن والموزعين المكلفين بهم</h3>
    <div class="btn-group btn-top d-flex justify-content-end btn-action-sm-box" role="group">
        <a href="#" class="btn btn-primary d-flex col-4 border-none">
            <span class="d-flex justify-content-center add-new-icon">
                <i class="mdi mdi-plus d-flex align-items-center text-white"></i>
            </span>
            <span   class="add-new-text"
                    id="addnewcity"
                    data-link="{{ route('dashboard.cities.create') }}">
                إضافة مدينة جديدة
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
                            <th scope="col" class="arabic" data-type="city">المدينة</th>
                            <th scope="col" class="arabic" data-type="reference">الرمز</th>
                            <th scope="col" class="arabic" data-type="provider">الموزع</th>
                            <th scope="col" class="arabic">تعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <th scope="row"><input type="checkbox" class="hoverRow"/></th>
                                <td data-type="city">
                                    <span>{{ $city->name }}</span>
                                </td>
                                <td data-type="reference">
                                    <span>{{ $city->reference }}</span>
                                </td>
                                <td data-type="provider">
                                    <span>{{ $city->user->name }}</span>
                                </td>
                                <td>
                                    <a  type="button"
                                        data-link="{{ route('dashboard.cities.edit' , ['id' => $city->id ]) }}"
                                        class="btn btn-primary btn-lg border-none loadactions rounded-custom text-white edit editcitymodal">
                                        تعديل
                                    </a>
                                    <a  type="button"
                                        href="{{ route('dashboard.cities.delete' , ['id' => $city->id ]) }}"
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