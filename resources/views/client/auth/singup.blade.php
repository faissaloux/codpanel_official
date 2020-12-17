<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Premium Bootstrap 4 Landing Page Template"/>
    <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern"/>
    <meta name="author" content="Shreethemes"/>
    <meta name="email" content="shreethemes@gmail.com"/>
    <meta name="website" content="http://www.shreethemes.in/"/>
    <meta name="Version" content="v2.5.1"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons -->
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/unicons/unicons.css') }}">
    <!-- Main Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" id="theme-opt"/>
    <link href="{{ asset('css/colors/default.css') }}" rel="stylesheet" id="color-opt">

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
                                    <h4 class="card-title text-center">Signup</h4>
                                    <form class="login-form mt-4" method="POST" action="{{ route('client.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>First name <span class="text-danger">*</span></label>
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input type="text" class="form-control pl-5"
                                                           placeholder="First Name" name="firstName" required="">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="form-group position-relative">
                                                    <label>Last name <span class="text-danger">*</span></label>
                                                    <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                    <input class="form-control pl-5" name="lastName"
                                                           placeholder="Last Name"
                                                           required="" type="text">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label>Your Email <span class="text-danger">*</span></label>
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input type="email" class="form-control pl-5" placeholder="Email"
                                                           name="email" required="">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label>Password <span class="text-danger">*</span></label>
                                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                                    <input type="password" name="password" class="form-control pl-5"
                                                           placeholder="Password" required="">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="acceptTerms"
                                                               class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">
                                                            I Accept <a href="#" class="text-primary">Terms And
                                                                Condition </a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-block">Register</button>
                                            </div>
                                            <!--end col-->
                                            <div class="mx-auto">
                                                <p class="mb-0 mt-3">
                                                    <small class="text-dark mr-2">Already have an account ?</small>
                                                    <a href="{{route('client.login')}}"
                                                       class="text-dark font-weight-bold">Sign in</a>
                                                </p>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <!-- end about detail -->
            </div>
            <!-- end col -->
            <div class="col-lg-8 offset-lg-4 padding-less img order-1"
                 style="background-image:url('{{ asset('images/user/02.jpg') }}')" data-jarallax='{"speed": 0.5}'></div>
            <!-- end col -->
        </div>
        <!--end row-->
    </div>
    <!--end container fluid-->
</section>
<!--end section-->
<!-- Hero End -->
<!-- javascript -->
<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/scrollspy.min.js') }}"></script>
<!-- Icons -->
<script src="{{ asset('js/feather.min.js') }}"></script>
<script src="{{ asset('js/unicons/bundle.js') }}"></script>
<!-- Switcher -->
<script src="{{ asset('js/switcher.js') }}"></script>
<!-- Main Js -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>