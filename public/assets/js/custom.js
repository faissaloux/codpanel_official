$('.modal').on('shown.bs.modal', function(e) {
    $(function() {
        $('.selectpicker').selectpicker();
    });
});
//////default success

function statue_toast(type, msg) {

    var title = type;

    toastr[type](msg, title, {
        positionClass: 'toast-bottom-left',
        closeButton: true,
        progressBar: true,
        preventDuplicates: true,
        newestOnTop: true,
        rtl: $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
    });
}

//////default error

function default_error() {
    var msg = 'something went wrong please try again!';
    var title = 'oops !';
    var type = 'warning';

    toastr[type](msg, title, {
        positionClass: 'toast-bottom-left',
        closeButton: true,
        progressBar: true,
        preventDuplicates: true,
        newestOnTop: true,
        rtl: $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
    });
}

//////login

$('#loginform').submit(function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var email = $(this).find("[name = 'email']");
    var password = $(this).find("[name = 'password']");

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('email', email);
    formData.append('password', password);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "JSON",
        beforeSend: function() {
            $("#overlay").fadeIn(300);
        },
        success: function(response) {
            alert(response);
        },
        error: function(response) {
            default_error();
        }
    });

});

///////////load list details

$('body').on('click', '.showdetails', function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');

    var formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $('body #detailsModalCenter').modal('show');
            $('body #detailsModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});



//////// change status
$('.modal').on('shown.bs.modal', function(e) {
    $('.chnage_statue a').click(function(e) {

        var token = $('meta[name="csrf-token"]').attr('content');
        var link = $('.chnage_statue').attr('data-link');
        var statue = $(this).attr('data-type');
        var list_id = $('.chnage_statue').attr('data-id');

        var formData = new FormData();
        formData.append('_token', token);
        formData.append('statue', statue);

        if (statue == "canceled") {
            $('body #detailsModalCenter').modal('hide');
            $('body #cancelReasonModal').modal('show');
            return false;
        }

        if (statue == "recall") {
            $('body #detailsModalCenter').modal('hide');
            $('body #recalltimemodal').modal('show');
            return false;
        }

        $.ajax({
            url: link,
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            data: formData,
            cache: false,
            dataType: "HTML",
            beforeSend: function() {},
            success: function(response) {
                $.each(JSON.parse(response), function(key, value) {
                    statue_toast("success", value)
                });
                $('body .list_' + list_id).remove();
                $('body #detailsModalCenter').modal('hide');
            },
            error: function(response) {
                default_error();
            }
        });

    });
});

//////// change status cancel

$('#cancelReason a').click(function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $('.chnage_statue').attr('data-link');
    var statue = "canceled";
    var list_id = $('.chnage_statue').attr('data-id');
    var cancel_reason = $('#cancelreasontext').val();

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('statue', statue);
    formData.append('cancel_reason', cancel_reason);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $.each(JSON.parse(response), function(key, value) {
                statue_toast("success", value)
            });
            $('body .list_' + list_id).remove();
            $('body #cancelReasonModal').modal('hide');
        },
        error: function(response) {
            default_error();
        }
    });
});

//////// recall time

$('#recalltime a').click(function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $('.chnage_statue').attr('data-link');
    var statue = "recall";
    var list_id = $('.chnage_statue').attr('data-id');
    var recall_date = $('#recall_date').val();
    var recall_time = $('#recall_time').val();

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('statue', statue);
    formData.append('recall_date', recall_date);
    formData.append('recall_time', recall_time);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $.each(JSON.parse(response), function(key, value) {
                statue_toast("success", value)
            });
            $('body .list_' + list_id).remove();
            $('body #recalltimemodal').modal('hide');
        },
        error: function(response) {
            default_error();
        }
    });
});

///////show moda addneworder

