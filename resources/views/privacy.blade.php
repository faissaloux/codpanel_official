@include('elements/header')
        <!-- Hero Start -->
        <section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title"> Privacy Policy </h4>
                            <ul class="list-unstyled mt-4">
                                <li class="list-inline-item h6 date text-muted"> <span class="text-dark">Last Revised :</span> 23th Sep, 2019</li>
                            </ul>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Privacy</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->   

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->
        
        <!-- Start Privacy -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="card shadow rounded border-0">
                            <div class="card-body">
                                <h5 class="card-title">Overview :</h5>
                                <p class="text-muted">It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text.</p>
                                <p class="text-muted">In the 1960s, the text suddenly became known beyond the professional circle of typesetters and layout designers when it was used for Letraset sheets (adhesive letters on transparent film, popular until the 1980s) Versions of the text were subsequently included in DTP programmes such as PageMaker etc.</p>
                                <p class="text-muted">There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories.</p>
                            
                                <h5 class="card-title">We use your information to :</h5>
                                <ul class="list-unstyled text-muted">
                                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>Digital Marketing Solutions for Tomorrow</li>
                                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>Our Talented & Experienced Marketing Agency</li>
                                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>Create your own skin to match your brand</li>
                                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>Digital Marketing Solutions for Tomorrow</li>
                                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>Our Talented & Experienced Marketing Agency</li>
                                    <li><i data-feather="arrow-right" class="fea icon-sm mr-2"></i>Create your own skin to match your brand</li>
                                </ul>
    
                                <h5 class="card-title">Information Provided Voluntarily :</h5>
                                <p class="text-muted">In the 1960s, the text suddenly became known beyond the professional circle of typesetters and layout designers when it was used for Letraset sheets (adhesive letters on transparent film, popular until the 1980s) Versions of the text were subsequently included in DTP programmes such as PageMaker etc.</p>
    
                                <a href="javascript:void(0)" class="btn btn-primary">Print</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Privacy -->
        @include('elements/footer')