<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>MKS Cardiology</title>
    <meta charset="utf-8" />


    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="MKS Cardiology" />
    <meta property="og:url" content="https://mkscardiologyclinic.com/" />
    <meta property="og:site_name" content="MKS CARDIOLOGY" />
    <link rel="canonical" href="sign-in.html" />
    <link rel="shortcut icon" href="{{ asset('assets') }}/logos/mks_updated_logo.png" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->



    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets') }}/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <style>
        .image {
            /* position: absolute; */
            top: 50%;
            left: 50%;
            width: 46px;
            /* height: 46px; */
            /* margin: -60px 0 0 -60px; */
            -webkit-animation: spin 4s linear infinite;
            -moz-animation: spin 4s linear infinite;
            animation: spin 4s linear infinite;
        }

        @-moz-keyframes spin {
            100% {
                -moz-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
    <!--begin::Google tag-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');
    </script>
    <!--end::Google tag-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">

        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">

                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" method="POST"
                            action="{{ route('admin.login') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    Admin Sign In
                                </h1>

                            </div>
                            {{-- Doctor/Patient --}}
                            <div class="row g-3 mb-9">
                                {{-- <div class="col-md-6">
                                    <a href="{{ route('login') }}"
                                        class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                        <i class="fa-solid fa-user"></i> Patient-Sign in
                                    </a>
                                </div> --}}
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <!--begin::Google link--->
                                    <a href="{{ route('doctor.login') }}"
                                        class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                        {{-- <img alt="Logo" src="../../../assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3">
                                        <img alt="Logo" src="../../../assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3"> --}}
                                        <i class="fa-solid fa-user-doctor"></i> Doctor-Sign in
                                        {{-- Sign in with Apple --}}
                                    </a>
                                    <!--end::Google link--->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <!--begin::Google link--->
                                    <a href="{{ route('receptionist.login') }}"
                                        class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                        {{-- <img alt="Logo" src="../../../assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3"> --}}

                                        <i class="fa-solid fa-user"></i> Receptionist-Sign in
                                    </a>
                                    <!--end::Google link--->
                                </div>
                                <!--end::Col-->
                            </div>
                            {{-- ended --}}
                            {{-- Receptionist/Labortarist --}}

                            {{-- ended --}}


                            <div class="separator separator-content my-14">
                                <span class="w-125px text-gray-500 fw-semibold fs-7">Sign-In with email</span>
                            </div>
                            <!--end::Separator-->

                            <!--begin::Input group--->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" :value="old('email')" required placeholder="Email" name="email"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <x-input-error style="color: red;" :messages="$errors->get('email')" class="mt-2" />
                                <!--end::Email-->
                            </div>

                            <!--end::Input group--->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <x-input-error style="color: red;" :messages="$errors->get('password')" class="mt-2" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group--->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>

                                <!--begin::Link-->
                                {{-- @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="link-dark">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif --}}

                                <!--end::Link-->
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-dark">

                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">
                                        {{ __('Log in') }}</span>
                                    <!--end::Indicator label-->

                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    <!--end::Indicator progress--> </button>
                            </div>
                            <!--end::Submit button-->


                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->

                <!--begin::Footer-->
                {{-- <div class="w-lg-500px d-flex flex-stack px-10 mx-auto">
                    <!--begin::Languages-->
                    <div class="me-10">
                        <!--begin::Toggle-->
                        <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            data-kt-menu-offset="0px, 0px">
                            <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3"
                                src="./assets/media/flags/united-states.svg" alt="" />

                            <span data-kt-element="current-lang-name" class="me-1">English</span>

                            <span class="d-flex flex-center rotate-180">
                                <i class="ki-duotone ki-down fs-5 text-muted m-0"></i> </span>
                        </button>
                        <!--end::Toggle-->

                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7"
                            data-kt-menu="true" id="kt_auth_lang_menu">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="English">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1"
                                            src="./assets/media/flags/united-states.svg" alt="" />
                                    </span>
                                    <span data-kt-element="lang-name">English</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1"
                                            src="./assets/media/flags/spain.svg" alt="" />
                                    </span>
                                    <span data-kt-element="lang-name">Spanish</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="German">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1"
                                            src="./assets/media/flags/germany.svg" alt="" />
                                    </span>
                                    <span data-kt-element="lang-name">German</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="Japanese">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1"
                                            src="./assets/media/flags/japan.svg" alt="" />
                                    </span>
                                    <span data-kt-element="lang-name">Japanese</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link d-flex px-5" data-kt-lang="French">
                                    <span class="symbol symbol-20px me-4">
                                        <img data-kt-element="lang-flag" class="rounded-1"
                                            src="./assets/media/flags/france.svg" alt="" />
                                    </span>
                                    <span data-kt-element="lang-name">French</span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Languages-->

                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a href="../../../pages/team.html" target="_blank">Terms</a>

                        <a href="../../../pages/pricing/column.html" target="_blank">Plans</a>

                        <a href="../../../pages/contact.html" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
                </div> --}}
                <!--end::Footer-->
            </div>
            <!--end::Body-->

            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-color:black;">

                {{-- <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url({{ asset('assets') }}/media/misc/auth-bg.png)"> --}}
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <div>
                        <h1 id="clinic-title" class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-0"
                            style="opacity: 0; transition: opacity 1.5s ease-in-out;">
                            <img class="image" src="{{ asset('assets') }}/logos/mks_updated_logo.png" alt="">
                            MKS CARDIOLOGY CLINIC
                        </h1>
                        <div class="d-flex justify-content-center" style="margin:30px 0;">
                            <img id="logo" alt="Logo" src="{{ asset('assets') }}/logos/Hsp.gif" class="d-none"
                                style="width:300px; opacity: 0; transition: opacity 1.5s ease-in-out;" />
                        </div>
                    </div>
                    <!--end::Logo-->

                    <!--begin::Text-->
                    <div id="clinic-desc" class="d-none d-lg-block text-white fs-base text-center"
                        style="opacity: 0; transition: opacity 1.5s ease-in-out;">
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1"> MKS </a>
                        is a state-of-the-art cardiology hospital specializing in the diagnosis, treatment,
                        and prevention of heart-related conditions. The hospital is equipped with advanced
                        medical technology and a team of highly skilled cardiologists, cardiac surgeons,
                        and healthcare professionals dedicated to providing comprehensive cardiac care.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->

    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        // var hostUrl = "./assets/index.html";
    </script>

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets') }}/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            let logo = document.getElementById("logo");
            logo.classList.remove("d-none"); // Remove 'd-none' if needed
            logo.style.opacity = "1"; // Fade in effect
        }, 500); // Delay for a smoother transition (optional)
    });

    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            // Show all elements together smoothly
            document.getElementById("clinic-title").style.opacity = "1";
            document.getElementById("clinic-desc").style.opacity = "1";
            let logo = document.getElementById("logo");
            logo.classList.remove("d-none");
            logo.style.opacity = "1";
        }, 500); // Delay for smooth transition
    });
</script>

</html>
