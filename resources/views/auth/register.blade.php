{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<!DOCTYPE html>
<html class="loading" lang="id" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <title>Daftar</title>
        <link rel="apple-touch-icon" href="../../../app-assets/images/logoan3.png">
        <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/logoan3.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/bordered-layout.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
        <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-auth.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="auth-wrapper auth-v2">
                        <div class="auth-inner row m-0">
                            <!-- Brand logo--><a class="brand-logo" href="#">
                                <img src="/app-assets/images/logoan3.png" height="80px"></span>
                            </a>
                            <!-- /Brand logo-->
                            <!-- Left Text-->
                            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="../../../app-assets/images/pages/register-v2.svg" alt="Register V2" /></div>
                            </div>
                            <!-- /Left Text-->
                            <!-- Register-->
                            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                    <h2 class="card-title fw-bold mb-1">Daftar Disini</h2>
                                    <p class="card-text mb-2">Daftarkan Akun Anda!</p>
                                    <x-jet-validation-errors/>
                                    <form class="auth-register-form mt-2" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="mb-1">
                                            <label class="form-label" for="register-username">{{ __('Nama') }}</label>
                                            <input class="form-control" id="register-username" type="text" aria-describedby="register-username" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" tabindex="1" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="register-email">{{ __('Email') }}</label>
                                            <input class="form-control" id="register-email" type="text" name="email" value="{{ old('email') }}" required aria-describedby="register-email" tabindex="2" />
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="register-password">{{ __('Password') }}</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input class="form-control form-control-merge" id="register-password" type="password" name="password" required autocomplete="new-password" placeholder="············" aria-describedby="register-password" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <label class="form-label" for="register-confirm-password">{{ __('Konfirmasi Password') }}</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input class="form-control form-control-merge" id="register-confirm-password" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="············" aria-describedby="register-password" tabindex="3" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>

                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                        <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" id="terms" type="checkbox" tabindex="3" required/>
                                                <label class="form-check-label" for="terms"> Saya menyetujui<a href="{{ route('terms.show') }}"> Syarat dan Ketentuan</a> serta <a href="{{ route('policy.show') }}"> Kebijakan Privasi</a></label>
                                            </div>
                                        </div>
                                        @endif

                                        <button class="btn btn-primary w-100 mt-1" tabindex="5">Daftar</button>
                                    </form>
                                    <p class="text-center mt-2"><span>Sudah Punya Akun?</span><a href={{ route('login') }}><span>&nbsp;Login</span></a></p>
                                </div>
                            </div>
                            <!-- /Register-->
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
        <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="../../../app-assets/js/core/app-menu.js"></script>
        <script src="../../../app-assets/js/core/app.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="../../../app-assets/js/scripts/pages/page-auth-register.js"></script>
        <!-- END: Page JS-->

        <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        </script>
</body>
<!-- END: Body-->

</html>
