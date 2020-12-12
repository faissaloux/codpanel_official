function showErrorMessageForm(message) {
    let alertSuccess = $('#createStaffSuccess');
    let alertError = $('#setStaffPasswordError');

    alertSuccess.addClass('hidden');
    alertError.removeClass('hidden');
    alertSuccess.text('');
    alertError.text(message);
}

// SET THE USERNAME IN THE FORM AND THE ID STAFF
$('.update-staff-password-js').each(function (index, button) {
    $(button).on('click', function () {
        let alertSuccess = $('#createStaffSuccess');
        let alertError = $('#setStaffPasswordError');

        alertSuccess.addClass('hidden');
        alertError.addClass('hidden');
        alertSuccess.text('');
        alertError.text('');

        let parent = $(this).parents('tr');
        let username = parent.find('td[data-label="Username"]').text();
        let formUpdatePassword = $('#update-staff-password-form-js');

        formUpdatePassword.find('input[type=text]#username').val(username);
        formUpdatePassword.find('input#staff-password-update-js').val(parent.find('td[data-label="Staff-id"]').text());
    });
});

$('form#update-staff-password-form-js').on('submit', function (e) {
    e.preventDefault();

    let password = $(this).find('input[type=password]#staff_edit_passwd').val();
    let url = 'http://codpanel_official.test/client/staff/update/' + $(this).find('#staff-password-update-js').val();

    if (password.trim() === '') {
        showErrorMessageForm('The password field is reuqired !');
        return false;
    }
    else if (password.trim().length < 8) {
        showErrorMessageForm('The password should be conains more than 8 caracteres !');
        return false;
    }

    let submitBtn = $(this).find('button#setStaffPasswordButton');

    submitBtn.attr('disabled', 'disabled');
    submitBtn.html(`<i class="fas fa-spinner fa-spin"></i>`);

    let formData = {
        password: password,
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        dataType: 'json',
        success: function (data) {
            let alertSuccess = $('#createStaffSuccess');
            let alertError = $('#setStaffPasswordError');
            console.log(data);
            if (data.error) {
                alertError.text(data.error);
                alertError.removeClass('hidden');

                alertSuccess.addClass('hidden');
                alertSuccess.text('');

                submitBtn.attr('disabled', false);
                submitBtn.text('Set password');
            }
            else if (data.message) {
                alertError.addClass('hidden');
                alertError.text('');

                alertSuccess.removeClass('hidden');
                alertSuccess.text(data.message);

                setTimeout(function () {
                    submitBtn.attr('disabled', false);
                    submitBtn.html('Set password');
                    location.reload(true);
                }, 2000)
            }
        },
        error: function (data) {
            submitBtn.attr('disabled', false);
            submitBtn.html('Set password');
        }
    });
});