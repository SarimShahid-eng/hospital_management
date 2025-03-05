@extends('layout.index')
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">

                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Account Overview
                    </h1>
                    <!--end::Title-->


                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="../index.html" class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Account </li>
                        <!--end::Item-->

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">

                <!--begin::Navbar-->
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt="image" />
                                    <div
                                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                    </div>
                                </div>
                            </div>
                            <!--end::Pic-->

                            <!--begin::Info-->
                            <div class="flex-grow-1"
                                style="display: flex;flex-direction: column;justify-content: space-around;">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Max
                                                Smith</a>
                                            <a href="#"><i class="fa-solid fa-circle-check   fs-1 text-primary"><span
                                                        class="path1"></span><span class="path2"></span></i></a>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">

                                            <a href="#"
                                                class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                                {{-- <i class="ki-duotone ki-sms fs-4"> --}}
                                                <span class="path1"></span><span class="path2"></span></i>Email:
                                                max@kt.com
                                            </a>
                                        </div>
                                        {{-- <div class="d-flex flex-wrap flex-stack">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                                <!--begin::Stats-->
                                                <div class="d-flex flex-wrap">
                                                    <!--begin::Stat-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                                    class="path1"></span><span class="path2"></span></i>
                                                            <div class="fs-2 fw-bold" data-kt-countup="true"
                                                                data-kt-countup-value="4500" data-kt-countup-prefix="$">0
                                                            </div>
                                                        </div>
                                                        <!--end::Number-->

                                                        <!--begin::Label-->
                                                        <div class="fw-semibold fs-6 text-gray-500">Earnings
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->

                                                    <!--begin::Stat-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2"><span
                                                                    class="path1"></span><span class="path2"></span></i>
                                                            <div class="fs-2 fw-bold" data-kt-countup="true"
                                                                data-kt-countup-value="80">0</div>
                                                        </div>
                                                        <!--end::Number-->

                                                        <!--begin::Label-->
                                                        <div class="fw-semibold fs-6 text-gray-500">Projects
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->

                                                    <!--begin::Stat-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                        <!--begin::Number-->
                                                        <div class="d-flex align-items-center">
                                                            <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                                    class="path1"></span><span class="path2"></span></i>
                                                            <div class="fs-2 fw-bold" data-kt-countup="true"
                                                                data-kt-countup-value="60" data-kt-countup-prefix="%">0
                                                            </div>
                                                        </div>
                                                        <!--end::Number-->

                                                        <!--begin::Label-->
                                                        <div class="fw-semibold fs-6 text-gray-500">Success Rate
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Stat-->
                                                </div>
                                                <!--end::Stats-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Progress-->
                                            <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                    <span class="fw-semibold fs-6 text-gray-500">Profile
                                                        Completion</span>
                                                    <span class="fw-bold fs-6">50%</span>
                                                </div>

                                                <div class="h-5px mx-3 w-100 bg-light mb-3">
                                                    <div class="bg-success rounded h-5px" role="progressbar"
                                                        style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end::Progress-->
                                        </div> --}}
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Navs-->
                                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                    <!--begin::Nav item-->
                                    <li class="nav-item mt-2">
                                        <a class="nav-link text-active-primary ms-0 me-10 py-5 active"
                                            href="{{ route(admin_route('profile.profile')) }}">
                                            Overview </a>
                                    </li>
                                    <!--end::Nav item-->
                                    <!--begin::Nav item-->
                                    <li class="nav-item mt-2">
                                        <a class="nav-link text-active-primary ms-0 me-10 py-5 "
                                            href="{{ route(admin_route('profile.edit_profile')) }}">
                                            Settings </a>
                                    </li>
                                    <!--end::Nav item-->
                                </ul>
                                <!--begin::Navs-->
                            </div>
                        </div>
                        <!--end::Navbar-->
                        <!--begin::details View-->
                        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                            <!--begin::Card header-->
                            <div class="card-header cursor-pointer">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Profile Details</h3>
                                </div>
                                <!--end::Card title-->

                                <!--begin::Action-->
                                {{-- <a href="settings.html" class="btn btn-sm btn-primary align-self-center">Edit
                                    Profile</a> --}}
                                <!--end::Action-->
                            </div>
                            <!--begin::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body p-9">
                                <!--begin::Row-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ Auth()->user()->name }}</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->

                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Company</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <span class="fw-semibold text-gray-800 fs-6">MKS CARDIOLOGY HOSPITAL</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                @if (Auth::user()->phone_no !== null)
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">
                                            Contact Phone

                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Phone number must be active">
                                                <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span></i> </span>
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Col-->

                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span
                                                class="fw-bold fs-6 text-gray-800 me-2">{{ Auth::user()->phone_no }}</span>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                @endif
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Company Site</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <a href="#"
                                            class="fw-semibold fs-6 text-gray-800 text-hover-primary">https://mkscardiologyclinic.com</a>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                @if (Auth::user()->branch_id !== null)
                                    <div class="row mb-7">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 fw-semibold text-muted">
                                            Branch
                                        </label>
                                        <!--end::Label-->
                                        <div class="col-lg-8">
                                            <span
                                                class="fw-bold fs-6 text-gray-800">{{ Auth::user()->branch_id === 0 ? 'Super Admin' : Auth::user()->branch->name }}</span>
                                        </div>
                                    </div>
                                @endif
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                {{-- <div class="row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Communication</label>
                                    <!--end::Label-->

                                    <!--begin::Col-->
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">Email, Phone</span>
                                    </div>
                                    <!--end::Col-->
                                </div> --}}
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-10">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
                                    <!--begin::Label-->

                                    <!--begin::Label-->
                                    <div class="col-lg-8">
                                        <span class="fw-semibold fs-6 text-gray-800">Yes</span>
                                    </div>
                                    <!--begin::Label-->
                                </div>
                                <!--end::Input group-->

                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::details View-->

                    </div>
                    <!--end::Content container-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Content wrapper-->
        </div>
    </div>
@endsection
