@extends('layout.index')
{{-- <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script> --}}

<head>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2/dist/sweetalert2.all.min.js" integrity="sha256-5Eneyg9KFsV9wx0iFJvBWBkF4S99IzuKfaLCxXGkGjs=" crossorigin="anonymous"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2/dist/sweetalert2.min.css" integrity="sha256-KIZHD6c6Nkk0tgsncHeNNwvNU1TX8YzPrYn01ltQwFg=" crossorigin="anonymous"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.3/dist/sweetalert2.min.css"> --}}
</head>
@section('content')


<style>
    .appointmentsTable:not(.table-bordered) td:first-child,
    .appointmentsTable:not(.table-bordered) th:first-child,
    .appointmentsTable:not(.table-bordered) tr:first-child {
        padding-left: 7px;
    }

    .swal2-actions.swal-confirm {
        border: 0 !important;
    }

    .swal2-actions.swal-confirm:focus {
        border: 0 !important;
    }

    .btn-custom-confirm:focus,
    .swal2-cancel:focus {
        outline: none !important;
    }

    /* .swal2-warning{border-color:#facea8;color:#f8bb86}div:where(.swal2-icon).swal2-warning.swal2-icon-show{animation:swal2-animate-error-icon .5s}div:where(.swal2-icon).swal2-warning.swal2-icon-show .swal2-icon-content{animation:swal2-animate-i-mark .5s}div:where(.swal2-icon).swal2-info{border-color:#9de0f6;color:#3fc3ee} */
    #service_body tr {
        border-bottom-style: none;
    }

    #tableTotal input[type='text'] {

        font-weight: bolder;
        border: none !important;
        background: transparent !important;
        border-bottom: 1px solid #ccc !important;
        border-radius: 0;

    }

    .box2 {
        background-color: #F9F9F9;

        margin-top: 20px;
        border-radius: 5px;
    }

    .head {
        background-color: #F9F9F9;
        padding: 10px;
    }

    .head h5 {
        color: #959292;
        /* color: #fff; */
        margin: 0;
    }

    .addrss-list th,
    .addrss-list td {
        padding: 10px;
        text-align: left;
        border: 1px solid rgba(128, 128, 128, 0.5);
    }

    .addrss-list input {
        width: 100%;
        padding: 5px;
        border: 1px solid #ccc;
    }

    .data {
        background-color: #F9F9F9;
        padding: 20px 12px;
    }

    .buton {
        display: flex;
        justify-content: center;
    }

    .submited {

        /* background-color: #0275d8;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border: 1px solid #0275d8; */
        /* color: #fff; */
        width: 70px;
        height: 32px;
    }

    /* // select2 css started */
    .select2-result-repository {
        padding-top: 4px;
        padding-bottom: 3px;
    }

    .select2-results__option[aria-selected] {
        cursor: pointer;
    }

    .select2-result-repository__avatar {
        float: left;
        width: 60px;
        margin-right: 10px;
    }

    .select2-result-repository__meta {
        margin-left: 70px;
    }

    .select2-results__option--highlighted .select2-result-repository__title {
        color: #595e72;
    }

    .select2-result-repository__title {
        font-size: 16px;
        font-weight: 600;
        word-wrap: break-word;
        line-height: 1.1;
        margin-bottom: 4px;
    }

    .select2-results__option--highlighted .select2-result-repository__description,
    .select2-results__option--highlighted .select2-result-repository__forks,
    .select2-results__option--highlighted .select2-result-repository__stargazers,
    .select2-results__option--highlighted .select2-result-repository__watchers {
        color: #c1d7e9;
    }

    .select2-result-repository__forks,
    .select2-result-repository__stargazers,
    .select2-result-repository__watchers {
        display: inline-block;
        /* color: #aaa; */
        font-weight: 400 !important;
        /* font-weight: 700; */
        font-size: 11px;
    }

    .select2-result-repository__forks,
    .select2-result-repository__stargazers,
    .select2-result-repository__watchers {
        margin-right: 1em;
    }

    .page-heading-form {
        font-size: 31px !important;
    }
