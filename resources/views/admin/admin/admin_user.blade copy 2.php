@extends('layout.index')

<head>
    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css"> --}}
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

</head>
@section('content')
    @include('branch.modal')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Modal - Customers - Add-->

        <!--end::Modal - Customers - Add--><!--begin::Modal - Adjust Balance-->
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_customer" id="addBranch">

                            <i style="padding-bottom: 1px;" class="fa fa-plus"></i> Add Branch
                        </button>

                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">


                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span> Selected
                        </div>

                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                            Delete Selected
                        </button>
                    </div>
                    <!--end::Group actions-->

                </div>
                <!--end::Card toolbar-->
            </div>

            <!--end::Card header-->

            <!--begin::Card body-->
            <form class="ajaxForm"  method="POST" action="@adminRoute('admin.store')">
                @csrf
            <div class="card-body py-4">
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="form-label" for="">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" value="{{ @$id->email }}"
                            placeholder="Enter Email Address">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="required form-label">Username</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control" name="username" placeholder="Enter username" >
                    </div>
                    <div class="col-md-6">
                        <label class="required form-label">Password</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control" name="password" placeholder="Enter password">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        {{-- <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div> --}}
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
