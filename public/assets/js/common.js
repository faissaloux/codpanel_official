/********************************************
 * List of content
 * ******************************************
 * - filterCols
 * - loadListDetails
 * - setCancelReason
 * - setRecallTime
 * - setStatus
 * - showStatusListing
 * - showAddNewListModal
 * - addNewList
 * - showEditListModal
 * - addProduct
 * - removeProduct
 *******************************************/


/*  Table columns filter:
    Show and hide columns depending on columns filter.  */
export function filterCols() {
    let activeCols = [];
    $(".toggle.show-col").prop('checked', true);

    $(".toggle.show-col").click(function() {
        this.checked ? $(this).addClass("active") :
            $(this).removeClass("active");
    })

    $(".active-all-cols").click(() => {
        $(".toggle.show-col").prop('checked', true)
            .addClass("active")
            .change();
    })

    $(".inactive-all-cols").click(() => {
        $(".toggle.show-col").prop('checked', false)
            .removeClass("active")
            .change();
    })

    $(".toggle.show-col").change(() => {
        $(`[data-type]`).removeClass("active");
        activeCols = [];
        $(".toggle.show-col.active").each(function() {
            activeCols.push($(this).prop('name'));
        });

        $.each(activeCols, function(key, value) {
            $(`[data-type=${value}]`).addClass("active");
        });
    })
}
/** uncheckAllCheckbox **/
function uncheckAllCheckbox() {
    $('.table :checkbox').prop('checked', false);
    $(".get-down").removeClass("margin-top-60");
    $(".actions-menu").slideUp(600);
    $('body #selected').val('');
    $('body #selected').attr('data-count', '');
}

/** load table **/
export function load(dataLink, formData) {
    $.ajax({
        url: dataLink,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        beforeSend: function() {
            $('.spinner-loader-container.d-table').attr('style', 'display:table !important');
        },
        success: function(response) {
            $('.spinner-loader-container.d-table').attr('style', 'display:none !important');
            $('body .load-table').html(response);
            uncheckAllCheckbox();
        },
        error: function(response) {
            default_error();
        }
    });
}

