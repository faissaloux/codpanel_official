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
    filter
} from './common.js';

$('.status-click').click(function() {
    showStatusListing('/dashboard/listing/listing', $(this).attr('data-type'), $(this).attr('data-handler'));
    $("body").attr('data-type', $(this).attr('data-type'));
});

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

$('#loginform').submit(function() {

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

$('.showdetails').on('click', function(e) {

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

$('#addnewcity').click(function() {

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
$('.modal').on('shown.bs.modal', function() {
    $('#addnewcities').submit(function() {

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

/////////check
function CreateOrder(event) {

    $('#addnewlisting  input').each(function(event) {
        if (!$(this).val()) {
            statue_toast('info', '1please fill all the fields');
            $(this).addClass("is-invalid");
            event.preventDefault();
            return false;
        } else $(this).removeClass("is-invalid");
    });

    // check if phone empty and correct
    if ($('#addnewlisting #tel').val().length > 10 || $('#addnewlisting #tel').val().length < 9) {
        statue_toast('info', 'please use correct phone number');
        $('#addnewlisting #tel').addClass("is-invalid");

        event.stopPropagation();
        event.preventDefault();
        return false;
    } else $('#addnewlisting #tel').removeClass("is-invalid");

    $('#addnewlisting  select').each(function() {
        if (!$(this).val()) {
            statue_toast('info', 'please fill all the fields');
            $('#addnewlisting select').addClass("is-invalid");
            return false;
        } else $('#addnewlisting select').removeClass("is-invalid");

    });

    if ($('#choseEmployee').val() == 'N-A') {
        statue_toast('info', 'please chose employee');
        $('#choseEmployee').addClass("is-invalid");
        return false;
    } else $('#choseEmployee').removeClass("is-invalid");


    var good = true;
    $('.productsList .row').each(function() {

        var mypr = $(this).find('.product-q select');
        var pr = mypr.val();
        if (isNaN(pr)) {
            good = false;
            statue_toast('info', 'please chose and fill product info');
        } else mypr.closest('.form-group').removeClass('has-error');

        $(this).find('input').each(function() {
            if ($(this).val() == '') {
                statue_toast('info', 'please chose and fill product info');
                good = false;
            } else $(this).closest('.form-group').removeClass('has-error');
        });

    });

}

// Delete list
$('.deleteList').on('click', function(e) {
    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var list_id = $(this).attr('data-id');

    var formData = new FormData();
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "JSON",
        success: function(response) {
            statue_toast("success", response.Success);
            $('body .list_' + list_id).remove();
        },
        error: function(response) {
            default_error();
        }
    });

});

// Destroy list
$('.destroy').on('click', function(e) {
    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var list_id = $(this).attr('data-id');

    var formData = new FormData();
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "JSON",
        success: function(response) {
            statue_toast("success", response.Success);
            $('body .list_' + list_id).remove();
        },
        error: function(response) {
            default_error();
        }
    });

});

// Restore list
$('.restore').on('click', function(e) {
    var token = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
    var list_id = $(this).attr('data-id');

    var formData = new FormData();
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "JSON",
        success: function(response) {
            statue_toast("success", response.Success);
            $('body .list_' + list_id).remove();
        },
        error: function(response) {
            default_error();
        }
    });

});

///////////load history
$("html").on("click", ".showhistory", function() {
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
            $('body #historyModalCenter').modal('show');
            $('body #historyModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

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

// // Bulk change status
// $('#changeSelectedStatus a').click(function() {
//     bulkChangeStatus(this, '/employee/bulkstatus');
// });

/*** filter ***/
$('.mdi-reload').click(function() {
    filter('/dashboard/listing/filter');
});

$(document).on('change', '.radio-filter-by', function() {
    filter('/dashboard/listing/filter');
});

$('#sinistres-search').submit(function() {
    filter('/dashboard/listing/filter');
});
/*** End filter ***/

$('.daterangepicker ul li').on('click', function() {
    alert("frfrf");
    $('body').attr("data-date", $('#dashboardDate').text());
});


$(document).ready(function() {
    var url = window.location.pathname;
    url = url.split('/');
    var page = (url[3] == null) ? "new" : url[3];
    $('body').attr('data-page', page);

    filterCols();
});

$("html").on('click', '#addRowSortie', function(){
    $(this).closest(".clonedSortie").clone().appendTo(".sortieAppend");
    $(this).attr("id", "removeRowSortie").empty()[0].innerHTML = "-";
});

$("html").on('click', '#removeRowSortie', function(){
    $(this).closest(".clonedSortie").remove();
});

///////show moda addnewstock

$('#addNewStock').click(function() {
    const token   = $('meta[name="csrf-token"]').attr('content');
    const link    = $(this).attr('data-link');

    const formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        success: function(response) {
            $('body #addToStockModalCenter').modal('show');
            $('body #addToStockModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});

///////show moda returnstock

$('#returnStock').click(function() {
    const token   = $('meta[name="csrf-token"]').attr('content');
    const link    = $(this).attr('data-link');

    const formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        success: function(response) {
            $('body #returnStockModalCenter').modal('show');
            $('body #returnStockModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});

///////show moda exportstock

$('#exportStock').click(function() {
    const token   = $('meta[name="csrf-token"]').attr('content');
    const link    = $(this).attr('data-link');

    const formData = new FormData();
    formData.append('_token', token);

    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache: false,
        dataType: "HTML",
        success: function(response) {
            $('body #exportStockModalCenter').modal('show');
            $('body #exportStockModalCenter .modal-body').html(response);
        },
        error: function(response) {
            default_error();
        }
    });

});



$(document).on('click', '#loadProductsList', function() {
    const token           = $('meta[name="csrf-token"]').attr('content');
    const sortie_list_id  = $(this).data('listproduct');
    const SortieProductID = $(this).data('sortieproductid');

    $('#editSortieStockModalCenter #SortieProductID').val(SortieProductID);
    $('#editSortieStockModalCenter #SortieListID').val(sortie_list_id);
  
    var formData = new FormData();
    formData.append('_token', token);
    formData.append('id', sortie_list_id);

    $.ajax( {
      type: "POST",
      url: '/dashboard/stock/loadSortieLists/',
      processData: false, // important
      contentType: false, // important
      data: formData,
      success: function( response ) {
        var loaded =  $('#loadedSortielist');
          loaded.html(response);
          loaded.find('select').each(function(){
              var kk = $(this).data('val');
              $(this).val(kk);
          });
      }
    });

    formData = new FormData();
    formData.append('_token', token);
    formData.append('id', SortieProductID);
    
     $.ajax( {
        type: "POST",
        url: '/dashboard/stock/get/rest',
        processData: false, // important
        contentType: false, // important
        data: formData,
        dataType: 'html',
        success: function( response ) {
            $('.foundStock').html(response);
            $('#currentStockAvailable').val(response);
        }
    });
    
    return false;
}); 

$(document).on('change', '.entreetable .activate_me', function() {
    const token   = $('meta[name="csrf-token"]').attr('content');
    const id      = $(this).data('entree');
    const valid   = $('[data-valid="'+id+'"]').val();

    const formData = new FormData();
    formData.append('_token', token);
    formData.append('id', id);
    formData.append('valid', valid);

    if( valid == ''){
        alert('المرجوا ادخال الرقم ');
        $(this).prop('checked',false);
    }else{
        $.ajax( {
            type: "POST",
            url: '/dashboard/stock/validateEntree',
            processData: false, // important
            contentType: false, // important
            data: formData,
            success: function( response ) {
                $('#item-'+id).remove();
                alert('تم التفعيل بنجاح');
            },
            error: function( response ) {
                alert('حصل خطا ما');
            }
        });
    }
    
});

$('.entreetable a').click(function(){
    const token       = $('meta[name="csrf-token"]').attr('content');   
    const productID   = $(this).data('product');

    const formData    = new FormData();
    formData.append('_token', token);
    formData.append('productID', productID);
   
    $.ajax({
        type: "POST",
        url: '/dashboard/stock/loadEntreeHistory/',
        processData: false, // important
        contentType: false, // important
        data: formData,
        success: function( response ) {
            const modal = $('#DetailsModal');
            modal.modal('show');
            modal.find('.modal-body').html(response);      
        }
    });
    
    return false;
});

$('.sortietable  #loadSortieProductHistory').click(function(){
    const token     = $('meta[name="csrf-token"]').attr('content');     
    const productID = $(this).data('product');

    const formData    = new FormData();
    formData.append('_token', token);
    formData.append('productID', productID);
   
    $.ajax( {

        type: "POST",
        url: '/dashboard/stock/loadHistorySortie/',
        processData: false, // important
        contentType: false, // important
        data: formData,
        
        success: function( response ) {
            const modal = $('#DetailsModal');
            modal.modal('show');
            modal.find('.modal-body').html(response);      
        }

    });
    
    
    return false;
});