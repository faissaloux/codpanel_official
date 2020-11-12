@extends('client/layout')

@section('title')
    Order now | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="container container-white container-ordernow">
        <div class="container-form order-container">
            <div class="row justify-content-center">
                <div class="order-domain col-12 col-md-8 col-title d-flex justify-content-between align-items-center">
                    <div class="title-name">
                        <h2>Order new store</h2>
                    </div>
                </div>
                <div class="have-domain col-12 col-md-8 order-store">
                    <h4>Do you have a domain name?</h4>
                        <form   id="orderForm"
                                class="form-domain form-visible"
                                action="{{ route('client.orderStore') }}"
                                method="post">
                            @csrf
                            <div class="form-check already-domain">
                                <input  type="radio"
                                        id="domain-true"
                                        class="form-check-input radio-order domain-true"
                                        name="hasDomain"
                                        value="1">
                                <label  class="form-check-label"
                                        for="domain-true">
                                    I already have a domain name
                                </label>
                            </div>
                            <div class="form-check ">
                                <input  type="radio"
                                        id="domain-false"
                                        class="form-check-input radio-order domain-false"
                                        name="hasDomain" value="0">
                                <label  class="form-check-label"
                                        for="domain-false">
                                    I want to register a new domain name
                                </label>
                            </div>
                    
                            <div    id="orderDomainError"
                                    class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                            <fieldset>
                                <div class="order-body">
                                    <h4>Type your domain name for new store</h4>
                                    <div class="form-group">
                                        <label  class="control-label"
                                                for="domain">
                                            Domain
                                        </label>
                                        <input  type="text"
                                                id="domain"
                                                class="input"
                                                name="domain"
                                                placeholder="domain.com" 
                                                aria-required="true">

                                        <p class="help-block help-block-error" style="display: none;"></p>

                                    </div>

                                    <div class="registrar-domain">
                                        Please visit your registrar's dashboard to change nameservers to: <br>
                                        <b>ns1.sommerce.com</b> <br>
                                        <b>ns2.sommerce.com</b>
                                    </div>
                                    <h4>Type store admin information</h4>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label" 
                                                    for="orderstoreform-admin_email"
                                            >
                                                Admin email
                                            </label>
                                            <input  type="email" 
                                                    id="orderstoreform-admin_email" 
                                                    class="input" 
                                                    name="email"
                                                    placeholder="email@example.com">
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
                                                    aria-required="true">
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
                                                name="passwordConfirmation"
                                                placeholder="Confirm password"
                                                aria-required="true">
                                        <p  class="help-block help-block-error"
                                            style="display: none;"></p>
                                    </div>
                                    <div class="order-buttons mb-3">
                                        <div class="text-center">
                                        <a  href="{{ route('client.stores') }}"
                                            class="arrow-left-button svg-button d-flex justify-content-center mr-3"
                                        >
                                            Back
                                        </a>
                                        </div>
                                        <button type="submit" class="btn purple-button btn-block">
                                            Complete order
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    <!-- REGISTER DOMAIN FORM-->
                    
                        <form   id="orderFormWithNewDomain"
                                class="form-register form-domainless form-radio form-hidden"
                                action="{{ route('client.orderStore') }}"
                                method="post"
                                style="display: none;">
                            @csrf
                            <div id="orderDomainError" class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                                <fieldset>
                                    <div class="order-body">
                                        <h4>Search domain name for new store</h4>
                                        <div class="form-group d-flex justify-content-between mb-0">
                                            <div class="form-group required d-flex flex-grow-1">
                                                <input  type="text"
                                                        id="searchDomain"
                                                        class="input"
                                                        name="domainSearch"
                                                        placeholder="domain.com"
                                                        aria-required="true">
                                                <p class="help-block help-block-error" style="display: none;"></p>
                                                <select id="domain_zone" class="form-control no-radius" name="domainZone">
                                                    <option value="com">.com - $8.95</option>
                                                    <option value="net">.net - $11.75</option>
                                                    <option value="org">.org - $10.95</option>
                                                    <option value="biz">.biz - $10.85</option>
                                                    <option value="info">.info - $10.85</option>
                                                    <option value="name">.name - $8.75</option>
                                                    <option value="me">.me - $15.75</option>
                                                    <option value="pro">.pro - $11.00</option>
                                                    <option value="mobi">.mobi - $12.25</option>
                                                </select>
                                                <p class="help-block help-block-error" style="display: none;"></p>
                                            </div>
                                            <button type="button"
                                                    class="btn purple-button d-flex justify-content-center align-items-center"
                                                    id="searchDomainSubmit"
                                                    data-action="/search-domains">
                                                <img    src="https://ucarecdn.com/d9ab1215-9aff-43de-a5d4-143bd96e7453/seecopy.svg"
                                                        alt="Search">
                                                <span   class="spinner-border spinner-border-sm"
                                                        role="status"
                                                        aria-hidden="true"
                                                        style="display: none;"></span>
                                            </button>
                                        </div>

                                        <div class="searchResult">
                                            <input  type="text"
                                                    id="domainInput"
                                                    class="input"
                                                    name="domain"
                                                    aria-required="true"
                                                    style="display: none;">
                                            <p class="help-block help-block-error" style="display: none;"></p>
                                            <div class="order-new" id="searchResultContainer"></div>
                                        </div>

                                        <h4>Type store admin information</h4>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label  class="control-label"
                                                        for="orderstoreform-admin_email">Admin email</label>
                                                <input  type="email"
                                                        id="orderstoreform-admin_email"
                                                        class="input"
                                                        name="email"
                                                        placeholder="email@example.com">
                                                <p class="help-block help-block-error" style="display: none;"></p>
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label"
                                                        for="orderstoreform-admin_username">Admin username</label>
                                                <input  type="text" id="orderstoreform-admin_username"
                                                        class="input"
                                                        name="username"
                                                        placeholder="johndoe"
                                                        aria-required="true">
                                                <p class="help-block help-block-error" style="display: none;"></p>
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
                                            <p class="help-block help-block-error"
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
                                                    name="passwordConfirmation"
                                                    placeholder="Confirm password"
                                                    aria-required="true">
                                            <p class="help-block help-block-error" style="display: none;"></p>
                                        </div>
                                        <div class="order-buttons mb-3">
                                            <div class="text-center">
                                                <a  href="{{ route('client.stores') }}"
                                                    class="arrow-left-button svg-button d-flex justify-content-center mr-3"
                                                >
                                                    Back
                                                </a>
                                            </div>
                                            <button type="submit" class="btn purple-button btn-block">
                                                Complete order
                                            </button>
                                        </div>
                                    </div>
                            </fieldset>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection