$(document).ready(function() {

    $(document).on('click', '.paginatepost .pagination a', function(event) {
        $('.spinner-loader-container.d-table').attr('style', 'display:table !important');

        event.preventDefault();
        var token = $('meta[name="csrf-token"]').attr('content');
        var page = $(this).attr('href');

        var formData = new FormData();
        formData.append('_token', token);

        $.ajax({
            url: page,
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            data: formData,
            cache: false,
            dataType: "HTML",
            success: function(response) {
                $('.spinner-loader-container.d-table').attr('style', 'display:none !important');
                $('body .load-table').html(response);
            },
            error: function(response) {
                default_error();
            }
        });

    });

    $(document).on('click', '.pagination a', function(event) {
        $('.spinner-loader-container.d-table').attr('style', 'display:table !important');
        event.preventDefault();
        var page = $(this).attr('href');
        fetch_data(page);
    });

    function fetch_data(page) {
        $.ajax({
            url: page,
            success: function(data) {
                $('.spinner-loader-container.d-table').attr('style', 'display:none !important');
                $('body .load-table').html(data);
            }
        });
    }

});