@extends('client.layout')

@section('title')
    Pay order {{ $order->id }} | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="container-top" style="height: 100vh;">
        <div class="container">
            <h3 class="text-center mb-3">Pay for order {{ $order->id }}</h3>
            @if(Session('error'))
                <div class="alert alert-danger text-center">
                    {{ Session('error') }}
                </div>
            @endif
            <form action="{{ route('client.stripe.proceed', $order->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div id="card-errors" class="text-center hide alert alert-danger" role="alert"></div>
                        <div id="card-element"></div>
                        <input type="submit" class="btn btn-success" value="Proceed the payment" style="margin: 15px 0">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <style>
        .hide { display: none; }
    </style>
@endsection

@section('javascript')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_PUBLISHABLE_KEY') }}');

        var elements = stripe.elements();

        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        cardElement.on('change', function(event) {
            let displayError = $('#card-errors');
            if (event.error) {
                if ( displayError.css('display') === 'none' ) {
                    displayError.slideToggle();
                }
                displayError.text(event.error.message);
            } else {
                if ( displayError.css('display') !== 'none' ) {
                    displayError.slideToggle();
                }
                displayError.text('');
            }
        });

        cardElement.on('submit', function (event) {
            event.preventDefault();
        });

        $(document).ready(function () {
            let form = $('form');
            form.on('submit', function(e) {
                if (!$('form').data('cc-on-file')) {
                    e.preventDefault();
                    stripe.createToken(cardElement).then(stripeResponseHandler);
                }
            });

            function stripeResponseHandler(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    let errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    // token contains id, last4, and card type
                    const token = result.token.id;
                    // insert the token into the form so it gets submitted to the server
                    form.find('input[type=text]').empty();
                    form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    form.get(0).submit();
                }
            }
        });
    </script>
@endsection
