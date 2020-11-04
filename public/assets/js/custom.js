$(() => {

    const searchForm = $(".search-form-panel");
    const deepSearch = $(".deep-search");

    $(".btn-filter").click(()=>{
        deepSearch.slideUp(200);
        searchForm.css("display") == "block"
            ? searchForm.slideUp(400)
            : searchForm.slideDown(200)
    })

    $(".show-deep-search").click(()=>{
        deepSearch.css("display") == "none"
            ? deepSearch.slideDown(400)
            : deepSearch.slideUp(200)
    })

    const checkBox = $(".show-actions-menu");
    const getDown = $(".get-down");
    const actionsMenu = $(".actions-menu");
    
    checkBox.click(() => {
        if(getDown.hasClass("margin-top-60")){
            getDown.removeClass("margin-top-60");
            actionsMenu.slideUp(600);
        } else {
            getDown.addClass("margin-top-60");
            actionsMenu.slideDown(200);
        }
    })

    $(".close-actions-menu").click(()=>{
        checkBox.prop("checked", false);
        getDown.removeClass("margin-top-60");
        actionsMenu.slideUp(600);
    })

    const hoverRow = $(".hoverRow");

    hoverRow.click(function(){
        $(this).prop("checked")
            ? $(this).addClass("active").parent().parent().addClass("active")
            : $(this).removeClass("active").parent().parent().removeClass("active");
    })

    $("tr.active").css("backgroundColor", "red");




    // Important for Today datepicker
    $(function() {
        var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
        
        // Button         
        var start = moment().subtract(29, 'days');
        var end = moment();
        
        function cb(start, end) {
        $('#dashboardDate').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }         
        $('#dashboardDate').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: (isRtl ? 'left' : 'right')
        }, cb);         
        cb(start, end);         
        
        // Replace icons         
        $('#dashboardDate').each(function() {
        var obj = $(this).data('daterangepicker');
        var _updateCalendars = obj.updateCalendars;         
        obj.updateCalendars = function() {
        // Call original function
        _updateCalendars.call(obj)         
        // Replace icons
        obj.container.find('.prev > i').each(function() { this.className = 'ion ion-ios-arrow-back' });
        obj.container.find('.next > i').each(function() { this.className = 'ion ion-ios-arrow-forward' });
        obj.container.find('.daterangepicker_input > i').each(function() { this.className = 'ion ion-md-calendar' });
        obj.container.find('.calendar-time > i').each(function() { this.className = 'ion ion-md-time' });
        };
        });
    });
})