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
                        Receptionist Registration
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
                            Receptionist </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <form class="imageUploadForm" enctype="multipart/form-data" method="POST" action="@adminRoute('receptionist.store')">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_User_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">

                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column flex-md-row gap-5">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                                    <input type="hidden" name="update_id" value="{{ @$id->id }}">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Name</label>
                                                    <input class="form-control" name="firstname" placeholder="Enter name"
                                                        value="{{ @$id->firstname }}">
                                                    <!--end::Input-->
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>

                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Username</label>
                                                    <input class="form-control" name="username" value="{{ @$id->username }}"
                                                        placeholder="Enter Username">
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-md-row ">
                                                <div class="flex-row-fluid col-md-3  col-lg-3 col-12"
                                                    style="padding-left: 11px">
                                                    <label class="form-label w-100">Gender</label>
                                                    <div class="d-flex align-items-center gap-5">
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input @checked(@$id->gender == 'male') class="form-check-input"
                                                                name="gender" type="radio" value="male" checked=""
                                                                id="flexRadioMale" data-parsley-multiple="gender">
                                                            <label class="form-check-label" for="flexRadioMale">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input @checked(@$id->gender == 'female') class="form-check-input"
                                                                name="gender" type="radio" value="female"
                                                                id="flexRadioFemale" data-parsley-multiple="gender">
                                                            <label class="form-check-label" for="flexRadioFemale">
                                                                Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Password</label>
                                                    <input class="form-control" name="password"
                                                        placeholder="Enter password">
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex flex-column flex-md-row gap-5 mt-2 col-lg-12 col-md-6 col-12">
                                                <div
                                                    class="col-lg-6 col-12  fv-row flex-row-fluid fv-plugins-icon-container">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Image</label>
                                                    <input type="file" class="form-control" name="image">
                                                    @if (@$id->image)
                                                        <img class="img-fluid mt-4 rounded-1"
                                                            src="{{ asset('images') }}/Receptionist_profile/{{ $id->image }}"
                                                            alt="">
                                                    @endif
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                    </div>
                                                </div>
                                                @if (Auth::user()->status === 0)
                                                    <div class="flex-row-fluid col-lg-6 col-12">
                                                        <!--begin::Label-->
                                                        <label class="form-label required form-label">Branch</label>
                                                        <select name="branch_id" class="form-select mb-2"
                                                            data-control="select2" data-placeholder="Select an option"
                                                            data-allow-clear="true">
                                                            <option></option>
                                                            @foreach ($branches as $branch)
                                                                <option value="{{ $branch->id }}"
                                                                    {{ @$branch->id == @$id->branch_id ? 'selected' : '' }}>
                                                                    {{ $branch->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="branch_id"
                                                        value="{{ Auth::user()->branch_id }}">
                                                @endif
                                            </div>
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
                            <button type="submit" id="kt_ecommerce_add_User_submit" class="btn btn-primary">
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
@endsection
