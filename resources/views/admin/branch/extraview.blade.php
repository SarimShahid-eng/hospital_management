@extends('layout.index')
@section('content')
    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span class="path1"></span><span
                                class="path2"></span></i> <input type="text" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-250px ps-13" placeholder="Search user"
                            fdprocessedid="4rjci">
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">



                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user" fdprocessedid="78883t">
                            Add User
                        </button>
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->

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

                    <!--begin::Modal - Adjust Balance-->
                    <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Export Users</h2>
                                    <!--end::Modal title-->

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-users-modal-action="close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->

                                <!--begin::Modal body-->
                                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_export_users_form"
                                        class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <select name="role" data-control="select2" data-placeholder="Select a role"
                                                data-hide-search="true"
                                                class="form-select form-select-solid fw-bold select2-hidden-accessible"
                                                data-select2-id="select2-data-15-a5nt" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                                <option data-select2-id="select2-data-17-08io"></option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Analyst">Analyst</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Support">Support</option>
                                                <option value="Trial">Trial</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5"
                                                dir="ltr" data-select2-id="select2-data-16-nx2h"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single form-select form-select-solid fw-bold"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-role-1j-container"
                                                        aria-controls="select2-role-1j-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-role-1j-container" role="textbox"
                                                            aria-readonly="true" title="Select a role"><span
                                                                class="select2-selection__placeholder">Select a
                                                                role</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Select Export
                                                Format:</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <select name="format" data-control="select2" data-placeholder="Select a format"
                                                data-hide-search="true"
                                                class="form-select form-select-solid fw-bold select2-hidden-accessible"
                                                data-select2-id="select2-data-18-rnkn" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                                <option data-select2-id="select2-data-20-me6l"></option>
                                                <option value="excel">Excel</option>
                                                <option value="pdf">PDF</option>
                                                <option value="cvs">CVS</option>
                                                <option value="zip">ZIP</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5"
                                                dir="ltr" data-select2-id="select2-data-19-1wjn"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--single form-select form-select-solid fw-bold"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="0" aria-disabled="false"
                                                        aria-labelledby="select2-format-8n-container"
                                                        aria-controls="select2-format-8n-container"><span
                                                            class="select2-selection__rendered"
                                                            id="select2-format-8n-container" role="textbox"
                                                            aria-readonly="true" title="Select a format"><span
                                                                class="select2-selection__placeholder">Select a
                                                                format</span></span><span class="select2-selection__arrow"
                                                            role="presentation"><b
                                                                role="presentation"></b></span></span></span><span
                                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            <!--end::Input-->
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Actions-->
                                        <div class="text-center">
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-users-modal-action="cancel">
                                                Discard
                                            </button>

                                            <button type="submit" class="btn btn-primary"
                                                data-kt-users-modal-action="submit">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - New Card-->

                    <!--begin::Modal - Add task-->
                    <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true"
                        style="display: none;">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-650px">
                            <!--begin::Modal content-->
                            <div class="modal-content">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_add_user_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Add User</h2>
                                    <!--end::Modal title-->

                                    <!--begin::Close-->
                                    <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-kt-users-modal-action="close">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                                class="path2"></span></i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->

                                <!--begin::Modal body-->
                                <div class="modal-body px-5 my-7">
                                    <!--begin::Form-->
                                    <form id="kt_modal_add_user_form"
                                        class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                        <!--begin::Scroll-->
                                        <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                            id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                            data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                            data-kt-scroll-offset="300px" style="max-height: 54px;">


                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7 fv-plugins-icon-container">
                                                <!--begin::Label-->
                                                <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input type="text" name="user_name"
                                                    class="form-control form-control-solid mb-3 mb-lg-0"
                                                    placeholder="Full name" value="Emma Smith" fdprocessedid="z8ikcp">
                                                <!--end::Input-->
                                                <div
                                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                </div>
                                            </div>

                                        </div>
                                        <!--end::Scroll-->

                                        <!--begin::Actions-->
                                        <div class="text-center pt-10">
                                            <button type="reset" class="btn btn-light me-3"
                                                data-kt-users-modal-action="cancel" fdprocessedid="qdc2k6">
                                                Discard
                                            </button>

                                            <button type="submit" class="btn btn-primary"
                                                data-kt-users-modal-action="submit" fdprocessedid="1p5vbr">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span
                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                    <!--end::Modal - Add task-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body py-4">

                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                    <div id="" class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_table_users"
                            style="width: 877.5px;">
                            <colgroup>
                                <col style="width: 36.3984px;">
                                <col style="width: 163.102px;">
                                <col style="width: 131.375px;">
                                <col style="width: 131.375px;">
                                <col style="width: 131.375px;">
                                <col style="width: 176.828px;">
                                <col style="width: 107.047px;">
                            </colgroup>
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                    <th class="w-10px pe-2 dt-orderable-none" data-dt-column="0" rowspan="1"
                                        colspan="1" aria-label="



    "><span
                                            class="dt-column-title">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_table_users .form-check-input"
                                                    value="1">
                                            </div>
                                        </span><span class="dt-column-order"></span></th>
                                    <th class="min-w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="1"
                                        rowspan="1" colspan="1" aria-label="User: Activate to sort"
                                        tabindex="0"><span class="dt-column-title" role="button">Category</span><span
                                            class="dt-column-order"></span></th>

                                    <th class="text-end min-w-100px dt-orderable-none" data-dt-column="6" rowspan="1"
                                        colspan="1" aria-label="Actions"><span
                                            class="dt-column-title">Actions</span><span class="dt-column-order"></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">


                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>

                                    <td>
                                        Administrator </td>



                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="view.html" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                    data-kt-users-table-filter="delete_row">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>

                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                    <div id="" class="row">
                        <div id=""
                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar">
                        </div>
                        <div id=""
                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dt-paging paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="dt-paging-button page-item disabled"><a class="page-link previous"
                                            aria-controls="kt_table_users" aria-disabled="true" aria-label="Previous"
                                            data-dt-idx="previous" tabindex="-1"><i class="previous"></i></a></li>
                                    <li class="dt-paging-button page-item active"><a href="#" class="page-link"
                                            aria-controls="kt_table_users" aria-current="page" data-dt-idx="0"
                                            tabindex="0">1</a></li>
                                    <li class="dt-paging-button page-item"><a href="#" class="page-link"
                                            aria-controls="kt_table_users" data-dt-idx="1" tabindex="0">2</a></li>
                                    <li class="dt-paging-button page-item"><a href="#" class="page-link"
                                            aria-controls="kt_table_users" data-dt-idx="2" tabindex="0">3</a></li>
                                    <li class="dt-paging-button page-item"><a href="#" class="page-link next"
                                            aria-controls="kt_table_users" aria-label="Next" data-dt-idx="next"
                                            tabindex="0"><i class="next"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
