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
                    $(()=>{
                        UIkit.notification({message: '".\Session::get('success')."', pos: 'top-left'});
                    })
                </script>";
            ?>
        @endif
        
    </body>

</html>