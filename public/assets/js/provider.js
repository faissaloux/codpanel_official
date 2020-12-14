import {filterCols,
        loadListDetails,
        setCancelReason,
        setRecallTime,
        setStatus,
        showStatusListing} from './common.js';

$('.showdetails').click(function() {
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

$('.status-click').click(function() {
    showStatusListing('/provider/listing', $(this).attr('data-type')); 
});

// Cols filter
filterCols();