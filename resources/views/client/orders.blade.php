@extends('client/layout')

@section('title')
    Orders | Codpanel
@endsection

@section('content')
    <div class="container container-store container-top">
        <div class="row">
            <div class="col col-title d-flex justify-content-between align-items-center">
                <div class="title-name title-table">
                    <h2>Orders</h2>
                    <button class="btn purple-button" style="display: none;">Pay selected</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table sommerce-modals__order-result-table">
                        <thead>
                            <tr class="table-borderless">
                                <th scope="col" class="d-flex align-items-center">ID</th>
                                <th scope="col">Domain</th>
                                <th scope="col">Created</th>
                                <th scope="col">Amount</th>
                                <th scope="col" style="padding-right: 70px">Status</th>
                                <th scope="col" style="width: 160px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">815</label>
                                </td>
                                <th data-label="Domain">mytraffic.ma</th>
                                <td data-label="Created">2020-07-13</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Paid</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">813</label>
                                </td>
                                <th data-label="Domain">auto-sm.com</th>
                                <td data-label="Created">2020-07-11</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Paid</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">811</label>
                                </td>
                                <th data-label="Domain">views.com</th>
                                <td data-label="Created">2020-07-09</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-pending">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Unpaid</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">668</label>
                                </td>
                                <th data-label="Domain">mytraffic.ma</th>
                                <td data-label="Created">2020-04-18</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Paid</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">631</label>
                                </td>
                                <th data-label="Domain">mytraffic.ma</th>
                                <td data-label="Created">2020-03-20</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Paid</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">593</label>
                                </td>
                                <th data-label="Domain">mytraffic.ma</th>
                                <td data-label="Created">2020-02-12</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Paid</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">565</label>
                                </td>
                                <th data-label="Domain">mytraffic.ma</th>
                                <td data-label="Created">2020-01-13</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Paid</span>
                                    </span>
                                </td>
                                <td class="table-separator"></td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="ID">
                                    <label class="form-check-label" for="inlineCheckbox1">326</label>
                                </td>
                                <th data-label="Domain">s-views.com</th>
                                <td data-label="Created">2019-08-28</td>
                                <td data-label="Amount">$35.00</td>
                                <td data-label="Status">
                                    <span class="button-status-active">
                                        <span class="button-status-oval"></span>
                                        <span class="button-status-text">Paid</span>
                                    </span>
                                </td>
                                <td data-label="Actions" class="d-flex justify-content-between w-100">
                                    <a href="{{ route('client.orderdetail') }}">
                                        <i class="fa fa-file" aria-hidden="true"></i>
                                        View details
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection