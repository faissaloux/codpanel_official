@section('title')
    Listing | {{ env('APP_NAME') }}
@endsection

<!DOCTYPE html>
<html lang="zxx">
   
<head>
    @include('dashboard.inc.head')
</head>
<body dir="rtl" class="providers-listing-page" data-auth-id="{{ System::provider()->id }}" data-auth-type="{{ System::auth_type() }}" data-limit="15" data-product="" data-employee="" data-provider=""  data-search="" data-city="" data-orderby="" data-from="" data-to=""  data-handler="provider" data-type="all">
    @include('dashboard.inc.actions')
    <!--================================-->
    <!-- Page Container Start -->
    <!--================================-->
    <div class="page-container">

        <!--================================-->
        <!-- Page Content Start -->
        <!--================================-->
        <div class="page-content get-down" style="margin-right: 0; width: 100%;">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            @include('provider.inc.nav')
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
    <script src="{{ asset('/assets/js/all.js') }}"></script>
    <script src="{{ asset('/assets/js/provider.js') }}"></script>
    <script src="{{ asset('/assets/js/pagination.js') }}"></script>
        
    </body>

</html>