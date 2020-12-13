function showMessageError(message) {
    clearSuccessDiv();
    let alertDanger = $('.alert.alert-danger');
    alertDanger.text(message);
    alertDanger.removeClass('hidden');
}

function hideMessageError() {
    $('.alert.alert-danger').addClass('hidden');
}

function clearSuccessDiv() {
    let successAlert = $('.alert.alert-success');
    successAlert.addClass('hidden');
    successAlert.text('');
}

$('#user-update-form-js').on('submit', function (e) {
    e.preventDefault();
    let success = true;
    // VERIFY IF AN INPUT IS MISSED
    let formInputs = $(this).find('input.input');
    let submitBtn = $(this).find('button[type=submit]');

    let userInfo = formInputs.map(function () {
        if ($(this).val().trim() === '') {
            showMessageError('One or more fields are required !');
            return success = false;
        }
        return $(this).val();
    });

    if (!success) return success;

    if (userInfo[2].trim().length < 8) {
        success = false;
        showMessageError('The password length must be geater than 8 caracteres !');
    }

    let formData = {
        name: userInfo[0],
        email: userInfo[1],
        password: userInfo[2],
    };
    if (!success) return success;

    hideMessageError();

    submitBtn.attr('disabled', 'disabled');
    submitBtn.html(`<i class="fas fa-spinner fa-spin"></i>`);

    let url = 'http://codpanel_official.test/client/settings/update';

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
            clearSuccessDiv();
            let error = '';
            if (error = data.error) {
                showMessageError(error);
            }
            else {
                let alertSuccess = $('.alert.alert-success');

                alertSuccess.text(data.message);
                alertSuccess.slideToggle();
                submitBtn.attr('disabled', false);
                submitBtn.text('Save changes');
            }
        },
        error: function (data) {
            console.log(data);
        },
    });
});