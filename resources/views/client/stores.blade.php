@extends('client/layout')

@section('title')
   Stores | Codpanel
@endsection

@section('content')
    <div class="container container-store container-top">
        <div class="row">
            <div class="col col-title">
                <div class="title-name title-table d-flex flex-sm-row flex-column justify-content-sm-between align-items-sm-center">
                    <h2 class="title-bottom">Stores</h2>
                    <a href="{{ route('client.ordernow') }}"
                        class="btn purple-button d-flex justify-content-center align-items-center" >
                        Order store
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-stores sommerce-modals__order-result-table">
                    <thead>
                    <tr class="table-borderless">
                        <th scope="col">Domain</th>
                        <th scope="col">Created</th>
                        <th scope="col">Expiry</th>
                        <th scope="col" style="padding-right: 80px;">Status</th>
                        <th scope="col" style="width: 275px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="store-action">
                            <tr class="disable-text">
                                <td data-label="Domain">views.com</td>
                                <td data-label="Created">2020-07-09 06:42:53</td>
                                <td data-label="Expiry"></td>
                                <td data-label="Status">
                                    <span class="button-status-pending">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Pending</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <div class="actions">
                                        <a class="action-admin" target="_blank">
                                            <svg height='24' width='24' >
                                                <use xlink:href='/themes/img/sprite.svg#admin-area'>
                                                </use>
                                            </svg>
                                            Admin area
                                        </a>
                                        <a class="" href="#" onclick="event.preventDefault();">
                                            <svg height='24' width='24' >
                                                <use xlink:href='/themes/img/sprite.svg#staff'>
                                                </use>
                                            </svg>
                                        Staff
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Domain">mytraffic.ma</td>
                                <td data-label="Created">2019-08-28 14:53:01</td>
                                <td data-label="Expiry">2020-08-13 10:47:18</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Active</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <div class="actions">
                                        <a class="action-admin" href="http://mytraffic.ma/admin" target="_blank">
                                            <svg height='24' width='24' >
                                                <use xlink:href='/themes/img/sprite.svg#admin-area'>
                                                </use>
                                            </svg>
                                            Admin area
                                        </a>
                                        <a class="action-admin" href="{{ route('client.staff') }}">
                                            <svg height='24' width='24' >
                                                <use xlink:href='/themes/img/sprite.svg#staff'>
                                                </use>
                                            </svg>
                                            Staff
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Domain">store.auto-sm.com</td>
                                <td data-label="Created">2020-07-11 16:49:01</td>
                                <td data-label="Expiry">2020-08-11 16:49:01</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Active</span>
                                    </span>
                                </td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <div class="actions">
                                        <a class="action-admin" href="http://store.auto-sm.com/admin" target="_blank">
                                            <svg height='24' width='24' >
                                                <use xlink:href='/themes/img/sprite.svg#admin-area'>
                                                </use>
                                            </svg>
                                            Admin area
                                        </a>
                                        <a class="action-admin" href="staff.php">
                                            <svg height='24' width='24' >
                                                <use xlink:href='/themes/img/sprite.svg#staff'>
                                                </use>
                                            </svg>
                                            Staff
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection