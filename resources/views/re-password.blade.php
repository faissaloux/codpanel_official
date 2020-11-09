<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="shreethemes@gmail.com" />
        <meta name="website" content="http://www.shreethemes.in/" />
        <meta name="Version" content="v2.5.1" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v2.1.9/css/unicons.css">
        <!-- Main Css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">

    </head>

    <body>
         
        
        <div class="back-to-home rounded d-none d-sm-block">
            <a href="{{route('index')}}" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
        </div>

        <!-- Hero Start -->
        <section class="cover-user bg-white">
            <div class="container-fluid px-0">
                <div class="row no-gutters position-relative">
                    <div class="col-lg-4 cover-my-30 order-2">
                        <div class="cover-user-img d-flex align-items-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card login_page border-0" style="z-index: 1">
                                        <div class="card-body p-0">
                                            <h4 class="card-title text-center">Recover Account</h4>  
                                            <form class="login-form mt-4">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <p class="text-muted">Please enter your email address. You will receive a link to create a new password via email.</p>
                                                        <div class="form-group position-relative">
                                                            <label>Email address <span class="text-danger">*</span></label>
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input type="email" class="form-control pl-5" placeholder="Enter Your Email Address" name="email" required="">
                                                        </div>
                                                    </div><!--end col-->
                                                    <div class="col-lg-12">
                                                        <button class="btn btn-primary btn-block">Send</button>
                                                    </div><!--end col-->
                                                    <div class="mx-auto">
                                                        <p class="mb-0 mt-3"><small class="text-dark mr-2">Remember your password ?</small> <a href="{{route('singin')}}" class="text-dark font-weight-bold">Sign in</a></p>
                                                    </div><!--end col-->
                                                </div><!--end row-->
                                            </form>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div> <!-- end about detail -->
                    </div> <!-- end col -->    

                    <div class="col-lg-8 offset-lg-4 padding-less img order-1" style="background-image:url('images/user/03.jpg')" data-jarallax='{"speed": 0.5}'></div><!-- end col -->    
                </div><!--end row-->
            </div><!--end container fluid-->
        </section><!--end section-->
        <!-- Hero End -->

         

        <!-- javascript -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <script src="../../../unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>
    </body>
 
</html>