</style>
<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">



            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <!--begin::Title-->
                <h1
                    class="page-heading page-heading-form d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Patient Registration
                </h1>
                <!--end::Title-->
                <h6>{{ @$message }}</h6>

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href=" @adminRoute('dashboard.index') " class="text-muted text-hover-primary">
                            Home </a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        Patient </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content  flex-column-fluid ">


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container  container-xxl ">
            <!--begin::Form-->
            <form enctype="multipart/form-data" class="imageUploadForm form d-flex flex-column flex-lg-row"
                method="POST" action="@adminRoute('appointment.store')">
                @csrf

                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_Patient_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    {{-- Appointments not for labortary  --}}
                                    @if (!isset($lab_appointments))
                                    <div class="container row align-items-center justify-content-center mb-5 mt-2">
                                        <div class="col-md-10">
                                            <label class="form-label" for="">Appointment search (Enter
                                                Mobile
                                                Number - Mr.no)</label>

                                            <select id="appointment_id" name="branch_id"
                                                class="form-select form-select-solid" data-kt-select2="true"
                                                data-close-on-select="false" data-placeholder="Select option"
                                                data-allow-clear="true">
                                                <option></option>
                                            </select>
                                        </div>

                                        <div class="col-md-2" style="margin-top: 25px;">
                                            <select id="searchType" name="range_on" data-control="select2"
                                                data-hide-search="true" class="form-select form-select-solid mb-2">
                                                <option disabled="true" selected value="">
                                                    Select search type</option>
                                                <option value="mr_no"> Mr-no.
                                                </option>
                                                <option value="phone_no">Phone number
                                                </option>

                                            </select>
                                            {{-- <button class="btn btn-primary">Search</button> --}}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                            <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                                <input id="update_id" type="hidden" name="update_id"
                                                    value="{{ @$appointment->id }}">
                                                <!--begin::Label-->
                                                <label class="required form-label">Full name</label>
                                                <input class="form-control" name="firstname" id="firstname"
                                                    placeholder="Enter First name"
                                                    value="{{ $appointment->users->firstname ?? ($lab_appointments->users->firstname ?? null) }}">
                                                <!--end::Input-->
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <input id="loopCounter" type="hidden" name="loopCounter">
                                            <div class="flex-row-fluid">
                                                <!--begin::Label-->
                                                <label class="form-label">Last name</label>
                                                <input class="form-control" name="username" id="username"
                                                    value="{{ @$appointment->users->username ?? ($lab_appointments->users->username ?? null) }}"
                                                    placeholder="Enter Last name">
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row mt-3 gap-5">

                                            <div
                                                class="fv-row flex-row-fluid fv-plugins-icon-container col-md-6 col-lg-6 col-12">
                                                <!--begin::Label-->
                                                <label class="form-label">Password</label>
                                                <input class="form-control" name="password"
                                                    placeholder="Enter Password">
                                                <!--end::Input-->
                                            </div>
                                            <div class="flex-row-fluid col-lg-6 col-md-6 col-12">
                                                <label class="form-label">Age</label>
                                                <input id="age" type="number" class="form-control" name="age"
                                                    minlength="1" maxlength="3"
                                                    value="{{ @$appointment->users->age ?? ($lab_appointments->users->age ?? null) }}"
                                                    placeholder="Enter Age">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                            <div class="fv-row flex-row-fluid fv-plugins-icon-container col-md-6">
                                                <!--begin::Label-->
                                                <label class="required form-label">Image</label>
                                                <input type="file" class="form-control" name="image"
                                                    placeholder="Enter Email addresss" value="">
                                                <!--end::Input-->
                                                <img id="image_srcs" style="height:150px; display: none;"
                                                    class="img-fluid mt-4 rounded-1" src="" alt="">
                                                @if (@$user->image)
                                                <img id="image_src" class="img-fluid mt-4 rounded-1"
                                                    src="{{ asset('images') }}/patient_profile/{{ $appointment->users->image ?? ($lab_appointments->users->image ?? null) }}"
                                                    alt="">
                                                @endif
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>

                                            <div class="flex-row-fluid col-md-6 ">

                                                <label class="form-label">CNIC No.</label>


                                                <input id="cnic_no" type="number" minlength="13" maxlength="13"
                                                    class="form-control" name="cnic_no"
                                                    value="{{ @$appointment->users->cnic_no ?? ($lab_appointments->users->cnic_no ?? null) }}"
                                                    placeholder="XXXXXXXXXXXXX">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row mt-3 gap-5 ">
                                            <div
                                                class="fv-row flex-row-fluid fv-plugins-icon-container col-lg-6 col-md-6 col-12">
                                                <label class="form-label">Mobile No.</label>
                                                <input id="phone_no" type="number" class="form-control"
                                                    name="phone_no" maxlength="11" minlength="11"
                                                    value="{{ @$appointment->users->phone_no ?? ($lab_appointments->users->phone_no ?? null) }}"
                                                    placeholder="Enter Phone Number">
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>

                                            <div class="flex-row-fluid col-lg-6 col-md-6 col-12">
                                                <!--begin::Label-->
                                                <label class="form-label">Appointment Date</label>
                                                <input id="app_date" type="date" class="form-control"
                                                    name="appointment_date"
                                                    value="{{ @$appointment->appointment_date ?? ($lab_appointments->appointment_date ?? null) }}">
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                            <div
                                                class="fv-row flex-row-fluid fv-plugins-icon-container col-lg-6 col-md-6 col-12">
                                                <!--begin::Label-->
                                                <label class="required form-label">Appointment Time</label>
                                                <input id="app_time" type="time" class="form-control"
                                                    name="appointment_time" {{-- placeholder="Enter Appointment Time" --}}
                                                    value="{{ @$appointment->appointment_time ?? ($lab_appointments->appointment_time ?? null) }}">
                                                <!--end::Input-->
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>

                                            <div class="flex-row-fluid col-lg-6 col-md-6 col-12">
                                                <!--begin::Label-->
                                                <label class="form-label">Mr.no</label>
                                                <input readonly id="mr_no" type="text" class="form-control"
                                                    name="mr_no"
                                                    value="{{ @$appointment->mr_no ?? ($lab_appointments->mr_no ?? null) }}"
                                                    placeholder="Enter Mr.no">
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                            <div
                                                class="fv-row flex-row-fluid fv-plugins-icon-container col-lg-6 col-md-6 col-12">
                                                <!--begin::Label-->
                                                <label class="required form-label">DOB</label>
                                                <input id="dob" type="date" class="form-control"
                                                    name="dob"
                                                    value="{{ @$appointment->users->dob ?? ($lab_appointments->users->dob ?? null) }}">
                                                <!--end::Input-->
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            <div class="flex-row-fluid col-md-6  col-lg-6 col-12"
                                                style="padding-left: 11px">
                                                <label class="form-label w-100">Gender</label>
                                                <div class="d-flex align-items-center gap-5">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input id="male" class="form-check-input" name="gender"
                                                            type="radio" value="male" checked
                                                            @checked(@$appointment->users->gender == 'male' || @$lab_appointments->users->gender == 'male') id="flexRadioMale" />
                                                        <label class="form-check-label" for="flexRadioMale">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input id="female" class="form-check-input" name="gender"
                                                            type="radio" value="female" @checked(@$appointment->users->gender == 'female' ?? @$lab_appointments->users->gender == 'female')
                                                        id="flexRadioFemale" />
                                                        <label class="form-check-label" for="flexRadioFemale">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex flex-column flex-md-row mt-3 gap-5 ">
                                            <div class="fv-row  fv-plugins-icon-container col-lg-6 col-md-6 col-12">
                                                <!--begin::Label-->
                                                <label class="required form-label">Address </label>
                                                <input id="address" type="text" class="form-control"
                                                    name="address" placeholder="Enter Address"
                                                    value="{{ @$appointment->users->address ?? ($lab_appointments->users->address ?? null) }}">
                                                <!--end::Input-->
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>
                                            @if (Auth::user()->status === 0)
                                            <div
                                                class="d-flex flex-column flex-md-row  gap-5 col-lg-6 col-md-6 col-12">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container ">
                                                    <label class="required form-label">Branch </label>
                                                    <div>
                                                        <select id="branch_id" name="branch_id"
                                                            class="form-select form-select-solid"
                                                            data-kt-select2="true" data-close-on-select="false"
                                                            data-placeholder="Select Branch"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            @foreach ($branches as $branch)
                                                            <option value="{{ $branch->id }}"
                                                                @selected(@$appointment->branch_id == $branch->id || @$lab_appointments->branch_id == $branch->id)>
                                                                {{ $branch->name }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <input id="branch_input_id" name="branch_id" type="hidden"
                                                value="{{ Auth::user()->branch_id }}">
                                            @endif
                                        </div>


                                        <div class="d-flex flex-column flex-md-row mt-10 gap-5">
                                            <div
                                                class="fv-row flex-row-fluid fv-plugins-icon-container col-lg-6 col-md-6 col-12">
                                                <!--begin::Label-->
                                                <label class=" form-label">Consult - Test - Others</label>
                                                <select id="select_consult" name="range_on" data-control="select2"
                                                    data-hide-search="true"
                                                    class="form-select form-select-solid mb-2">
                                                    <option disabled="true" selected value="">
                                                        Select Desired
                                                        Service</option>
                                                    <option {{ isset($appointment) ? 'selected' : '' }}
                                                        value="0">Consult
                                                    </option>
                                                    <option {{ isset($lab_appointments) ? 'selected' : '' }}
                                                        value="1">Labortary
                                                    </option>

                                                </select>

                                                <!--end::Input-->
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>

                                            <div class="flex-row-fluid col-lg-6 col-md-6 col-12">
                                                <!--begin::Label-->
                                                <label id="branch_services_label" class="form-label">Services</label>
                                                <select id="branch_services_id" name=""
                                                    class="branch_services form-select form-select-solid"
                                                    data-kt-select2="true" data-close-on-select="false"
                                                    data-placeholder="Select option" data-allow-clear="true">
                                                    <option></option>

                                                </select>
                                            </div>
                                        </div>
                                        <div id="kt_table_users_wrapper"
                                            class="dt-container dt-bootstrap5 dt-empty-footer mt-5">
                                            <div id="" class="table-responsive">
                                                <table
                                                    class="table appointmentsTable align-middle table-row-dashed fs-6 gy-5 dataTable"
                                                    id="kt_table_users" style="width: 877.5px;">

                                                    <thead>
                                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0"
                                                            role="row">

                                                            <th class="min-w-125px dt-orderable-none"><span
                                                                    class="dt-column-title">Services</span></th>

                                                            <th class="min-w-125px dt-orderable-none"><span
                                                                    class="dt-column-title">Doctor Name</span></th>

                                                            <th class="min-w-125px dt-orderable-none"><span
                                                                    class="dt-column-title">Que.No#</span></th>

                                                            <th class="min-w-125px dt-orderable-none"><span
                                                                    class="dt-column-title">Referring Physician</span>
                                                            </th>

                                                            <th class="min-w-125px dt-orderable-none"><span
                                                                    class="dt-column-title">Discount</span></th>`

                                                            <th class="min-w-125px dt-orderable-none"><span
                                                                    class="dt-column-title">Amount</span></th>

                                                            <th class="min-w-125px dt-orderable-none text-center"><span
                                                                    class="dt-column-title">Action</span></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="service_body">
                                                        @if (!empty($appointment->appointment_details))
                                                        @include('appointment.old_appointment_rows')
                                                        @endif
                                                        @if (!empty($lab_appointments->lab_details))
                                                        @include('appointment.old_labortary_rows')
                                                        @endif
                                                    </tbody>


                                                </table>
                                            </div>

                                        </div>
                                        <div class="container-fluid mt-10">
                                            <div class="row">
                                                <div class="col-lg-7 ">
                                                    <!-- Empty Column for spacing -->
                                                </div>
                                                @php

                                                $main_total =
                                                $appointment->main_total ??
                                                ($lab_appointments->main_total ?? 0);
                                                $total_discount =
                                                $appointment->total_discount ??
                                                ($lab_appointments->total_discount ?? 0);
                                                $total = $appointment->total ?? ($lab_appointments->total ?? 0);
                                                @endphp

                                                <div class="col-lg-5"
                                                    style="background-color: #F9F9F9; border-radius:15px;">
                                                    <div class="box2">
                                                        {{-- <div class="head">
                                                                <h5 style="border-bottom: 1px solid;  border-bottom-style: dotted; font-size:18px !important; "
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                    Total</h5>
                                                            </div> --}}
                                                        <div class="data pt-0">
                                                            <div class="table-responsive">
                                                                <table id="tableTotal" class="table addrss-list">
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                                Total</th>
                                                                            <td><input id="total_amount" readonly
                                                                                    value="{{ @$main_total }}"
                                                                                    name="main_total"
                                                                                    class="form-control"
                                                                                    type="text"></td>
                                                                        </tr>
                                                                    </thead>

                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                                TOTAL DISCOUNT</th>
                                                                            <td><input name="total_discount"
                                                                                    value="{{ @$total_discount }}"
                                                                                    class="form-control "
                                                                                    type="text" id="totalDiscount">
                                                                            </td>

                                                                        </tr>
                                                                    </thead>
                                                                    {{-- <thead>
                                                                            <tr>
                                                                                <th
                                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                                    ADVANCED</th>
                                                                                <td><input name="advance"
                                                                                        value="{{ @$advance }}"
                                                                    id="advanceRemaining"
                                                                    class="form-control"
                                                                    type="text"></td>

                                                                    </tr>
                                                                    </thead>
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                                REMAINING</th>
                                                                            <td><input name="remaining" id="remaining"
                                                                                    value="{{ @$remaining }}"
                                                                                    readonly class="form-control"
                                                                                    type="text"></td>

                                                                        </tr>
                                                                    </thead> --}}
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                                TOTAL AMOUNT</th>
                                                                            <td><input name="total" readonly
                                                                                    id="total_changes"
                                                                                    value="{{ @$total }}"
                                                                                    class=" form-control"
                                                                                    type="text"></td>

                                                                        </tr>
                                                                    </thead>

                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->

                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab content-->

                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="Patients.html" id="kt_ecommerce_add_Patient_cancel" class="btn btn-light me-5">
                            Cancel
                        </a>
                        <!--end::Button-->

                        <!--begin::Button-->
                        <button type="submit" id="kt_ecommerce_add_Patient_submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Save Changes
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

</div>
@push('scripts')
<script>
    // append div function
    function appendConsultAndLabortaryRows(service_id, services, doctor_id,
        doctor_select, doctor_fee) {
        var append_div = `  <tr>
                                                        <td><input type="text"  readonly
                                                                id="service_name" style="padding: 7px; border-radius:5px;"
                                                                class="form-control" name="service_name[]" value='${services}' ></td>

                                                         <td style="display:none;"><input readonly
                                                         id="doctor_id" style="padding: 7px; border-radius:5px;"
                                                         class="form-control" name="doctor_id[]" value='${doctor_id}'></td>

                                                             <td><input readonly
                                                                     style="padding: 7px; border-radius:5px;"
                                                                     class="form-control" name="doctor_name[]" value="${doctor_select}" type="text"></td>
                                                             <td>
                                                             <input
                                                             name="que_no[]"
                                                                 style="padding: 7px; border-radius:5px;"
                                                                 class="form-control" type="number" ></td>
                                                         <td><input
                                                             name="referring_doctor[]"
                                                                 style="padding: 7px; border-radius:5px;"
                                                                 class="form-control" type="text"></td>
                                                         <td><input
                                                             name="discount[]"
                                                                 style="padding: 7px; border-radius:5px;"
                                                                 class="discount form-control discount" type="number" value="${0}"></td>
                                                         <td><input readonly
                                                                 style="padding: 7px; border-radius:5px;"
                                                                name="amount[]" class="amount  form-control" value="${doctor_fee}" type="text"></td>
                                                         <td class="text-center"><i class="remove fa fa-close"
                                                                 style="font-size:32px; color: red; cursor: pointer; padding-left: 10px;"></i>
                                                         </td>
                                     </tr>`;
        return append_div
    }

    function formatCnic(input) {
        let value = input.value.replace(/\D/g, ''); // Remove all non-digit characters
        if (value.length > 5) {
            value = value.substring(0, 5) + '-' + value.substring(5);
        }
        if (value.length > 12) {
            value = value.substring(0, 13) + '-' + value.substring(12);
        }
        input.value = value.substring(0, 15); // Limit to 15 characters
    }
    $(document).ready(function() {
        let total;
        if ($('#update_id').val() !== '') {
            total = parseInt($('#total_amount').val())
        } else {
            total = 0;
        }

        function formatUser(user) {
            if (!user.id) {
                return user.text;
            }

            var avatarUrl = user.image ? '{{ asset('
            images / patient_profile / ') }}' + '/' + user.image: '' ||
                '';
            var title = user.firstname;
            var mrNo = user.mr_no || 'N/A';
            var phoneNo = user.phone_no || 'N/A';
            var receiptNo = user.receipt_no || 'N/A';
            var branch = user.branch || 'N/A';

            var $user = $(
                '<div class="select2-result-repository clearfix">' +
                '<div class="select2-result-repository__avatar">' +
                '<img src="' + avatarUrl + '" class="img-fluid rounded" alt="Avatar" />' +
                '</div>' +
                '<div class="select2-result-repository__meta">' +
                '<div class="select2-result-repository__title">' + title + '</div>' +
                '<div class="select2-result-repository__statistics">' +
                '<div class="select2-result-repository__forks text-start text-muted fw-bold fs-7 text-uppercase gs-0">' +
                '<span class="glyphicon glyphicon-flash"></span> MR# ' + mrNo +
                '</div>' +
                '<div class="select2-result-repository__stargazers text-start text-muted fw-bold fs-7 text-uppercase gs-0">' +
                '<span class="glyphicon glyphicon-star"></span> Phone# ' + phoneNo +
                '</div>' +
                '<div class="select2-result-repository__watchers text-start text-muted fw-bold fs-7 text-uppercase gs-0">' +
                '<span class="glyphicon glyphicon-eye-open"></span> Receipt# ' + receiptNo +
                '</div>' +
                '<div class="select2-result-repository__watchers text-start text-muted fw-bold fs-7 text-uppercase gs-0">' +
                '<span class="glyphicon glyphicon-eye-open"></span> Branch# ' + branch +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
            );

            return $user;
        }

        function formatUserSelection(user) {
            return user.firstname || user.text;
        }

        // function getServicesBranch(obj) {
        //     let branch_id = $(obj).val()
        //     $.ajax({
        //         url: '{{ route('admin.appointment.get_services_branch') }}',
        //         method: 'GET',
        //         data: {
        //             branch_id: branch_id
        //         },
        //         dataType: "json",
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log(jqXHR, errorThrown)
        //         },
        //         success: function(data) {
        //             $('#branch_services_id').empty();
        //             $('#branch_services_id').append('<option value="">Select Service</option>');
        //             $.each(data, function(key, value) {
        //                 $('#branch_services_id').append('<option value="' + value.id +
        //                     '">' + value
        //                     .name + '</option>');
        //             });
        //         }
        //     });
        // }

        function getMrNo() {
            var currentMrNo = $('#mr_no').val()
            if (currentMrNo === '') {

                var mr_no = {
                    mr_no: currentMrNo
                }
                var url = '{{ route('
                admin.appointment.index ') }}'
                getAjaxRequests(url, mr_no, 'GET', function(resp) {
                    $('#mr_no').val(resp.get_mr_no)
                })
            }
        }

        function getConsult(obj, branch) {
            let selected_service = $(obj).val()
            var branch = branch.val();
            $.ajax({
                url: '{{ route('
                admin.appointment.get_consult_services ') }}',
                method: 'GET',
                data: {
                    selected_service_id: selected_service,
                    branch: branch
                },
                dataType: "json",
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, errorThrown)
                    if (jqXHR['status'] == 500) {
                        alert('Something went wrong!');
                    }
                    // console.log()
                },
                success: function(data) {
                    console.log(data['text'])
                    if (data['text'] == 'Doctors') {
                        $('#branch_services_id').empty();
                        $('#branch_services_id').append('<option></option>');

                        $.each(data['user_data'], function(key, value) {
                            $('#branch_services_id').append('<option value="' + value
                                .id +
                                '">' +
                                value
                                .firstname + '</option>');
                        });
                    }

                    if (data['text'] == 'Labortary') {
                        $('#branch_services_id').empty();
                        $('#branch_services_id').append('<option></option>');

                        $.each(data['user_data'], function(key, value) {
                            $('#branch_services_id').append('<option value="' + value.id +
                                '">' +
                                value
                                .labortary_test + '</option>');
                        });
                    }
                    $('#branch_services_label').text(data['text'])

                }
            });
        }

        function totalDiscount(obj) {
            let total_amount = $('#total_amount').val();
            let discount = $(obj).val()
            let remaining_amount = null;
            if (total_amount !== '') {
                remaining_amount = total_amount - discount
            }
            $('#total_changes').val(remaining_amount)
        }
        // phone_no or mr_number
        // Change search type and dynamically adjust the minimum input length
        $('#searchType').change(function() {
            let currentValue = $(this).val();

            if (currentValue === 'mr_no') {
                minimumInputLength = 6;
            } else if (currentValue === 'phone_no') {
                minimumInputLength = 10;
            } else {
                alert('Please select a valid search type first');
                return;
            }

            // Update placeholder dynamically to guide the user
            $('#appointment_id').data('select2').options.options.minimumInputLength =
                minimumInputLength;
            $('#appointment_id').data('select2').$selection.find(
                '.select2-selection__placeholder').text(
                'Enter mobile number or MR number'
            );
        });
        // Default minimum input length
        let minimumInputLength = 5;
        // appointment select 2
        $('#appointment_id').select2({
            ajax: {
                url: '{{ route('
                admin.appointment.get_appointments ') }}',
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        number: params.term, // Search term
                        searchType: $('#searchType').val() // Value of #searchType
                    };
                },
                processResults: function(data) {
                    let arr = [];
                    if (data['appointment'] !== null) {
                        arr = data['appointment'];
                    } else if (data['users'] !== null) {
                        arr = data['users'];
                    }
                    return {
                        results: $.map(arr, function(item) {
                            var id = null,
                                firstname = null,
                                lastname = null,
                                mr_no = null,
                                phone_no = null,
                                image = null,
                                branch = null;
                            if (item.firstname) {
                                id = item.id;
                                firstname = item.firstname;
                                lastname = item.username;
                                image = item.image;
                                mr_no = item.appointments[0].mr_no;
                                phone_no = item.phone_no;
                                branch = item.branch.name;
                            }
                            if (item.users) {
                                id = item.users.id;
                                firstname = item.users.firstname;
                                lastname = item.users.username;
                                image = item.users.image;
                                mr_no = item.mr_no;
                                phone_no = item.users.phone_no;
                                branch = item.branch.name;
                            }
                            return {
                                id: id,
                                firstname: firstname,
                                lastname: lastname,
                                image: image,
                                phone_no: phone_no,
                                mr_no: mr_no,
                                branch: branch
                            };
                        })
                    };
                },
                cache: true
            },
            templateResult: formatUser,
            templateSelection: formatUserSelection,
            placeholder: 'Enter mobile number or MR number',
            minimumInputLength: minimumInputLength,
            language: {
                inputTooShort: function(args) {
                    var remainingChars = minimumInputLength - args.input.length;
                    return 'Enter ' + remainingChars + ' more character' + (
                        remainingChars > 1 ? 's' : '');
                },
                noResults: function() {
                    return "No results found";
                }
            }
        });
        // onchange set all values
        $('#appointment_id').change(function() {
            var option = $(this).find('option:selected').val()
            var url = "{{ route('admin.appointment.get_app_patient') }}"
            var arr = {
                id: option
            }
            getAjaxRequests(url, arr, 'GET', function(resp) {
                console.log(resp)
                if (resp['appointment']) {
                    $('#mr_no').val(resp.appointment.mr_no)
                    $('#app_date').val(resp.appointment.appointment_date)
                    $('#app_time').val(resp.appointment.appointment_time)
                }
                // if(resp['user']['branch']){

                // }
                if (resp.appointment.users) {
                    $('#firstname').val(resp.appointment.users.firstname)
                    $('#username').val(resp.appointment.users.username)
                    $('#age').val(resp.appointment.users.age)
                    $('#image_src').val()
                    $('#cnic_no').val(resp.appointment.users.cnic_no)
                    $('#phone_no').val(resp.appointment.users.phone_no)
                    $('#dob').val(resp.appointment.users.dob)
                    if (resp.appointment.users.gender == 'male') {
                        $('#male').attr('checked', 'checked')
                    }
                    if (resp.appointment.users.gender == 'female') {
                        $('#female').attr('checked', 'checked')
                    }
                    $('#address').val(resp.appointment.users.address)
                    $('#image_srcs').show();
                    $('#image_srcs').attr('src', "{{ asset('images/patient_profile/') }}/" +
                        resp.appointment.users.image)
                    $('#branch_id').val(resp.appointment.users.branch_id).trigger(
                        'change');
                    $('#select_consult').val(0).trigger('change');
                    // selected consult attribute

                }
                if (resp['reload'] !== undefined) {
                    setTimeout(function() {
                        window.location.reload(true);
                    }, 400);
                    return false;
                }
            })
        })
        // seperate discount adding in main discount on click
        $(document).on('click', '.discount', function() {
            let total_discount = parseInt($('#totalDiscount').val()) ||
                0;
            let val = parseInt($(this).val()) || 0;

            let mainDiscountAfterAppDiscount = total_discount + val;
            $('#totalDiscount').val(mainDiscountAfterAppDiscount);
        });
        // get all doctors
        $('#select_consult').change(function() {
            var obj = this
            var branch = $('#branch_id option:selected');
            if (branch.val() == undefined) {
                var branch = $('#branch_input_id');
            }
            if (branch.val() == '') {
                alert('Select Branch First')
            }
            getConsult(obj, branch);
        })
        // checking branch_id role wise superadmin or admin
        // if ($('#branch_id').find('option:selected').val()) {
        //     var branch_id = $('#branch_id option:selected')
        //     getServicesBranch(branch_id);
        //     // getDoctorsBranch(branch_id);

        // } else if ($('#branch_input_id').val()) {
        //     var branch_id = $('#branch_input_id')
        //     getServicesBranch(branch_id);
        //     // getDoctorsBranch(branch_id);
        // }
        // $('#branch_id').change(function() {
        //     getServicesBranch(this);
        // })
        getMrNo();

        $('#totalDiscount').on('keyup', function() {
            totalDiscount(this)
        })

        function calculateTotalAmount() {
            var totalAmount = 0;
            $('#service_body tr .amount').each(function() {
                var amountValue = parseFloat($(this).val()) || 0;
                totalAmount += amountValue;
            });
            return totalAmount
        }
        // append rows on change
        $('#branch_services_id').on('change', function() {
            var services = $('#select_consult').find('option:selected').text().trim();
            var service_text = $(this).find('option:selected').text().trim();
            var label = $('#branch_services_label').text();
            var service_id = $(this).val()
            var doctor_select = $('#branch_services_id').find('option:selected').text().trim()
            var doctor_id = $('#branch_services_id').find('option:selected').val()

            var url = '{{ route('
            admin.appointment.get_service ') }}'

            var params = {
                label: label,
                service: service_text,
                service_val: service_id,
                dr_id: doctor_id,
                // loopCounter
            }
            getAjaxRequests(url, params, 'GET', function(resp) {
                total += resp.doctor_fee
                $('#total_amount').val(total)
                $('#total_changes').val(total);
                if ($('#totalDiscount').val() !== '') {
                    totalDiscount($('#totalDiscount'))
                }
                let doctor_fee = resp.doctor_fee;
                let append_div = appendConsultAndLabortaryRows(service_id, services, doctor_id,
                    doctor_select, doctor_fee)

                $('#service_body').append(append_div)

            })
        })

        $('#total_amount').on('click', function() {
            var total_amount = $(this).val()
            var tr = $('#service_body tr:first').find('td:nth-child(8) input').val();
            // alert(tr)
            if ((tr !== '' || tr > 0) && tr !== undefined) {

                var totalamountEach = calculateTotalAmount();
                //    var remainingAmount=total_amount-totalamountEach;
                if (total_amount !== '' && total_amount > 0) {
                    $('#total_amount').val(totalamountEach)
                    $('#total_changes').val(totalamountEach);
                    if ($('#totalDiscount').val() !== '') {
                        totalDiscount($('#totalDiscount'))
                    }


                }
            }
        })
        $('#service_body').on('click', '.remove', function() {
            // loopCounterDecrIncr('decr')
            let tr = $(this).closest('tr')
            if ($('#service_body tr').length === 1) {
                total = 0;
                $('#total_amount').val(total);
                $('#total_changes').val(total);
                $('#totalDiscount').val(0)


            } else {
                let amount = tr.find('td:nth-child(7) input').val()
                let remaining = parseInt($('#total_amount').val()) - parseInt(amount);
                total = remaining;
                $('#total_amount').val(remaining)
                totalDiscount($('#totalDiscount'))

            }
            tr.fadeOut(500, function() {

                $(this).remove();
            });
        });

    })
</script>
@endpush
@endsection