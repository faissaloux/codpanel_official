@extends('client/layout')

@section('title')
    Order now | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="container container-white container-ordernow">
        <div class="container-form order-container form-fix-padding">
            <div class="row justify-content-center">
                <div class="order-domain col-12 col-md-8 col-title d-flex justify-content-between align-items-center">
                    <div class="title-name">
                        <h2>Order new store</h2>
                    </div>
                </div>
                <div class="have-domain col-12 col-md-8 order-store">
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger text-center">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form   id="orderForm"
                            class="form-domain form-visible"
                            action="{{ route('client.orderStore') }}"
                            method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label"
                                        for="orderstoreform-admin_email">
                                    Admin email
                                </label>
                                <input  type="email"
                                        id="orderstoreform-admin_email"
                                        class="input"
                                        name="email"
                                        placeholder="email@example.com"
                                        value="{{ old('email') }}"
                                >
                                <p class="help-block help-block-error"
                                        style="display: none;"></p>
                            </div>
                            <div class="form-group">
                                <label  class="control-label"
                                        for="orderstoreform-admin_username">
                                    Admin username
                                </label>
                                <input  type="text"
                                        id="orderstoreform-admin_username"
                                        class="input"
                                        name="username"
                                        placeholder="johndoe"
                                        aria-required="true"
                                        value="{{ old('username') }}"
                                >
                                <p  class="help-block help-block-error"
                                    style="display: none;"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"
                                    for="orderstoreform-admin_password">
                                Admin password
                            </label>
                            <input  type="password"
                                    id="orderstoreform-admin_password"
                                    class="input"
                                    name="password"
                                    placeholder="Your password"
                                    aria-required="true">
                            <p  class="help-block help-block-error"
                                style="display: none;"></p>
                        </div>
                        <div class="form-group">
                            <label  class="control-label"
                                    for="orderstoreform-confirm_password">
                                Confirm password
                            </label>
                            <input  type="password"
                                    id="orderstoreform-confirm_password"
                                    class="input"
                                    name="password_confirmation"
                                    placeholder="Confirm password"
                                    aria-required="true">
                            <p  class="help-block help-block-error"
                                style="display: none;"></p>
                        </div>
                        <div class="order-buttons mb-3">
                            <div class="text-center">
                            <a  href="{{ route('client.panels') }}"
                                class="arrow-left-button svg-button d-flex justify-content-center mr-3"
                            >
                                Back
                            </a>
                            </div>
                            <button type="submit" class="btn purple-button btn-block">
                                Complete order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
