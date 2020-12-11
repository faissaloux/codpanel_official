@extends('client/layout')

@section('title')
    Staff | {{ env('APP_NAME') }}
@endsection

@section('content')
    <div class="container container-store container-top">
        <div class="row">
            <div class="col col-title">
                <div
                    class="title-name title-table d-flex flex-sm-row flex-column justify-content-sm-between align-items-sm-center">
                    <h2 class="title-bottom">https://{{ $domain_name->name }} staff </h2>
                    <button data-toggle="modal" data-target="#createStaffModal" class="btn purple-button"
                            id="createStaff">Add user
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-staff sommerce-modals__order-result-table">
                    <thead>
                    <tr class="table-borderless">
                        <th scope="col">Username</th>
                        <th scope="col">Access</th>
                        <th scope="col">Status</th>
                        <th scope="col">Last activity</th>
                        <th scope="col" style="width: 275px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($domain_name->staffs as $staff)
                        <tr id="{{ $staff->id }}">
                            <td data-label="Staff-id" style="display: none">{{ $staff->id }}</td>
                            <td data-label="Username">{{ $staff->username }}</td>
                            <td data-label="Access">@if(is_array(json_decode($staff->access)) && count(json_decode($staff->access)) === 9) Full access @else Custom @endif</td>
                            <td data-label="Status">@if ($staff->status) Active @else Suspended @endif</td>
                            @php ($accessRights = json_decode($staff->access))
                            @if(is_array($accessRights) AND count($accessRights))
                                <td data-label="Access-rights" style="display: none">
                                    <ul class="access-rights">
                                        @foreach($accessRights as $access)
                                            <li>{{ $access }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            @endif
                            <td data-label="Last-activity">2020-08-14 22:40:58</td>
                            <td data-label="Actions" class="d-flex justify-content-between w-100">
                                <div class="actions">
                                    <a class="edit-staff" href="#" data-toggle="modal"
                                       data-target="#editStaffModal"
                                       data-details="{&quot;id&quot;:132,&quot;login&quot;:&quot;admin&quot;,&quot;status&quot;:1,&quot;accessList&quot;:{&quot;orders&quot;:1,&quot;auto-orders&quot;:1,&quot;payments&quot;:1,&quot;customers&quot;:1,&quot;products&quot;:1,&quot;pages&quot;:1,&quot;settings&quot;:1,&quot;reports&quot;:1,&quot;coupons&quot;:1}}">
                                        <svg height='24' width='24'>
                                            <use xlink:href='/themes/img/sprite.svg#edit'></use>
                                        </svg>
                                        Edit
                                    </a>
                                    <a class="set-staff-password" href="/stores/staff/password/132" data-toggle="modal"
                                       data-target="#setStaffPasswordModal"
                                       data-details="{&quot;id&quot;:132,&quot;login&quot;:&quot;admin&quot;}">
                                        <svg height='24' width='24'>
                                            <use xlink:href='/themes/img/sprite.svg#set-password'></use>
                                        </svg>
                                        Set password
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade"
         id="createStaffModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-add-staff-account"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <img src="https://ucarecdn.com/8e80a220-852f-461b-baed-3ee2a5c8fa3e/editstaff.svg"
                             alt="edit-staff">
                        <span>Add staff account</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="https://ucarecdn.com/1867e3e6-4720-4f8a-82f2-af16e0492f32/close.svg" alt="close">
                    </button>
                </div>
                <form id="createStaffForm" class="form" action="#" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-danger text-center" id="show-error-create-user"
                             style="display: none"></div>
                        <div class="alert alert-success text-center" id="show-success-create-user"
                             style="display: none"></div>
                        <fieldset>
                            <div id="createStaffError"
                                 class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                            <div class="form-group">
                                <label class="username-staff" for="user_email">Email</label>
                                <input type="email" id="user_email" class="input" placeholder="Username"
                                       aria-required="true">
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group">
                                <label class="username-staff" for="user_name">Username</label>
                                <input type="text" id="user_name" class="input"
                                       name="CreateStaffForm[account]" placeholder="Username" aria-required="true">
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group generate-password">
                                <label for="user_password">Password</label>
                                <input type="password"
                                       id="user_password"
                                       class="password-set"
                                       name="CreateStaffForm[password]"
                                       placeholder="Sxn9t0zZ" aria-required="true">
                                <a class="generate-password-button generate-password-staff" id="staff_create_gen"
                                   href="#">
                                    <svg height='24' width='24' class='svg-active'>
                                        <use xlink:href='/themes/img/sprite.svg#generate-password'></use>
                                    </svg>
                                </a>
                                <span class="text-under-password">Type or generate new password for staff account</span>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <label for="user_status">Status</label>
                                    </div>
                                    <div class="select-wrapper">
                                        <select id="user_status"
                                                class="form-control no-radius"
                                                name="CreateStaffForm[status]"
                                                aria-required="true">
                                            <option value="active">Active</option>
                                            <option value="suspended">Suspended</option>
                                        </select>
                                        <p class="help-block help-block-error"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-modal">
                                    <label>Access rights</label>
                                    <div class="d-flex flex-wrap">
                                        <span>
                                            <input type="checkbox" id="create-orders" class="invoice-checkbox"
                                                   value="orders">
                                            <label class="form-check-label" for="create-orders">Orders</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="create-auto-orders" class="invoice-checkbox"
                                                   value="auto-orders">
                                            <label class="form-check-label" for="create-auto-orders">Auto orders</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="create-payments" class="invoice-checkbox"
                                                   value="payments">
                                            <label class="form-check-label" for="create-payments">Payments</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="create-customers" class="invoice-checkbox"
                                                   value="customers">
                                            <label class="form-check-label" for="create-customers">Customers</label>
                                        </span>
                                        <span>
                                             <input type="checkbox" id="create-products" class="invoice-checkbox"
                                                    value="products">
                                            <label class="form-check-label" for="create-products">Products</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="create-pages" class="invoice-checkbox"
                                                   value="pages">
                                            <label class="form-check-label" for="create-pages">Pages</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="create-reports" class="invoice-checkbox"
                                                   value="reports">
                                            <label class="form-check-label" for="create-reports">Reports</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="create-settings" class="invoice-checkbox"
                                                   value="settings">
                                            <label class="form-check-label" for="create-settings">Settings</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="create-coupons" class="invoice-checkbox"
                                                   value="discounts">
                                            <label class="form-check-label" for="create-coupons">Discounts</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                                id="createStaffButton"
                                class="btn save-changes-button purple-button"
                                name="create-staff-button">
                            Add account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editStaffModal" tabindex="-1" role="dialog"
         aria-labelledby="modal-edit"
         aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <img src="https://ucarecdn.com/8e80a220-852f-461b-baed-3ee2a5c8fa3e/editstaff.svg"
                             alt="edit-staff">
                        <span>Edit staff account</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="https://ucarecdn.com/1867e3e6-4720-4f8a-82f2-af16e0492f32/close.svg" alt="close">
                    </button>
                </div>
                <form id="editStaffForm" class="form" method="post">
                    <input type="hidden" id="staff-id-js">
                    <div class="modal-body">
                        <div class="alert alert-danger text-center" id="show-error-edit-user" style="display: none"></div>
                        <div class="alert alert-success text-center" id="show-success-edit-user" style="display: none"></div>
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <div class="form-group field-editstaffform-account required">
                                    <label class="control-label" for="editstaffform-account">Username</label>
                                    <input
                                        type="text"
                                        id="username-in-js"
                                        class="input"
                                        placeholder="Username"
                                        aria-required="true"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <label for="select-staff-status">Status</label>
                                    </div>
                                    <div class="select-wrapper">
                                        <div class="form-group field-editstaffform-status required">
                                            <select id="status-select-js"
                                                    class="form-control no-radius"
                                                    name="EditStaffForm[status]"
                                                    aria-required="true">
                                                <option value="active">Active</option>
                                                <option value="suspended">Suspended</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-modal">
                                    <label>Access rights</label>
                                    <div class="d-flex flex-wrap">
                                        <span>
                                            <input type="checkbox" id="orders" class="invoice-checkbox"
                                                   name="EditStaffForm[access][orders]" value="orders">
                                            <label class="form-check-label" for="orders">Orders</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="auto-orders" class="invoice-checkbox"
                                                   name="EditStaffForm[access][auto-orders]" value="auto-orders">
                                            <label class="form-check-label" for="auto-orders">Auto orders</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="payments" class="invoice-checkbox"
                                                   name="EditStaffForm[access][payments]" value="payments">
                                            <label class="form-check-label" for="payments">Payments</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="customers" class="invoice-checkbox"
                                                   name="EditStaffForm[access][customers]" value="customers">
                                            <label class="form-check-label" for="customers">Customers</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="products" class="invoice-checkbox"
                                                   name="EditStaffForm[access][products]" value="products">
                                            <label class="form-check-label" for="products">Products</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="pages" class="invoice-checkbox"
                                                   name="EditStaffForm[access][pages]" value="pages">
                                            <label class="form-check-label" for="pages">Pages</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="reports" class="invoice-checkbox"
                                                   name="EditStaffForm[access][reports]" value="reports">
                                            <label class="form-check-label" for="reports">Reports</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="settings" class="invoice-checkbox"
                                                   name="EditStaffForm[access][settings]" value="settings">
                                            <label class="form-check-label" for="settings">Settings</label>
                                        </span>
                                        <span>
                                            <input type="checkbox" id="coupons" class="invoice-checkbox"
                                                   name="EditStaffForm[access][coupons]" value="discounts">
                                            <label class="form-check-label" for="coupons">Discounts</label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn save-changes-button purple-button edit-staff-button"
                                name="edit-staff-button">
                            Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade"
         id="setStaffPasswordModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="modal-set-password"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <img src="https://ucarecdn.com/1f6824f5-cd1e-4ab7-a17f-deb81102907e/setpassword.svg"
                             alt="set-new-password">
                        <span>Set new password</span>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="https://ucarecdn.com/1867e3e6-4720-4f8a-82f2-af16e0492f32/close.svg" alt="close">
                    </button>
                </div>
                <div class="modal-body">
                    <form id="setStaffPasswordForm" class="form" action="/stores/staff/100" method="post">
                        @csrf
                        <fieldset>
                            <div id="setStaffPasswordError"
                                 class="alert alert-danger error-text error-summary alert alert-danger hidden"></div>
                            <div class="form-group disable-input">
                                <label class="" for="setstaffpasswordform-username">Username</label>
                                <input type="text"
                                       id="setstaffpasswordform-username"
                                       class="input"
                                       name="SetStaffPasswordForm[username]"
                                       readonly="readonly"
                                >
                                <p class="help-block help-block-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="staff_edit_passwd">Password</label>
                                <input type="text"
                                       id="staff_edit_passwd"
                                       class="input"
                                       name="SetStaffPasswordForm[password]"
                                       placeholder="Sxn9t0zZ"
                                       aria-required="true">
                                <a class="generate-password-button" id="staff_edit_gen" href="#">
                                    <svg height='24' width='24' class='svg-active'>
                                        <use xlink:href='/themes/img/sprite.svg#generate-password'></use>
                                    </svg>
                                </a>
                                <span class="text-under-password">Type or generate new password for staff account</span>
                            </div>
                        </fieldset>
                        <div class="modal-footer">
                            <button type="submit"
                                    id="setStaffPasswordButton"
                                    class="btn save-changes-button purple-button"
                                    name="set-staff-password-button">
                                Set password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    <script>
        $(".edit-staff").each(function (index, button) {
            $(button).on('click', function () {
                $('#editStaffForm').find(`input[type=checkbox]`).prop('checked', false);
                let showErrorDiv = $('#show-error-edit-user');
                showErrorDiv.text('');
                showErrorDiv.css('display', 'none');
                let parentButton = $(button).parents('tr');
                let tdElements = parentButton.find('td');
                tdElements.each(function (index, tdElement) {
                    if ( $(tdElement).attr('data-label').trim() === 'Username' ) {
                        $('#username-in-js').val($(tdElement).text());
                    }
                    if ( $(tdElement).attr('data-label').trim() === 'Staff-id' ) {
                        $('#staff-id-js').val($(tdElement).text());
                    }
                    if ( $(tdElement).attr('data-label').trim() === 'Status' ) {
                        let selectEditStatus = $('#status-select-js');
                        let options = selectEditStatus.find('option');
                        if ($(tdElement).text().trim() === 'Active') {
                            $(options[0]).attr('selected', 'selected');
                            $(options[1]).attr('selected', false);
                        }
                        else {
                            $(options[1]).attr('selected', 'selected');
                            $(options[0]).attr('selected', false);
                        }
                    }
                });

                parentButton.find('ul.access-rights').find('li').map(function () {
                    let value = $(this).text();
                    $('#editStaffForm').find(`input[type=checkbox][value=${value}]`).prop('checked', true);
                });
            });
        });

        $('form#editStaffForm').on('submit', function (e) {
            e.preventDefault();

            let submitBtn = $(this).find('.edit-staff-button');
            submitBtn.attr('disabled', 'disabled');
            submitBtn.html(`<i class="fas fa-spinner fa-spin"></i>`);
            let success = true;
            let errorAlert = $('#show-error-edit-user');
            $('#editStaffForm').find('input').each(function (index, i) {
                if ($(i).attr('type') !== 'checkbox' && $(i).val().trim() === "") {
                    errorAlert.text('');
                    if ( errorAlert.css('display') !== 'none' ) {
                        errorAlert.slideUp();
                    }
                    errorAlert.slideToggle(function () {
                        errorAlert.text('One ore more fields are missing !');
                    });
                    return success = false;
                }
            });

            if (!success) {
                submitBtn.attr('disabled', false);
                submitBtn.html(`Save account`);
                return;
            }

            let accessUser = $('#editStaffForm').find('input[type="checkbox"]:checked').map( function () { return $(this). val(); }).get();

            let formData = {
                username: $('#username-in-js').val(),
                status: $('#status-select-js').val(),
                access: accessUser
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            let url = 'http://codpanel_official.test/client/staff/edit/' + $('#staff-id-js').val();

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    submitBtn.attr('disabled', false);
                    submitBtn.html('Save account');
                    if ( data.error ) {
                        errorAlert.text('');
                        if ( errorAlert.css('display') !== 'none' ) {
                            errorAlert.slideUp();
                        }
                        errorAlert.slideToggle(function () {
                            errorAlert.text(data.error);
                        });
                    }
                    else {
                        let successMessage = $('#show-success-edit-user');
                        successMessage.text(data.message);
                        successMessage.slideToggle();

                        setTimeout(function () {
                            location.reload(true);
                            submitBtn.attr('disabled', false);
                            submitBtn.html('Save account');
                        }, 1500);
                    }
                },
                error: function (data) {
                    let responseJson = JSON.parse(data.responseText);
                    if ( errorAlert.css('display') !== 'none' ) {
                        errorAlert.slideUp();
                    }
                    errorAlert.slideToggle();
                    errorAlert.text(responseJson);
                    submitBtn.attr('disabled', false);
                    submitBtn.html('Save account');
                }
            });
        });
    </script>

    <script>
        $('#createStaffForm').on('submit', function (e) {
            let submitBtn = $('#createStaffButton');
            submitBtn.attr('disabled', 'disabled');
            submitBtn.html(`<i class="fas fa-spinner fa-spin"></i>`);
            e.preventDefault();
            let success = true;

            $('#createStaffForm').find('input').each(function (index, i) {
                let errorAlert = $('#show-error-create-user');
                if (errorAlert.css('display') !== 'none') {
                    errorAlert.slideUp();
                    errorAlert.text();
                }
                if ($(i).attr('type') !== 'checkbox' && $(i).val().trim() === "") {
                    errorAlert.text('One ore more fields are missing !');
                    if (errorAlert.css('display') !== 'none') {
                        errorAlert.slideUp();
                    }
                    errorAlert.slideToggle();
                    return success = false;
                }
            });

            let accessUser = $('#createStaffForm').find('input[type="checkbox"]:checked').map( function () { return $(this). val(); }).get();

            if (!success) {
                submitBtn.attr('disabled', false);
                submitBtn.html(`Add account`);
                return;
            }

            let formData = {
                email: $('#user_email').val(),
                username: $('#user_name').val(),
                password: $('#user_password').val(),
                status: $('#user_status').val(),
                access: accessUser
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                type: 'POST',
                url: '{{ url()->route('client.staff.add', $domain_name->id) }}',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    if (data.message === 'success') {
                        let alertSuccess = $('#show-success-create-user');
                        if (alertSuccess.css('display') === 'none') {
                            alertSuccess.text(data.content);
                            alertSuccess.slideToggle();
                        }
                        setTimeout(function () {
                            submitBtn.attr('disabled', false);
                            submitBtn.html('Add account');
                            location.reload(true);
                        }, 2000)
                    }
                },
                error: function (data) {
                    submitBtn.attr('disabled', false);
                    submitBtn.html('Add account');
                }
            });
        });
    </script>
@endsection
