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
                    @if( Session('error') )
                        <div class="alert alert-danger text-center">{{ Session('error') }}</div>
                    @endif
                    <div class="status-long-container d-flex justify-content-between">
                        <h2>Order #{{ $order->id }}</h2>
                        <span class="button-status-pending status-long d-flex align-items-center justify-content-center">
                            <span class="button-status-oval"></span>
                            <span class="button-status-text">Unpaid</span>
                        </span>
                    </div>
                    <form id="login-form" class="invoice-card" action="{{ route('client.checkout', $order->id) }}" method="post">
                        @csrf
                        <fieldset>
                            <table class="table table-stores table-order-detail">
                                <thead>
                                    <tr>
                                        <th scope="col">Details</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-borderless">
                                        <td>First month maintenance for {{ $order->staff->domain_name->name }}</td>
                                        <td>$35.00</td>
                                    </tr>
                                    <tr class="total-cost">
                                        <td class="d-flex justify-content-end">Total:</td>
                                        <td>$35.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="order-new">
                                <div class="payment-methods-title">Payment methods</div>
                                <div class="form-check">
                                    <input  class="form-check-input payment-code"
                                            type="radio"
                                            name="payment_method"
                                            id="radio-fastspring"
                                            value="stripe"
                                            checked
                                    >
                                    <label class="form-check-label d-flex justify-content-between" for="radio-fastspring">
                                        <div>
                                            <span>Credit Card</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input  class="form-check-input payment-code"
                                            type="radio"
                                            name="payment_method"
                                            id="radio-paypal"
                                            value="paypal">
                                    <label class="form-check-label d-flex justify-content-between" for="radio-paypal">
                                        <div>
                                            <span>PayPal</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="alert alert-pay alert-warning warning-text hidden" id="paymentContent"></div>
                            <button type="submit" id="pay-now" class="btn purple-button btn-block w-100 btn-order">
                                Pay now
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
            window.modules.orderMark = {
                "user_id"   :1203,
                "events"    :[2]
            };
            window.modules.invoiceController = {
                "live"  :   true,
                "code"  :   "fastspring",
                "notes" :   {
                    "paypal"    :"PayPal payments accepted only from Personal PayPal accounts.<br>\r\nIf your PayPal account is Business you may pay with 2Checkout.",
                    "2checkout" :""
                }
            };
            window.modules.indexController = [];
    </script>
@endsection
