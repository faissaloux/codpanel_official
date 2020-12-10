@extends('client/layout')

@section('title')
    Panels | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="container container-store container-top">
        <div class="row">
            <div class="col col-title">
                <div
                    class="title-name title-table d-flex flex-sm-row flex-column justify-content-sm-between align-items-sm-center">
                    <h2 class="title-bottom">Panels</h2>
                    <a href="{{ route('client.orderNow') }}"
                       class="btn purple-button d-flex justify-content-center align-items-center">
                        Order panel
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-stores sommerce-modals__order-result-table">
                    <thead>
                    <tr class="table-borderless">
                        <th scope="col">Domain Name</th>
                        <th scope="col">Created</th>
                        <th scope="col">Expiry</th>
                        <th scope="col" style="padding-right: 80px;">Status</th>
                        <th scope="col" style="width: 275px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="store-action">
                    @foreach($client_orders as $order)
                        @if ($order->paid)
                            <tr>
                                <td>{{ $order->domain_name->name }}</td>
                                <td data-label="Created">{{ $order->domain_name->created_at }}</td>
                                <td data-label="Expiry">{{ $order->domain_name->expired_at }}</td>
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
                                            <svg height='24' width='24'>
                                                <use xlink:href='/themes/img/sprite.svg#admin-area'></use>
                                            </svg>
                                            Admin area
                                        </a>
                                        <a class="action-admin" href="{{ route('client.staff', $order->domain_name->id) }}">
                                            <svg height='24' width='24'>
                                                <use xlink:href='/themes/img/sprite.svg#staff'>
                                                </use>
                                            </svg>
                                            Staff
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr class="disable-text">
                                <td>{{ $order->domain_name->name }}</td>
                                <td data-label="Created">{{ $order->domain_name->created_at }}</td>
                                <td data-label="Expiry">{{ $order->domain_name->expired_at }}</td>
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
                                            <svg height='24' width='24'>
                                                <use xlink:href='/themes/img/sprite.svg#admin-area'>
                                                </use>
                                            </svg>
                                            Admin area
                                        </a>
                                        <a class="" href="#" onclick="event.preventDefault();">
                                            <svg height='24' width='24'>
                                                <use xlink:href='/themes/img/sprite.svg#staff'>
                                                </use>
                                            </svg>
                                            Staff
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