/** Modal Show **/
export function ModalShow(dataLink, formData, modalId) {
    $.ajax({
        url: dataLink,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        success: function(response) {
            $('body ' + modalId).modal('show');
            $('body ' + modalId + ' .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });
}


/** Delete Row Ajax **/
export function ajaxDeleteRow(dataLink, formData, modalId, list_id) {
    $.ajax({
        url: dataLink,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        success: function(response) {
            $.each(JSON.parse(response), function(key, value) {
                statue_toast("success", value)
            });
            $('body .list_' + list_id).remove();
            $('body ' + modalId).modal('hide');
        },
        error: function(response) {
            default_error();
        }
    });
}


/*  Load list details.  */
export function loadListDetails(dataLink) {
    const token = $('meta[name="csrf-token"]').attr('content');

    const formData = new FormData();
    formData.append('_token', token);

    ModalShow(dataLink, formData, '#detailsModalCenter');
}

/*  Set list status to cancel and
    set cancel_reason datetime. */
export function setCancelReason() {
    const token = $('meta[name="csrf-token"]').attr('content');
    const link = $('.chnage_statue').attr('data-link');
    const statue = "canceled";
    const list_id = $('.chnage_statue').attr('data-id');
    const cancel_reason = $('#cancelreasontext').val();

    const formData = new FormData();
    formData.append('_token', token);
    formData.append('statue', statue);
    formData.append('cancel_reason', cancel_reason);

    ajaxDeleteRow(link, formData, '#cancelReasonModal', list_id);
}

/*  Set list status to recall and
    set recall_at datetime.   */
export function setRecallTime() {
    const token = $('meta[name="csrf-token"]').attr('content');
    const link = $('.chnage_statue').attr('data-link');
    const statue = "recall";
    const list_id = $('.chnage_statue').attr('data-id');
    const recall_date = $('#recall_date').val();
    const recall_time = $('#recall_time').val();

    const formData = new FormData();
    formData.append('_token', token);
    formData.append('statue', statue);
    formData.append('recall_date', recall_date);
    formData.append('recall_time', recall_time);

    ajaxDeleteRow(link, formData, '#recalltimemodal', list_id);
}

/*  Set list status.              */
export function setStatus(dataType) {
    const token = $('meta[name="csrf-token"]').attr('content');
    const link = $('.chnage_statue').attr('data-link');
    const list_id = $('.chnage_statue').attr('data-id');

    const formData = new FormData();
    formData.append('_token', token);
    formData.append('statue', dataType);

    if (dataType == "canceled") {
        $('body #detailsModalCenter').modal('hide');
        $('body #cancelReasonModal').modal('show');
        return false;
    }

    if (dataType == "recall") {
        $('body #detailsModalCenter').modal('hide');
        $('body #recalltimemodal').modal('show');
        return false;
    }

    ajaxDeleteRow(link, formData, '#detailsModalCenter', list_id);
}

/*  Show status listing.                              */
export function showStatusListing(listingURL, dataType, dataHandler) {
    const token = $('meta[name="csrf-token"]').attr('content');
    const handler = dataHandler != undefined ? dataHandler : $('body').attr('data-handler');
    const auth_type = $('body').attr('data-auth-type');
    
    const formData = new FormData();
    formData.append('_token', token);
    formData.append('type', dataType);
    formData.append('handler', handler);
    formData.append('auth_type', auth_type);

    load(listingURL, formData);
}

/*  Show Add New List modal                 */
export function showAddNewListModal(dataLink) {
    const token = $('meta[name="csrf-token"]').attr('content');

    const formData = new FormData();
    formData.append('_token', token);

    ModalShow(dataLink, formData, '#addOrderModalCenter');
}

/*  Add new list                                  */
export function addNewList(dataLink, dataSerialize) {
    alert("hiyaaaa");
    $.ajax({
        url: dataLink,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: 'POST',
        data: dataSerialize,
        dataType: "JSON",
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
}

/*  Show Edit List modal                  */
export function showEditListModal(dataLink) {
    const token = $('meta[name="csrf-token"]').attr('content');

    const formData = new FormData();
    formData.append('_token', token);

    ModalShow(dataLink, formData, '#addOrderModalCenter');
}

/*  Add new product row in Add New List modal
    to add new product to a list.               */
export function addProduct(addMoreProductsButton) {
    const row = addMoreProductsButton.closest('.productsTosale');
    const mypr = addMoreProductsButton.closest('.row').find('.product-q select');
    const pr = mypr.val();

    isNaN(pr) ? mypr.addClass('is-invalid') :
        mypr.removeClass('is-invalid');

    var emptyFound = false;
    $(row).find('input[type="number"]').each(function() {
        if ($(this).val() == '') {
            $(this).closest('.form-group').addClass('has-error');
            emptyFound = true;
        } else $(this).closest('.form-group').removeClass('has-error');
    });

    if (emptyFound) return false;

    const hheo = $('body .productsTosale').first().clone();
    $(hheo).find('.btn.btn-primary').addClass('btn-danger removemoreproducts').html('-');
    $(hheo).find('input').each(function() {
        $(this).val('');
    })
    $(hheo).appendTo("body .productsList");
}

/*  Remove a product row from Add New List modal.*/
export function removeProduct(removeProductButton) {
    removeProductButton.closest('.productsTosale').remove();
}

/***  Bulk change status ***/
export function bulkChangeStatus(current, dataLink) {
    var token = $('meta[name="csrf-token"]').attr('content');
    var statue = $(current).attr("data-type");
    var ids = $('#selected').val();

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('ids', ids);
    formData.append('statue', statue);

    $.ajax({
        url: dataLink,
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
            uncheckAllCheckbox();
        },
        error: function(response) {
            default_error();
        }
    });
}

/************ filter ******************/
export function filter(dataLink) {

    var token                           = $('meta[name="csrf-token"]').attr('content');
    var data_limit                      = $('body').attr("data-limit");
    var data_type                       = $('body').attr("data-type");
    var filter_by                       = $('.radio-filter-by:checked').val();
    var data_apage                      = $('body').attr("data-page");
    var filter_date                     = $('body').attr("data-date");
    var filter_q                        = $('#textsearch').val();
    var filter_city                     = $('#city_selector').val();
    var filter_provider                 = $('#provider').val();
    var filter_product                  = $('#product').val();

    var formData = new FormData();
    formData.append('_token'            , token);
    formData.append('filter'            , 'filter');
    formData.append('data_limit'        , data_limit);
    formData.append('data_type'         , data_type);
    formData.append('filter_by'         , filter_by);
    formData.append('data_apage'        , data_apage);
    formData.append('filter_date'       , filter_date);
    formData.append('filter_q'          , filter_q);
    formData.append('filter_city'       , filter_city);
    formData.append('filter_provider'   , filter_provider);
    formData.append('filter_product'    , filter_product);

    load(dataLink, formData);
}