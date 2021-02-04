import {
    filterCols,
    loadListDetails,
    setCancelReason,
    setRecallTime,
    setStatus,
    showStatusListing,
    showAddNewListModal,
    addNewList,
    showEditListModal,
    addProduct,
    removeProduct,
    bulkChangeStatus,
    filter
} from './common.js';

$("html").on('click', '.showdetails', function(){
    loadListDetails($(this).attr('data-link'));
});

$('#cancelReason a').click(function() {
    setCancelReason();
});

$('#recalltime a').click(function() {
    setRecallTime();
});

$('#addnewlist').click(function() {
    showAddNewListModal($(this).attr('data-link'));
});

$('html').on('click', '.editlist', function() {
    showEditListModal($(this).attr('data-link'));
});

$('.status-click').click(function() {
    showStatusListing('/employee/listing', $(this).attr('data-type'));
});

$('.modal').on('shown.bs.modal', function() {
    $('.chnage_statue a').click(function() {
        setStatus($(this).attr('data-type'));
    });

    $('#addnewlisting').submit(function() {
        addNewList($(this).attr('data-link'), $(this).serialize());
    });

    // Add product Row
    $('#addmoreproducts').click(function() {
        addProduct($(this));
    });

    // Remove product Row
    $('.removemoreproducts').click(function() {
        removeProduct($(this));
    });
});

//update productsList
$('.modal').on('shown.bs.modal', function(e) {
    $('#updatelisting').submit(function(event) {
        var link = $(this).attr('data-link');
        var datastring = $(this).serialize();


        $.ajax({
            url: link,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'POST',
            data: datastring,
            dataType: "JSON",
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

// Bulk change status
$('#changeSelectedStatus a').click(function() {
    bulkChangeStatus(this, '/employee/bulkstatus');
});

/*** filter ***/
$('.mdi-reload').click(function() {
    filter('/employee/filter');
});

$(document).on('change', '.radio-filter-by', function() {
    filter('/employee/filter');
});

$('#sinistres-search').submit(function() {
    filter('/employee/filter');
});
/*** End filter ***/