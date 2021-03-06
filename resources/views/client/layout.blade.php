<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <link type="image/x-icon" href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
    <link href="{{ asset('assets/client/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome/all.css') }}">
    <style>
        i {
            padding: 5px;
        }
        .container-invoice,
        .container-settings,
        .container-ordernow,
        .container-ticket{
            margin-top: 100px !important;
        }

        .form-group.disable-input a {
            top: 37px !important;
        }
        .form-fix-padding{
            padding-top: 40px !important;
            padding-bottom: 10px !important;
            min-height: 0 !important;
        }
    </style>
</head>
<body>
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Client index route -->
                <a class="navbar-brand" href="{{ route('client.panels') }}">
                    <h5>Codpanel</h5>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                </button>
                <div class="dropdown">
                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                        <span class="nav-button">
                            {{ substr(\Illuminate\Support\Facades\Auth::guard('clients')->user()->name, 0, true) }}
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('client.settings') }}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="{{ route('client.logout') }}">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse text-center" id="navbarNavAltMarkup">
                    <div class="navbar-nav w-100 d-flex justify-content-center">
                        <div class="menu-link-container">
                            <a class="nav-item nav-link " href="{{ route('client.panels') }}">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Panels
                            </a>
                        </div>
                        <div class="menu-link-container">
                            <a class="nav-item nav-link" href="{{ route('client.orders') }}">
                                <i class="fa fa-file" aria-hidden="true"></i>
                                Orders
                            </a>
                        </div>
                        <div class="menu-link-container">
                            <a class="nav-item nav-link" href="{{ route('client.support') }}">
                                <i class="fa fa-life-ring" aria-hidden="true"></i>
                                Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
    <script src="{{ asset('assets/js/all.js') }}"></script>
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script>
        function enableInput(inputClass){
            $(`.disable-input input.${inputClass}`).css({
                "pointer-events": "initial",
                "backgroundColor": "#FFF"
            });
        }
    </script>
    @yield('javascript')
</body>