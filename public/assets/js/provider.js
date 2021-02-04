import {
    loadListDetails,
    setCancelReason,
    setRecallTime,
    setStatus,
    bulkChangeStatus
} from './common.js';

$("html").on('click', '.showdetails', function(){
    loadListDetails($(this).attr('data-link'));
});

$('.modal').on('shown.bs.modal', function() {
    $('.chnage_statue a').click(function() {
        setStatus($(this).attr('data-type'));
    });
});

$('#cancelReason a').click(function() {
    setCancelReason();
});

$('#recalltime a').click(function(e) {
    setRecallTime();
});

//all urls
var listingURL = "/provider/listing";
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
    formData.append('filter_product', filter_product);

    $.ajax({
        url: '/provider/filter',
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

// Bulk change status
$('#changeSelectedStatus a').click(function() {
    bulkChangeStatus(this, '/provider/bulkstatus');
});

$('.mdi-reload').click(function() {
    filter();
});


$(document).on('change', '.radio-filter-by', function() {
    filter();
});

$('#sinistres-search').submit(function() {
    filter();
});