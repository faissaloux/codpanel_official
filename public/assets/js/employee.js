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
            $('body .load-table').html(response);
            $('body').attr('data-type', type);
        },
        error: function(response) {
            default_error();
        }
    });

});

$('.modal').on('shown.bs.modal', function(e) {
    // Add product Row
    $('#addmoreproducts').click(function() {

        var row = $(this).closest('.productsTosale');
        var mypr = $(this).closest('.row').find('.product-q select');
        var pr = mypr.val();

        if (isNaN(pr)) {
            mypr.addClass('is-invalid');
        } else {
            mypr.removeClass('is-invalid');
        }

        var emptyFound = false;
        $(row).find('input[type="number"]').each(function() {
            if ($(this).val() == '') {
                $(this).closest('.form-group').addClass('has-error');
                emptyFound = true;
            } else {
                $(this).closest('.form-group').removeClass('has-error');
            }
        });

        if (emptyFound) {
            return false;
        }

        var hheo = $('body .productsTosale').first().clone();
        $(hheo).find('.btn.btn-primary').addClass('btn-danger removemoreproducts').html('-');
        $(hheo).find('input').each(function() {
            $(this).val('');
        })
        $(hheo).appendTo("body .productsList");
    });

    // Remove product Row
    $('body').on('click', '.removemoreproducts', function() {
        $(this).closest('.productsTosale').remove();
    });
});

// Bulk change status
$('#changeSelectedStatus a').click(function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    var statue = $(this).attr("data-type");
    var ids = $('#selected').val();

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('ids', ids);
    formData.append('statue', statue);


    $.ajax({
        url: '/employee/bulkstatus',
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
            $('.table :checkbox').prop('checked', false);
        },
        error: function(response) {
            default_error();
        }
    });
});

/************ filter ******************/

function filter() {
    $('.spinner-loader-container.d-table').attr('style', 'display:table !important');

    var token = $('meta[name="csrf-token"]').attr('content');
    var data_limit = $('body').attr("data-limit");
    var data_type = $('body').attr("data-type");
    var filter_by = $('.radio-filter-by:checked').val();
    var filter_date = $('#dashboardDate').text();
    var filter_q = $('#textsearch').val();
    var filter_city = $('#city_selector').val();
    var filter_provider = $('#provider').val();
    var filter_product = $('#product').val();

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('filter', 'filter');
    formData.append('data_limit', data_limit);
    formData.append('data_type', data_type);
    formData.append('filter_by', filter_by);
    formData.append('filter_date', filter_date);
    formData.append('filter_q', filter_q);
    formData.append('filter_city', filter_city);
    formData.append('filter_provider', filter_provider);
    formData.append('filter_product', filter_product);

    $.ajax({
        url: '/employee/filter',
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {},
        success: function(response) {
            $('.spinner-loader-container.d-table').attr('style', 'display:none !important');
            $('body .load-table').html(response);
        },
        error: function(response) {
            default_error();
        }
    });
}


$('.mdi-reload').click(function() {
    filter();
});


$(document).on('change', '.radio-filter-by', function() {
    filter();
});

$('#sinistres-search').submit(function() {
    filter();
});