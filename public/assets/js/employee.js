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


//all urls
var listingURL = "/employee/listing";
///show th status listing
$('.status-click').click(function(e) {

    $('.spinner-loader-container.d-table').attr('style', 'display:table !important');

    var token = $('meta[name="csrf-token"]').attr('content');
    var link = listingURL;
    var type = $(this).attr('data-type');
    var handler = $('body').attr('data-handler');


    var formData = new FormData();
    formData.append('_token', token);
    formData.append('type', type);
    formData.append('handler', handler);


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