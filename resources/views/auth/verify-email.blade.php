{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html class="loading" lang="id" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <title>Verifikasi email</title>
        <link rel="apple-touch-icon" href="../../../app-assets/images/logoan3.png">
        <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/logoan3.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.min.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/authentication.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="auth-wrapper auth-cover">
                        <div class="auth-inner row m-0">
                            <!-- Brand logo-->
                            <a class="brand-logo" href="index.html">
                                <img src="/app-assets/images/logoan3.png" height="80px"></span>
                            </a>
                            <!-- /Brand logo-->
                            <!-- Left Text-->
                            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="../../../app-assets/images/illustration/verify-email-illustration.svg" alt="two steps verification"/></div>
                            </div>
                            <!-- /Left Text-->
                            <!-- verify email v2-->
                            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                    <h2 class="card-title fw-bolder mb-1">Verifikasi email anda &#x2709;&#xFE0F;</h2>
                                    <p class="card-text mb-2">Verifikasi dikirim ke alamat email :<span class="fw-bolder"> {{ Auth::user()->email }}</span> segera cek kotak masuk email anda.</p>
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf

                                        <div>
                                            <button type="submit" class="btn btn-primary w-100">Kirim ulang email verifikasi</a>
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="btn btn-danger w-100 mt-2">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <!-- verify email-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content-->


            <!-- BEGIN: Vendor JS-->
            <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
            <!-- BEGIN Vendor JS-->

            <!-- BEGIN: Page Vendor JS-->
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Theme JS-->
            <script src="../../../app-assets/js/core/app-menu.min.js"></script>
            <script src="../../../app-assets/js/core/app.min.js"></script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <!-- END: Page JS-->

            <script>
            $(window).on('load',  function(){
                if (feather) {
                feather.replace({ width: 14, height: 14 });
                }
            })
            </script>
  </body>
  <!-- END: Body-->
  </html>
