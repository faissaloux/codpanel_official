// CREATE NEW STAFF ACCOUNT AJAX
$('#createStaffForm').on('submit', function (e) {
    e.preventDefault();
    let submitBtn = $('#createStaffButton');
    submitBtn.attr('disabled', 'disabled');
    submitBtn.html(`<i class="fas fa-spinner fa-spin"></i>`);
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

    let accessUser = $('#createStaffForm').find('input[type="checkbox"]:checked').map(function () {
        return $(this).val();
    }).get();

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
        url: '{{ url()-> route('client.staff.add', $domain_name -> id)}}',
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