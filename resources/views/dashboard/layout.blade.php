<!DOCTYPE html>
<html lang="zxx">
   
    <head>
        @include('dashboard.inc.head')
    </head>
    <body dir="rtl" data-auth-id="" data-auth-type="">
        @include('dashboard.inc.actions')
        <!--================================-->
        <!-- Page Container Start -->
        <!--================================-->
        <div class="page-container">
            <!--================================-->
            <!-- Page Sidebar Start -->
            <!--================================-->
            @include('dashboard.inc.sidebar')
            <!--/ Sidebar Footer End -->
            <!--================================-->
            <!-- Page Content Start -->
            <!--================================-->
            <div class="page-content get-down">
                <!--================================-->
                <!-- Page Header Start -->
                <!--================================-->
                @include('dashboard.inc.nav')
                <!--/ Page Header End -->
                <!--================================-->
                <!-- Page Inner Start -->
                    @yield('content')
                <!--/ Page Inner End --> 
            <!--================================-->	
            </div>
            <!--/ Page Content End -->
        </div> 
        <!--/ Page Container End -->
        <!--================================-->

        <!--================================-->
        <!-- Scroll To Top Start-->
        <!--================================-->	
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <!--/ Scroll To Top End -->
        <!--================================-->

        
        @include('dashboard.inc.modals')

        <!--================================-->
        <!-- Footer Script -->
        <!--================================-->
        <script src="../../assets/js/all.js"></script>
        <script src="../../assets/js/custom.js"></script>
        @if(\Session::has('success'))
            <?=
                "<script>
                    var msg   = '".\Session::get('success')."';
                    var title = 'success';
                    var type  = 'success';

                    toastr[type](msg, title, {
                        positionClass:     'toast-bottom-left',
                        closeButton:       true,
                        progressBar:       true,
                        preventDuplicates: true,
                        newestOnTop:       true,
                        rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                    });
                </script>";
            ?>
        @endif

        @if(\Session::has('failed'))
            <?=
                "<script>
                    var msg   = '".\Session::get('failed')."';
                    var title = 'failed';
                    var type  = 'error';

                    toastr[type](msg, title, {
                        positionClass:     'toast-bottom-left',
                        closeButton:       true,
                        progressBar:       true,
                        preventDuplicates: true,
                        newestOnTop:       true,
                        rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
                    });
                </script>";
            ?>
        @endif

        <script>
            //////default success

function statue_toast(type,msg){
  
  var title = type;
  
  toastr[type](msg, title, {
    positionClass:     'toast-bottom-left',
    closeButton:       true,
    progressBar:       true,
    preventDuplicates: true,
    newestOnTop:       true,
    rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
  });
}

//////default error

function default_error(){
  var msg   = 'something went wrong please try again!';
  var title = 'oops !';
  var type  = 'warning';

  toastr[type](msg, title, {
    positionClass:     'toast-bottom-left',
    closeButton:       true,
    progressBar:       true,
    preventDuplicates: true,
    newestOnTop:       true,
    rtl:               $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl'
  });
}

//////login

$('#loginform').submit(function(e){
  
    var token   = $('meta[name="csrf-token"]').attr('content');
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
        cache:false,
        dataType: "JSON",
         beforeSend:function(){
          $("#overlay").fadeIn(300); 
        },
        success: function(response) {
          alert(response);
        },
        error : function(response){
          default_error();
        }
  });
  
});

///////////load list details

$('.showdetails').click(function(e){
  
    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');

    var formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "HTML",
         beforeSend:function(){
        },
        success: function(response) {
          $('body #detailsModalCenter').modal('show');
          $('body #detailsModalCenter .modal-body').html(response);
        },
        error : function(response){
           default_error();
        }
  });
  
});

//////// change status

$('.modal').on('shown.bs.modal', function(e) {
  $('.chnage_statue a').click(function(e){
  
    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $('.chnage_statue').attr('data-link');
    var statue = $(this).attr('data-type');
    var list_id = $('.chnage_statue').attr('data-id');

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('statue', statue);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "HTML",
         beforeSend:function(){
        },
        success: function(response) {
          statue_success();
          $('body .list_'+list_id).remove();
          $('body #detailsModalCenter').modal('hide');          
        },
        error : function(response){
           default_error();
        }
  });
  
});
});

///////show moda addneworder

$('#addnewlist').click(function(e){
  
    var token   = $('meta[name="csrf-token"]').attr('content');
    var link = $(this).attr('data-link');
  

    var formData = new FormData();
    formData.append('_token', token);


    $.ajax({
        url: link,
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        data: formData,
        cache:false,
        dataType: "HTML",
         beforeSend:function(){
        },
        success: function(response) {
          $('body #addOrderModalCenter').modal('show');
          $('body #addOrderModalCenter .modal-body').html(response);
        },
        error : function(response){
           default_error();
        }
  });
  
});


///add new list_id
$('.modal').on('shown.bs.modal', function(e) {
$('#addnewlisting').submit(function(event){  
  
  CreateOrder(event);
  
  var link = $(this).attr('data-link');

  var datastring = $(this).serialize();


    $.ajax({
        url: link,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        data: datastring,
        dataType: "JSON",
         beforeSend:function(){
        },
        success: function(response) {
          $('body #addnewlisting').modal('hide');
          
            $.each(response, function(key, value) { 
              statue_toast("success",value)
          });

          $('body #addnewlisting')[0].reset();
        },
        error : function(response){
          default_error();
        }
  });
  
});
});

///////show moda addneworder

$('#addnewcity').click(function(e){
  
  var token   = $('meta[name="csrf-token"]').attr('content');
  var link = $(this).attr('data-link');


  var formData = new FormData();
  formData.append('_token', token);


  $.ajax({
      url: link,
      type: 'POST',
      processData: false, // important
      contentType: false, // important
      data: formData,
      cache:false,
      dataType: "HTML",
       beforeSend:function(){
      },
      success: function(response) {
        $('body #addCityModalCenter').modal('show');
        $('body #addCityModalCenter .modal-body').html(response);
      },
      error : function(response){
         default_error();
      }
});

});

        </script>
        
    </body>

</html>