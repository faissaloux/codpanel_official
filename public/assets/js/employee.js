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

$('.showdetails').click(function() {
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

$('.editlist').on('click', function() {
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