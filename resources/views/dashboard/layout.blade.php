<!DOCTYPE html>
<html lang="zxx">
   
    <head>
        @include('dashboard.inc.head')
    </head>
  <body dir="rtl" data-auth-id="{{ System::admin()->id }}" data-auth-type="{{ System::auth_type() }}" data-limit="15" data-product="" data-employee="" data-provider=""  data-search="" data-city="" data-orderby="" data-from="" data-to="" data-date="" data-handler="admin" data-type="{{ \Request::route()->getName() == 'dashboard.listing.index' ? 'new':'all' }}" @yield('body_class')>
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
        <script src="{{ asset('assets/js/all.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}" type="module"></script>
        <script src="{{ asset('assets/js/pagination.js') }}"></script>
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
        
    </body>

</html>