$('#addnewlist').click(function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');


    var formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $('body #addOrderModalCenter').modal('show');
            $('body #addOrderModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});


///add new list_id
$('.modal').on('shown.bs.modal', function(e) {
    $('#addnewlisting').submit(function(event) {

        //CreateOrder(event);

        var link = $(this).attr('data-link');

        var datastring = $(this).serialize();


        $.ajax({
            url: link,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: datastring,
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                $('body #addOrderModalCenter').modal('hide');

                $.each(response, function(key, value) {
                    statue_toast("success", value)
                });

                $('body #addnewlisting')[0].reset();
            },
            error: function(response) {
                default_error();
            }
        });

    });
});

///////show moda addneworder

$('#addnewcity').click(function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');


    var formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $('body #addCityModalCenter').modal('show');
            $('body #addCityModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});

///////show moda editorder

$('body').on('click', '.editlist', function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');


    var formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $('body #addOrderModalCenter').modal('show');
            $('body #addOrderModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});

///add new cities
$('.modal').on('shown.bs.modal', function(e) {
    $('#addnewcities').submit(function(event) {

        //CreateOrder(event);

        var link = $(this).attr('data-link');

        var datastring = $(this).serialize();


        $.ajax({
            url: link,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: datastring,
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                $('body #addCityModalCenter').modal('hide');

                $.each(response, function(key, value) {
                    statue_toast("success", value)
                });

                $('body #addnewcities')[0].reset();
            },
            error: function(response) {
                default_error();
                return false;
            }
        });

    });
});

///////show moda editcity

$('.editcitymodal').click(function(e) {

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');


    var formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $('body #addCityModalCenter').modal('show');
            $('body #addCityModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});

///add new cities
$('.modal').on('shown.bs.modal', function(e) {
    $('#updatecities').submit(function(event) {

        ////CreateOrder(event);

        var link = $(this).attr('data-link');

        var datastring = $(this).serialize();


        $.ajax({
            url: link,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: datastring,
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                $('body #addCityModalCenter').modal('hide');

                $.each(response, function(key, value) {
                    statue_toast("success", value)
                });

                $('body #updatecities')[0].reset();
            },
            error: function(response) {
                default_error();
                return false;
            }
        });

    });
});


//all urls
var listingURL = "/dashboard/listing/listing";


///show th status listing
$('.status-click').click(function(e) {

    $('.spinner-loader-container.d-table').attr('style', 'display:table !important');

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = listingURL;
    var type = $(this).attr('data-type');
    var handler = $('body').attr('data-handler');
    var auth_type = $('body').attr('data-auth-type');


    var formData = new FormData();
    formData.append('_token', token);
    formData.append('type', type);
    formData.append('handler', handler);
    formData.append('auth_type', auth_type);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $('.spinner-loader-container.d-table').attr('style', 'display:none !important');
            $('body .table-body-listing').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});

//update productsList
$('.modal').on('shown.bs.modal', function(e) {
    $('#updatelisting').submit(function(event) {

        //CreateOrder(event);

        var link = $(this).attr('data-link');

        var datastring = $(this).serialize();


        $.ajax({
            url: link,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: datastring,
            dataType: "JSON",
            beforeSend: function() {},
            success: function(response) {
                $('body #addOrderModalCenter').modal('hide');

                $.each(response, function(key, value) {
                    statue_toast("success", value)
                });

                $('body #updatelisting').reset();
            },
            error: function(response) {
                default_error();
            }
        });

    });
});

/////////check
function CreateOrder(event) {

    $('#addnewlisting  input').each(function(event) {
        if (!$(this).val()) {
            statue_toast('info', '1please fill all the fields');
            $(this).addClass("is-invalid");
            event.preventDefault();
            return false;
        } else {
            $(this).removeClass("is-invalid");
        }
    });

    // check if phone empty and correct
    if ($('#addnewlisting #tel').val().length > 10 || $('#addnewlisting #tel').val().length < 9) {
        statue_toast('info', 'please use correct phone number');
        $('#addnewlisting #tel').addClass("is-invalid");

        event.stopPropagation();
        event.preventDefault();
        return false;
    } else {
        $('#addnewlisting #tel').removeClass("is-invalid");
    }

    $('#addnewlisting  select').each(function() {
        if (!$(this).val()) {
            statue_toast('info', 'please fill all the fields');
            $('#addnewlisting select').addClass("is-invalid");
            return false;
        } else {
            $('#addnewlisting select').removeClass("is-invalid");
        }

    });

    if ($('#choseEmployee').val() == 'N-A') {
        statue_toast('info', 'please chose employee');
        $('#choseEmployee').addClass("is-invalid");
        return false;
    } else {
        $('#choseEmployee').removeClass("is-invalid");
    }


    var good = true;
    $('.productsList .row').each(function() {

        var mypr = $(this).find('.product-q select');
        var pr = mypr.val();
        if (isNaN(pr)) {
            good = false;
            statue_toast('info', 'please chose and fill product info');
        } else {
            mypr.closest('.form-group').removeClass('has-error');
        }

        $(this).find('input').each(function() {
            if ($(this).val() == '') {
                statue_toast('info', 'please chose and fill product info');
                good = false;
            } else {
                $(this).closest('.form-group').removeClass('has-error');
            }
        });

    });

}

// Delete list
$('body').on('click','.deleteList',function(e){
    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    
    var formData = new FormData();
    formData.append('_token', token);
    
    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(response) {
            statue_toast("success", response.Success);
        },
        error : function(response){
            default_error();
        }
    });
    
});

// Destroy list
$('body').on('click','.destroy',function(e){
    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    
    var formData = new FormData();
    formData.append('_token', token);
    
    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(response) {
            statue_toast("success", response.Success)
        },
        error : function(response){
            default_error();
        }
    });
    
});

// Restore list
$('body').on('click','.restore',function(e){
    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    
    var formData = new FormData();
    formData.append('_token', token);
    
    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "JSON",
        success: function(response) {
            statue_toast("success", response.Success)
        },
        error : function(response){
            default_error();
        }
    });
    
});