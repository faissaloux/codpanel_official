// EDIT STAFF ACCOUNT AJAX
$(".edit-staff").each(function (index, button) {
    $(button).on('click', function () {
        $('#editStaffForm').find(`input[type=checkbox]`).prop('checked', false);
        let showErrorDiv = $('#show-error-edit-user');
        showErrorDiv.text('');
        showErrorDiv.css('display', 'none');
        let parentButton = $(button).parents('tr');
        let tdElements = parentButton.find('td');
        tdElements.each(function (index, tdElement) {
            if ($(tdElement).attr('data-label').trim() === 'Username') {
                $('#username-in-js').val($(tdElement).text());
            }
            if ($(tdElement).attr('data-label').trim() === 'Staff-id') {
                $('#staff-id-js').val($(tdElement).text());
            }
            if ($(tdElement).attr('data-label').trim() === 'Status') {
                let selectEditStatus = $('#status-select-js');
                let options = selectEditStatus.find('option');
                if ($(tdElement).text().trim() === 'Active') {
                    $(options[0]).attr('selected', 'selected');
                    $(options[1]).attr('selected', false);
                } else {
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
            if (errorAlert.css('display') !== 'none') {
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

    let accessUser = $('#editStaffForm').find('input[type="checkbox"]:checked').map(function () {
        return $(this).val();
    }).get();

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
            if (data.error) {
                errorAlert.text('');
                if (errorAlert.css('display') !== 'none') {
                    errorAlert.slideUp();
                }
                errorAlert.slideToggle(function () {
                    errorAlert.text(data.error);
                });
            } else {
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
            if (errorAlert.css('display') !== 'none') {
                errorAlert.slideUp();
            }
            errorAlert.slideToggle();
            errorAlert.text(responseJson);
            submitBtn.attr('disabled', false);
            submitBtn.html('Save account');
        }
    });
});