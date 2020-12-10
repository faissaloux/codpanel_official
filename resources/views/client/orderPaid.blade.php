@extends('client/layout')

@section('title')
    Order detail | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="container container-invoice mt-5">
        <div class="row align-items-center flex-column">
            <div class="col-12 col-lg-8">
                <a href="{{ route('client.orders') }}" class="mb-3 arrow-left-button svg-button d-flex">
                    Back
                </a>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between invoice-solo">
                            <h2>Order #{{ $order->id }}</h2>
                            <span class="button-status-active status-long d-flex align-items-center justify-content-center">
                                <span class="button-status-oval"></span>
                                <span class="button-status-text">Paid</span>
                            </span>
                        </div>

                        <table class="table table-stores table-order-detail">
                            <thead>
                            <tr>
                                <th scope="col">Details</th>
                                <th scope="col">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <tr class="table-borderless">
                                    <td>One month maintenance for {{ $order->domain_name->name }}</td>
                                    <td>$35.00</td>
                                </tr>
                                <tr class="total-cost">
                                    <td class="d-flex justify-content-end">Total:</td>
                                    <td>$35.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
