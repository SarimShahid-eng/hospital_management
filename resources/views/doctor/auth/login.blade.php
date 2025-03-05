@include('admin.login_header')

<body id="kt_body" class="app-blank">
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <div class="text-center mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3">
                                Doctor Sign In
                            </h1>
                        </div>
                        <div class="row g-3 mb-9">
                            <div class="col-md-6">
                                <a href="{{ route('receptionist.login') }}"
                                    class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                    <i class="fa-solid fa-user"></i> Receptionist-Sign in
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('doctor.login') }}"
                                    class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                    <i class="fa-solid fa-user-doctor"></i> Doctor-Sign in
                                </a>
                            </div>
                        </div>

                        <div class="separator separator-content my-14">
                            <span class="w-125px text-gray-500 fw-semibold fs-7">Sign-In with email</span>
                        </div>
                        <form action="{{ route('doctor.login') }}" method="POST">
                            @csrf
                            <div class="fv-row mb-8">
                                <input type="text" :value="old('username')" required placeholder="Email"
                                    name="username" autocomplete="off" class="form-control bg-transparent" />
                                <x-input-error style="color: red;" :messages="$errors->get('username')" class="mt-2" />
                            </div>
                            <div class="fv-row mb-3">
                                <input type="password" placeholder="Password" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <x-input-error style="color: red;" :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                {{-- @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="link-dark">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif --}}
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-dark">
                                    <span class="indicator-label">
                                        {{ __('Log in') }}</span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-color:black;">
                <div class="d-flex flex-column flex-center px-5 px-md-15 w-100">
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
                    <div id="clinic-desc" class="d-none d-lg-block text-white fs-base text-center"
                        style="opacity: 0; transition: opacity 1.5s ease-in-out;">
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1"> MKS </a>
                        is a state-of-the-art cardiology hospital specializing in the diagnosis, treatment,
                        and prevention of heart-related conditions. The hospital is equipped with advanced
                        medical technology and a team of highly skilled cardiologists, cardiac surgeons,
                        and healthcare professionals dedicated to providing comprehensive cardiac care.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // var hostUrl = "./assets/index.html";
    </script>
    <script src="{{ asset('assets') }}/plugins/global/plugins.bundle.js"></script>
    <script src="{{ asset('assets') }}/js/scripts.bundle.js"></script>
    <script src="{{ asset('assets') }}/js/custom/authentication/sign-in/general.js"></script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            let logo = document.getElementById("logo");
            logo.classList.remove("d-none");
            logo.style.opacity = "1";
        }, 500);
    });

    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            document.getElementById("clinic-title").style.opacity = "1";
            document.getElementById("clinic-desc").style.opacity = "1";
            let logo = document.getElementById("logo");
            logo.classList.remove("d-none");
            logo.style.opacity = "1";
        }, 500);
    });
</script>

</html>
