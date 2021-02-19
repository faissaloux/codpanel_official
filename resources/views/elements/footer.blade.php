

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2 text-right">
                        <a href="{{route('index')}}" class="logo-footer">
                            <img src="images/logo-light.png" height="24" alt="">
                        </a>
                        <p class="mt-4">ابدأ العمل مع Codpanel التي يمكن أن توفر كل ما تحتاجه لادارة مبيعاتك و زيادتها</p>
                         <ul class="list-unstyled social-icon social mb-0 mt-4">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook fea icon-sm fea-social"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram fea icon-sm fea-social"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter fea icon-sm fea-social"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin fea icon-sm fea-social"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></a></li>
                        </ul>
                    </div><!--end col-->
                    
                    <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0 text-right">
                        <h4 class="text-light footer-head">Codpanel</h4>
                        <ul class="list-unstyled footer-list mt-4 pr-0" dir="ltr">
                            <li><a href="{{route('about')}}" class="text-foot"><i class="mdi mdi-chevron-left mr-1"></i>معلومات عنا</a></li>
                             
                             
                             
                            <li><a href="{{route('faq')}}" class="text-foot"><i class="mdi mdi-chevron-left mr-1"></i> الأسئلة المتكررة</a></li>
                             <li><a href="{{route('contact')}}" class="text-foot"><i class="mdi mdi-chevron-left mr-1"></i> تواصل معنا</a></li>
                             
                            <li><a href="{{route('singin')}}" class="text-foot"><i class="mdi mdi-chevron-left mr-1"></i> تسجيل الدخول</a></li>
                        </ul>
                    </div><!--end col-->
                    
                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0 text-right">
                        <h4 class="text-light footer-head">Usefull Links</h4>
                        <ul class="list-unstyled footer-list mt-4 pr-0" dir="ltr">
                            <li><a href="{{route('terms')}}" class="text-foot"><i class="mdi mdi-chevron-left mr-1"></i> Terms of Services</a></li>
                            <li><a href="{{route('privacy')}}" class="text-foot"><i class="mdi mdi-chevron-left mr-1"></i> Privacy Policy</a></li>
                             
                             
                             
                        </ul>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0 text-right">
                        <h4 class="text-light footer-head">النشرة الإخبارية</h4>
                        <p class="mt-4">قم بالتسجيل وتلقي أحدث النصائح عبر البريد الإلكتروني.</p>
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="foot-subscribe form-group position-relative">
                                        <label>اكتب بريدك الإلكتروني <span class="text-danger">*</span></label>
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input type="email" name="email" id="emailsubscribe" class="form-control pl-5 rounded" placeholder="البريد الإلكتروني : " required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary btn-block" value="الإشتراك">
                                </div>
                            </div>
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <footer class="footer footer-bar">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-right">
                            <p class="mb-0">© 2020  Codpanel<i class=" "></i>  </p>
                        </div>
                    </div><!--end col-->

                    <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <ul class="list-unstyled text-sm-left mb-0">
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/american-ex.png" class="avatar avatar-ex-sm" title="American Express" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/discover.png" class="avatar avatar-ex-sm" title="Discover" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/master-card.png" class="avatar avatar-ex-sm" title="Master Card" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/paypal.png" class="avatar avatar-ex-sm" title="Paypal" alt=""></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/visa.png" class="avatar avatar-ex-sm" title="Visa" alt=""></a></li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->

         

        <!-- Back to top -->
        <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <!-- SLIDER -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/owl.init.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <script src="../../../unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>
    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Nov 2020 12:17:18 GMT -->
</html>