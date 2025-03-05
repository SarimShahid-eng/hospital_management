{{-- Add/Update Modal  --}}
<div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            {{--  --}}
            <form id="kt_ecommerce_add_role_form" class="form ajaxForm " method="POST"
                action="{{ route('role.store') }}">
                @csrf
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Add role</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div data-bs-dismiss="modal" id="kt_modal_add_customer_close"
                        class="btn btn-icon btn-sm btn-active-icon-primary">
                        <i class="fa fa-times fa-1x">
                            <span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->

                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" id="update_id" name="update_id">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Role name
                            </label>
                            <input type="text" id="role_name" name="name"
                                class="form-control form-control-solid" placeholder="role name" value="" />
                            {{-- <input type="text" class="form-control form-control-solid"
                                placeholder="" name="name" value="" /> --}}
                        </div>


                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    {{-- <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">
                        Discard
                    </button> --}}
                    <!--end::Button-->

                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">
                            Submit
                        </span>
                        {{-- <span class="indicator-progress">
                                Please wait... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span> --}}
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<div class="modal fade" id="kt_modal_edit" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            {{--  --}}
            <form id="kt_ecommerce_add_role_form" class="form ajaxForm " method="POST"
                action="{{ route('role.store') }}">
                @csrf
                <div class="modal-header" id="kt_modal_edit_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Edit Permissions</h2>
                    <!--end::Modal title-->

                    <!--begin::Close-->
                    <div data-bs-dismiss="modal" id="kt_modal_edit_customer_close"
                        class="btn btn-icon btn-sm btn-active-icon-primary">
                        <i class="fa fa-times fa-1x">
                            <span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->

                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_customer_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_edit_customer_header"
                        data-kt-scroll-wrappers="#kt_modal_edit_customer_scroll" data-kt-scroll-offset="300px">
                        <input type="hidden" id="update_id" name="update_id">
                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Role name
                            </label>
                            <input type="text" id="role_name" name="name"
                                class="form-control form-control-solid" placeholder="role name" value="" />
                            {{-- <input type="text" class="form-control form-control-solid"
                                placeholder="" name="name" value="" /> --}}
                        </div>


                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    {{-- <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">
                        Discard
                    </button> --}}
                    <!--end::Button-->

                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                        <span class="indicator-label">
                            Submit
                        </span>
                        {{-- <span class="indicator-progress">
                                Please wait... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span> --}}
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
{{-- // Delete Modal --}}
<div id="remove_data" class="modal fade zoomIn delete_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you
                            want to remove this product ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button onclick="ajaxRequest(this)"  class="delete_notify btn w-sm btn-danger">Yes, Delete
                        It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- Delete Modal  --}}
