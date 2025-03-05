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
                        Register a labortary test
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

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <!--begin::Form-->
                <form class="imageUploadForm" enctype="multipart/form-data" method="POST" action="@adminRoute('labortary.store')">
                    @csrf

                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_User_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header ">
                                            <div class="card-title">
                                                <h2>General Lab</h2>
                                            </div>
                                            <div class="col-md-8 row justify-content-end">
                                                <!--begin::Label-->
                                                @if (Auth::user()->status === 0)
                                                    <div class="col-md-4">
                                                        <label class="form-label">Branch </label>
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
                                                        <!--end::Select2-->
                                                    </div>
                                                @else
                                                    <input type="hidden" name="branch_id"
                                                        value="{{ Auth::user()->branch_id }}">
                                                @endif
                                                @php
                                                    if ($id) {
                                                        $keyCount =
                                                            $id->name !== '' ? count(array_keys(@$id->name)) : '';
                                                        if ($keyCount === 1) {
                                                            $condition = true;
                                                        } else {
                                                            $condition = false;
                                                        }
                                                    }
                                                @endphp
                                                <!--end::Select2-->
                                                <div class="col-md-4 ">
                                                    <label class="form-label">Select range</label>
                                                    <!--begin::Label-->
                                                    <select id="select_range" name="range_on" data-control="select2"
                                                        data-hide-search="true" class="form-select form-select-solid mb-2">
                                                        <option {{ @$condition === true ? 'selected' : '' }} selected
                                                            value="0">
                                                            Once</option>
                                                        <option {{ @$condition === false ? 'selected' : '' }}
                                                            value="1">
                                                            Multiple</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Card header-->

                                        <!--begin::Card body-->
                                        <div id="main_body" class="card-body  pt-0">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column flex-md-row gap-5 align-items-end">
                                                <div class="fv-row flex-row-fluid fv-plugins-icon-container">
                                                    <input id="update_id" type="hidden" name="update_id"
                                                        value="{{ @$id->id }}">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">Labortary Test</label>
                                                    <input class="form-control" name="labortary_test"
                                                        placeholder="Enter name" value="{{ @$id->labortary_test }}">
                                                    <!--end::Input-->

                                                </div>

                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Abbreviation</label>
                                                    <input type="text" class="form-control" name="abbreviation"
                                                        value="{{ @$id->abbreviation }}" placeholder="Enter abbrv.">
                                                    <!--end::Input-->
                                                </div>
                                                <div class="flex-row-fluid">
                                                    <!--begin::Label-->
                                                    <label class="form-label">Fees</label>
                                                    <input type="text" class="form-control" name="fees"
                                                        value="{{ @$id->fees }}" placeholder="Enter fees">
                                                    <!--end::Input-->
                                                </div>

                                            </div>
                                            <div class="main">
                                                <div
                                                    class="wrapper d-flex flex-column flex-md-row gap-5 align-items-end mt-3">
                                                    <div class="name_field fv-row flex-row-fluid fv-plugins-icon-container"
                                                        style="display: none;">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Name</label>
                                                        <input class="form-control name_field" style="display: none"
                                                            value="{{ @$condition === false ? $id->name[0] ?? '' : '' }}"
                                                            name="name[]" placeholder="Enter name">
                                                        <!--end::Input-->

                                                    </div>

                                                    <div class="flex-row-fluid">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Unit</label>
                                                        <input type="text" class="form-control" name="unit[]"
                                                            value="{{ @$id->unit[0] }}" placeholder="Enter unit">
                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="flex-row-fluid">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Range</label>
                                                        <input type="text" class="form-control" name="range[]"
                                                            value="{{ @$id->range[0] }}" placeholder="Enter range">

                                                    </div>
                                                    <div class="flex-row-fluid">
                                                        <a style="display: none" id="add_button"
                                                            class="btn btn-primary"><i class="fa fa-plus text-white"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($id)
                                                @foreach ($id->name as $index => $name)
                                                    @if ($index != 0)
                                                        <div
                                                            class="wrapper d-flex flex-column flex-md-row gap-5 align-items-end mt-3">
                                                            <div class=" fv-row flex-row-fluid fv-plugins-icon-container"
                                                                style="">

                                                                <!--begin::Label-->
                                                                <label class="required form-label">Name</label>
                                                                <input value="{{ @$name }}" class="form-control "
                                                                    name="name[]" placeholder="Enter name">
                                                                <!--end::Input-->

                                                            </div>

                                                            <div class="flex-row-fluid">
                                                                <!--begin::Label-->
                                                                <label class="form-label">Unit</label>
                                                                <input type="text" class="form-control" name="unit[]"
                                                                    value="{{ @$id->unit[$index] }}"
                                                                    placeholder="Enter unit">
                                                                <!--end::Input-->
                                                            </div>
                                                            {{-- @endforeach --}}

                                                            <div class="flex-row-fluid">
                                                                <!--begin::Label-->
                                                                <label class="form-label">Range</label>
                                                                <input type="number" class="form-control" name="range[]"
                                                                    value="{{ @$id->range[$index] }}"
                                                                    placeholder="Enter range">

                                                            </div>
                                                            <div class="flex-row-fluid">
                                                                <a onclick="removefunction(this)" id="remove_button"
                                                                    class="remove btn btn-danger">
                                                                    <i class="fa fa-minus text-white"></i> </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" id="kt_ecommerce_add_User_submit" class="btn btn-primary">
                                            <span class="indicator-label">
                                                Save Changes
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait... <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                        <!--end::Button-->
                                    </div>
                                </div>
                                <!--end::Tab pane-->




                            </div>
                            <!--end::Tab content-->

                        </div>
                        <!--end::Main column-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->


    </div>
    {{-- <script type="">
        // alert('s')

    </script> --}}
    @push('scripts')
        <script>
            // /alert('s')
            function removefunction(obj) {
                $(obj).parent().parent().remove();
            }

            $(document).ready(function() {

                // function updateIdCheck(){
                var update_id = $('#update_id').val();
                if (update_id !== '') {
                    var selectOption = $('#select_range').find('option:selected').val();
                    if (selectOption == 1) {
                        $('#add_button').css('display', 'inline-block');
                        $('.name_field').show();
                        $('.name_field').prop('disabled', false);

                    }
                    if (selectOption == 0) {
                        $('#add_button').css('display', 'none');
                        $('.name_field').prop('disabled', true);

                        $('.name_field').hide();

                    }

                } else {
                    $('.name_field').hide();
                    $('.name_field').prop('disabled', true);
                    // $('#select_range').change();
                    // alert('null')
                }
                // }



                // alert('dssd')
                $('#select_range').change(function() {
                    var value = $(this).val();
                    if (value == 1) {
                        $('#add_button').css('display', 'inline-block');
                        $('.name_field').show();
                        $('.name_field').prop('disabled', false);

                    }
                    if (value == 0) {
                        $('#add_button').css('display', 'none');
                        $('.name_field').prop('disabled', true);

                        $('.name_field').hide();

                    }
                })
                $('#add_button').click(function() {
                    var value = $('#select_range').val()



                    var append_div = `
                        <div class="wrapper d-flex flex-column flex-md-row gap-5 align-items-end mt-3">
                                                    <div class=" fv-row flex-row-fluid fv-plugins-icon-container"
                                                        style="">
                                                        <!--begin::Label-->
                                                        <label class="required form-label">Name</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input class="form-control "
                                                            name="name[]" placeholder="Enter name">
                                                        <!--end::Input-->

                                                    </div>

                                                    <div class="flex-row-fluid">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Unit</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control" name="unit[]"
                                                            value="{{ @$id->username }}" placeholder="Enter unit">
                                                        <!--end::Input-->
                                                    </div>

                                                    <div class="flex-row-fluid">
                                                        <!--begin::Label-->
                                                        <label class="form-label">Range</label>
                                                        <!--end::Label-->

                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control" name="range[]"
                                                            value="{{ @$id->username }}" placeholder="Enter range">

                                                    </div>
                                                     <div class="flex-row-fluid">
                                                     <a onclick="removefunction(this)" id="remove_button" class="remove btn btn-danger">
                                                         <i class="fa fa-minus text-white"></i> </a>
                                                 </div>
                         </div>`


                    $('#main_body').append(append_div)
                })

            })
        </script>
    @endpush
@endsection

{{-- select_range --}}
