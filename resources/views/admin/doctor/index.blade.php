@extends('layout.index')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">

            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1
                        class="page-heading page-heading-form d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Doctor Registration
                    </h1>
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
                    method="POST" action="@adminRoute('doctor.store')">
                    @csrf

                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_Doctor_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        {{-- <div class="card-header d-flex jusrtify-content-between">
                                            <div class="col-md-4 ">


                                            </div>
                                        </div> --}}
                                        <!--end::Card header-->

                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                                    <input type="hidden" name="update_id" value="{{ @$id->id }}">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">First name</label>
                                                    <input class="form-control" name="firstname"
                                                        placeholder="Enter First name" value="{{ @$id->firstname }}">
                                                    <!--end::Input-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Last name</label>
                                                    <input class="form-control" name="username" value="{{ @$id->username }}"
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
                                                <div class="flex-row-fluid col-md-6  col-lg-6 col-12"
                                                    style="padding-left: 11px">
                                                    <label class="form-label w-100">Gender</label>
                                                    <div class="d-flex align-items-center gap-5">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="gender" type="radio"
                                                                value="male" checked @checked(@$id->gender == 'male')
                                                                id="flexRadioMale" />
                                                            <label class="form-check-label" for="flexRadioMale">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input" name="gender" type="radio"
                                                                value="female" @checked(@$id->gender == 'female')
                                                                id="flexRadioFemale" />
                                                            <label class="form-check-label" for="flexRadioFemale">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container col-md-6">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Image</label>
                                                    <input type="file" class="form-control" name="image"
                                                        placeholder="Enter Email addresss" value="">
                                                    <!--end::Input-->
                                                    @if (@$id->image)
                                                        <img class="img-fluid mt-4 rounded-1"
                                                            src="{{ asset('images') }}/doctor_profile/{{ $id->image }}"
                                                            alt="">
                                                    @endif
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="flex-row-fluid col-md-6 d-flex">

                                                    <div class="col-lg-5 col-md-5 col-6 ms-3">
                                                        <label class="form-label w-100">From time</label>
                                                        <input type="time" name="timing_from"
                                                            value="{{ @$doctor_details->timing_from }}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-6 ms-3">
                                                        <label class="form-label w-100">To time</label>
                                                        <input type="time" name="timing_to"
                                                            value="{{ @$doctor_details->timing_to }}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Specialization</label>
                                                    <input class="form-control" name="specialization"
                                                        placeholder="Enter Specialization"
                                                        value="{{ @$doctor_details->specialization }}">
                                                    <!--end::Input-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Consultancy Fees</label>
                                                    <input type="number" class="form-control" name="consultancy_fee"
                                                        value="{{ @$doctor_details->consultancy_fee }}"
                                                        placeholder="Enter Consultancy Fees">
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Procedure Percentage</label>
                                                    <input type="number" class="form-control"
                                                        name="procedure_percentage"
                                                        placeholder="Enter Procedure Percentage"
                                                        value="{{ @$doctor_details->procedure_percentage }}">
                                                    <!--end::Input-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Doctor Sharing</label>
                                                    <input type="number" class="form-control" name="doctor_sharing"
                                                        value="{{ @$doctor_details->doctor_sharing }}"
                                                        placeholder="Enter Doctor Sharing">
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row mt-3 gap-5">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Designation</label>
                                                    <input class="form-control" name="designation"
                                                        placeholder="Enter Designation"
                                                        value="{{ @$doctor_details->designation }}">
                                                    <!--end::Input-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Degree</label>
                                                    <input class="form-control" name="degree"
                                                        value="{{ @$doctor_details->degree }}"
                                                        placeholder="Enter Degree">
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row mt-3 gap-5 ">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container ">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Contact 1</label>
                                                    <input type="number" class="form-control" name="contact1"
                                                        placeholder="Enter Contact"
                                                        value="{{ @$doctor_details->contact1 }}">
                                                    <!--end::Input-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Contact 2</label>
                                                    <input type="number" class="form-control" name="contact2"
                                                        value="{{ @$doctor_details->contact2 }}"
                                                        placeholder="Enter Degree">
                                                    <!--end::Input-->
                                                </div>
                                                <!--begin::Label-->

                                            </div>
                                            <!--end::Input group-->
                                            @if (Auth::user()->status === 0)
                                                <div class="d-flex flex-column col-md-6 flex-md-row mt-3 gap-5 ">
                                                    <div class="fv-row flex-row-fluid fv-plugins-icon-container ">
                                                        <!--begin::Label-->
                                                        <label class="form-label required form-label">Branch</label>
                                                        <select name="branch_id" class="form-select form-select-solid"
                                                            data-kt-select2="true" data-close-on-select="false"
                                                            data-placeholder="Select option" data-allow-clear="true">
                                                            <option></option>
                                                            @foreach ($branches as $branch)
                                                                <option value="{{ $branch->id }}"
                                                                    {{ @$id->branch_id == $branch->id ? 'selected' : '' }}>
                                                                    {{ $branch->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @else
                                                <input type="hidden" name="branch_id"
                                                    value="{{ Auth::user()->branch_id }}">
                                            @endif
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
                            <button type="submit" id="kt_ecommerce_add_Doctor_submit" class="btn btn-primary">
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
            $(document).ready(function() {

            })
        </script>
    @endpush
@endsection
