<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Login with Background Image - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin Dashboard</title>
    <link rel="apple-touch-icon" href="/backend/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/backend/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/fonts/material-icons/material-icons.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/material-vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/material.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/material-extended.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/material-colors.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/core/menu/menu-types/material-vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/backend/app-assets/css/pages/login-register.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/backend/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu material-vertical-layout material-layout 1-column  bg-full-screen-image blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-header row">
        </div>
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="/backend/app-assets/images/logo/logo-dark.png" alt="branding logo">
                                    </div>
                                </div>
                                <div class="card-content">

                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}" class="form-horizontal" novalidate>
                                            @csrf

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <!-- <input type="text" class="form-control" id="user-name" placeholder="Your Username" required> -->
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">

                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                    <fieldset>
                                                        <input class="chk-remember" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <!-- <input type="checkbox" id="remember-me" class="chk-remember"> -->
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right">
                                                    @if (Route::has('password.request'))
                                                    <a class="card-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                    @endif
                                                    <!-- <a href="recover-password.html" class="card-link">Forgot Password?</a></div> -->
                                                </div>
                                                <button type="submit" class="btn btn-outline-info mt-1 btn-block"><i class="ft-unlock"></i> Login</button>
                                        </form>
                                    </div>
                                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>New to Butler Logistics
                                            ?</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="/backend/app-assets/vendors/js/material-vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/backend/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="/backend/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/backend/app-assets/js/core/app-menu.js"></script>
    <script src="/backend/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/backend/app-assets/js/scripts/pages/material-app.js"></script>
    <script src="/backend/app-assets/js/scripts/forms/form-login-register.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
